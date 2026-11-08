<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lesson 4 - Data Filter Validation with filter_var()</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        body {
            background-color: #f1f5f9;
            color: #1e293b;
            padding: 35px 15px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            padding: 30px 35px;
        }
        .badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 700;
            background: #ecfdf5;
            color: #059669;
            margin-bottom: 10px;
            text-transform: uppercase;
        }
        h1 {
            font-size: 1.65rem;
            color: #0f172a;
            margin-bottom: 6px;
        }
        .subtitle {
            font-size: 0.95rem;
            color: #64748b;
            margin-bottom: 25px;
            line-height: 1.6;
        }
        .concept-card {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-left: 4px solid #10b981;
            border-radius: 8px;
            padding: 16px;
            margin-bottom: 25px;
            font-size: 0.9rem;
            line-height: 1.6;
        }
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }
        @media (max-width: 600px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
        }
        .form-group {
            margin-bottom: 16px;
        }
        label {
            display: block;
            font-weight: 600;
            margin-bottom: 5px;
            font-size: 0.88rem;
            color: #334155;
        }
        .hint {
            font-weight: normal;
            font-size: 0.78rem;
            color: #64748b;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font-size: 0.92rem;
            outline: none;
            transition: border-color 0.2s;
        }
        input[type="text"]:focus {
            border-color: #10b981;
        }
        .btn-group {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            font-size: 0.92rem;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
        }
        .btn-submit {
            background: #10b981;
            color: #ffffff;
            flex: 1;
        }
        .btn-submit:hover {
            background: #059669;
        }
        .btn-reset {
            background: #e2e8f0;
            color: #475569;
        }
        .btn-reset:hover {
            background: #cbd5e1;
        }
        .alert-box {
            margin-top: 25px;
            padding: 18px;
            border-radius: 8px;
        }
        .alert-error {
            background: #fef2f2;
            border-left: 4px solid #ef4444;
            color: #991b1b;
        }
        .alert-success {
            background: #ecfdf5;
            border-left: 4px solid #10b981;
            color: #065f46;
        }
        .table-data {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        .table-data th, .table-data td {
            text-align: left;
            padding: 10px 12px;
            border-bottom: 1px solid #e2e8f0;
            font-size: 0.88rem;
        }
        .table-data th {
            background: #f8fafc;
            color: #475569;
            font-weight: 700;
        }
        .badge-status {
            padding: 2px 8px;
            border-radius: 4px;
            font-size: 0.78rem;
            font-weight: 700;
        }
        .badge-valid {
            background: #dcfce7;
            color: #166534;
        }
        .badge-invalid {
            background: #fee2e2;
            color: #991b1b;
        }
        .table-summary {
            margin-top: 35px;
            border-top: 2px solid #e2e8f0;
            padding-top: 25px;
        }
        .table-summary h3 {
            font-size: 1.15rem;
            color: #0f172a;
            margin-bottom: 12px;
        }
        .nav-links {
            margin-top: 30px;
            display: flex;
            justify-content: space-between;
            font-size: 0.9rem;
        }
        .nav-links a {
            color: #059669;
            text-decoration: none;
            font-weight: 600;
        }
        .nav-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <span class="badge">Lesson 4 / Topic 4.2.2</span>
    <h1>Data Filter Validation ជាមួយ filter_var()</h1>
    <p class="subtitle">
        Validating complex inputs (Email, Integer, URL, Float, IP) safely without writing manual Regular Expressions.
    </p>

    <div class="concept-card">
        <strong>💡 ហេតុអ្វីត្រូវប្រើ <code>filter_var()</code>?</strong><br>
        ជំនួសឱ្យការសរសេរ Regular Expressions (Regex) ដ៏ស្មុគស្មាញ និងងាយនឹងច្រឡំ PHP ផ្តល់នូវអនុគមន៍ស្តង់ដារ <code>filter_var($value, $filterType, $options)</code> ដែលអាច Validate ទិន្នន័យបានយ៉ាងលឿន សុវត្ថិភាព និងត្រឹមត្រូវតាមស្តង់ដារអន្តរជាតិ (RFC Specs)។
    </div>

    <?php
    $email   = trim($_POST['email'] ?? '');
    $age     = trim($_POST['age'] ?? '');
    $website = trim($_POST['website'] ?? '');
    $gpa     = trim($_POST['gpa'] ?? '');

    $results = [];
    $isSubmitted = ($_SERVER['REQUEST_METHOD'] === 'POST');

    if ($isSubmitted) {
        // ១. Validate Email
        $validEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
        $results['Email'] = [
            'value'   => $email,
            'filter'  => 'FILTER_VALIDATE_EMAIL',
            'valid'   => ($validEmail !== false),
            'cleaned' => $validEmail ?: 'Invalid format'
        ];

        // ២. Validate Integer (ជាមួយ Range Option: អាយុត្រូវនៅចន្លោះ 1 ដល់ 120)
        // ចំណាំសំខាន់៖ ត្រូវប្រើ === false ដាច់ខាត!
        $validAge = filter_var($age, FILTER_VALIDATE_INT, [
            "options" => ["min_range" => 1, "max_range" => 120]
        ]);
        $results['Age (1-120)'] = [
            'value'   => $age,
            'filter'  => 'FILTER_VALIDATE_INT [1-120]',
            'valid'   => ($validAge !== false),
            'cleaned' => ($validAge !== false) ? $validAge : 'Must be integer (1-120)'
        ];

        // ៣. Validate URL
        $validUrl = filter_var($website, FILTER_VALIDATE_URL);
        $results['Website URL'] = [
            'value'   => $website,
            'filter'  => 'FILTER_VALIDATE_URL',
            'valid'   => ($validUrl !== false),
            'cleaned' => $validUrl ?: 'Invalid URL (needs http:// or https://)'
        ];

        // ៤. Validate Float (GPA ពី 0.00 ដល់ 4.00)
        $validGpa = filter_var($gpa, FILTER_VALIDATE_FLOAT);
        $isGpaValid = ($validGpa !== false && $validGpa >= 0.0 && $validGpa <= 4.0);
        $results['GPA (0.0-4.0)'] = [
            'value'   => $gpa,
            'filter'  => 'FILTER_VALIDATE_FLOAT',
            'valid'   => $isGpaValid,
            'cleaned' => $isGpaValid ? $validGpa : 'Invalid float or out of range'
        ];
    }
    ?>

    <form action="" method="POST">
        <div class="form-grid">
            <!-- Email -->
            <div class="form-group">
                <label for="email">Email Address <span class="hint">(FILTER_VALIDATE_EMAIL)</span>:</label>
                <input type="text" id="email" name="email" value="<?= htmlspecialchars($email) ?>" placeholder="e.g. dara@gmail.com">
            </div>

            <!-- Age / Integer -->
            <div class="form-group">
                <label for="age">Age <span class="hint">(FILTER_VALIDATE_INT 1-120)</span>:</label>
                <input type="text" id="age" name="age" value="<?= htmlspecialchars($age) ?>" placeholder="e.g. 21">
            </div>

            <!-- Website / URL -->
            <div class="form-group">
                <label for="website">Website URL <span class="hint">(FILTER_VALIDATE_URL)</span>:</label>
                <input type="text" id="website" name="website" value="<?= htmlspecialchars($website) ?>" placeholder="e.g. https://au.edu.kh">
            </div>

            <!-- GPA / Float -->
            <div class="form-group">
                <label for="gpa">GPA Score <span class="hint">(FILTER_VALIDATE_FLOAT 0.0-4.0)</span>:</label>
                <input type="text" id="gpa" name="gpa" value="<?= htmlspecialchars($gpa) ?>" placeholder="e.g. 3.75">
            </div>
        </div>

        <div class="btn-group">
            <button type="submit" class="btn btn-submit">Test Data Filters (ដំណើរការ Filter)</button>
            <a href="index.php" class="btn btn-reset">Clear</a>
        </div>
    </form>

    <!-- Results Table -->
    <?php if ($isSubmitted): ?>
        <div class="alert-box <?= empty(array_filter($results, fn($r) => !$r['valid'])) ? 'alert-success' : 'alert-error' ?>">
            <h3 style="margin-bottom: 6px;">📊 Filter Validation Report (របាយការណ៍):</h3>
            <table class="table-data">
                <thead>
                    <tr>
                        <th>Field Name</th>
                        <th>Filter Constant</th>
                        <th>Your Input</th>
                        <th>Status</th>
                        <th>Filtered Output</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($results as $field => $info): ?>
                        <tr>
                            <td><strong><?= htmlspecialchars($field) ?></strong></td>
                            <td><code><?= htmlspecialchars($info['filter']) ?></code></td>
                            <td><?= htmlspecialchars($info['value'] ?: '(Empty)') ?></td>
                            <td>
                                <?php if ($info['valid']): ?>
                                    <span class="badge-status badge-valid">✓ PASS</span>
                                <?php else: ?>
                                    <span class="badge-status badge-invalid">✗ FAIL</span>
                                <?php endif; ?>
                            </td>
                            <td><?= htmlspecialchars((string)$info['cleaned']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>

    <!-- Summary of Filters -->
    <div class="table-summary">
        <h3>📚 តារាង PHP Filter Constants ដែលគេនិយមប្រើបំផុត៖</h3>
        <table class="table-data">
            <thead>
                <tr>
                    <th>Filter Constant</th>
                    <th>តួនាទី (Description)</th>
                    <th>ឧទាហរណ៍តម្លៃត្រូវ (Valid Example)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><code>FILTER_VALIDATE_EMAIL</code></td>
                    <td>ផ្ទៀងផ្ទាត់ទម្រង់អាសយដ្ឋានអ៊ីមែល</td>
                    <td><code>student@au.edu.kh</code></td>
                </tr>
                <tr>
                    <td><code>FILTER_VALIDATE_INT</code></td>
                    <td>ផ្ទៀងផ្ទាត់លេខចំនួនគត់ (គាំទ្រ Options min/max range)</td>
                    <td><code>25</code>, <code>-10</code>, <code>0</code></td>
                </tr>
                <tr>
                    <td><code>FILTER_VALIDATE_FLOAT</code></td>
                    <td>ផ្ទៀងផ្ទាត់ចំនួនទសភាគ (Decimal / Floating point)</td>
                    <td><code>3.14</code>, <code>99.95</code></td>
                </tr>
                <tr>
                    <td><code>FILTER_VALIDATE_URL</code></td>
                    <td>ផ្ទៀងផ្ទាត់អាសយដ្ឋាន Web URL</td>
                    <td><code>https://google.com</code></td>
                </tr>
                <tr>
                    <td><code>FILTER_VALIDATE_IP</code></td>
                    <td>ផ្ទៀងផ្ទាត់ IPv4 ឬ IPv6 Address</td>
                    <td><code>192.168.1.1</code></td>
                </tr>
                <tr>
                    <td><code>FILTER_VALIDATE_BOOLEAN</code></td>
                    <td>ផ្ទៀងផ្ទាត់ true/false ("1", "true", "on", "yes")</td>
                    <td><code>true</code>, <code>"yes"</code></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="nav-links">
        <a href="email_validation.php">📄 Handout Simple Script (email_validation.php)</a>
        <a href="sanitize_vs_validate.php">🔍 Sanitize vs Validate Demo →</a>
        <a href="../index.php">← Back to Lesson 4 Hub</a>
    </div>
</div>

</body>
</html>

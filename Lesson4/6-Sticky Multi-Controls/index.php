<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lesson 4 - Sticky Multi-Controls (Radio, Checkbox Array & Select)</title>
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
            max-width: 780px;
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
            background: #fef3c7;
            color: #b45309;
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
            border-left: 4px solid #f59e0b;
            border-radius: 8px;
            padding: 16px;
            margin-bottom: 25px;
            font-size: 0.9rem;
            line-height: 1.6;
        }
        .form-section {
            margin-bottom: 22px;
            padding-bottom: 18px;
            border-bottom: 1px solid #e2e8f0;
        }
        .section-title {
            font-weight: 700;
            font-size: 0.95rem;
            color: #0f172a;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .required {
            color: #ef4444;
        }
        input[type="text"], select {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font-size: 0.92rem;
            outline: none;
            transition: border-color 0.2s;
            background: #ffffff;
        }
        input[type="text"]:focus, select:focus {
            border-color: #f59e0b;
        }
        .options-row {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            margin-top: 6px;
        }
        .custom-option {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.92rem;
            cursor: pointer;
            padding: 6px 12px;
            background: #f8fafc;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            transition: background 0.15s;
        }
        .custom-option:hover {
            background: #f1f5f9;
        }
        .btn-group {
            display: flex;
            gap: 12px;
            margin-top: 25px;
        }
        .btn {
            padding: 10px 22px;
            border: none;
            border-radius: 6px;
            font-size: 0.92rem;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
        }
        .btn-submit {
            background: #f59e0b;
            color: #ffffff;
            flex: 1;
        }
        .btn-submit:hover {
            background: #d97706;
        }
        .btn-reset {
            background: #e2e8f0;
            color: #475569;
        }
        .btn-reset:hover {
            background: #cbd5e1;
        }
        .alert-error {
            padding: 16px;
            border-radius: 8px;
            background: #fef2f2;
            border-left: 4px solid #ef4444;
            color: #991b1b;
            margin-bottom: 20px;
            font-size: 0.9rem;
        }
        .alert-error ul {
            margin-left: 20px;
            margin-top: 6px;
        }
        .alert-success {
            padding: 20px;
            border-radius: 8px;
            background: #ecfdf5;
            border-left: 4px solid #10b981;
            color: #065f46;
            margin-bottom: 25px;
        }
        .student-card {
            margin-top: 15px;
            background: #ffffff;
            border: 1px solid #a7f3d0;
            border-radius: 8px;
            padding: 15px;
        }
        .student-card table {
            width: 100%;
            border-collapse: collapse;
        }
        .student-card td {
            padding: 6px 10px;
            border-bottom: 1px solid #f1f5f9;
            font-size: 0.9rem;
        }
        .rule-table-box {
            margin-top: 35px;
            border-top: 2px solid #e2e8f0;
            padding-top: 25px;
        }
        .rule-table-box h3 {
            font-size: 1.15rem;
            color: #0f172a;
            margin-bottom: 12px;
        }
        .table-rules {
            width: 100%;
            border-collapse: collapse;
        }
        .table-rules th, .table-rules td {
            text-align: left;
            padding: 10px 12px;
            border-bottom: 1px solid #e2e8f0;
            font-size: 0.88rem;
        }
        .table-rules th {
            background: #f8fafc;
            color: #334155;
            font-weight: 700;
        }
        .nav-links {
            margin-top: 30px;
            display: flex;
            justify-content: space-between;
            font-size: 0.9rem;
        }
        .nav-links a {
            color: #d97706;
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
    <span class="badge">Lesson 4 / Topic 4.2.4</span>
    <h1>Sticky Multi-Controls</h1>
    <p class="subtitle">
        Preserving state for Radio Buttons, Select Dropdowns, and Checkbox Arrays in PHP.
    </p>

    <!-- Concept Card -->
    <div class="concept-card">
        <strong>💡 គោលការណ៍ Sticky លើ Multi-Controls៖</strong><br>
        • <strong>Radio Buttons & Checkboxes:</strong> ប្រើ Boolean Attribute <code>checked</code><br>
        • <strong>Select Option Dropdown:</strong> ប្រើ Boolean Attribute <code>selected</code><br>
        • <strong>Checkbox Array (<code>skills[]</code>):</strong> ត្រូវប្រើប្រាស់អនុគមន៍ <code>in_array($val, $array)</code> ដើម្បីឆែកមើលថាតើតម្លៃនោះត្រូវបានជ្រើសរើសឬនៅ។
    </div>

    <?php
    $studentName = trim($_POST['student_name'] ?? '');
    $gender      = $_POST['gender'] ?? 'male'; // Default male before submission
    $shift       = $_POST['shift'] ?? '';
    $major       = $_POST['major'] ?? '';
    $skills      = $_POST['skills'] ?? []; // Checkbox array

    $errors = [];
    $isSubmitted = ($_SERVER['REQUEST_METHOD'] === 'POST');

    if ($isSubmitted) {
        if (empty($studentName)) {
            $errors[] = "Student Name is required (សូមបញ្ចូលឈ្មោះសិស្ស)!";
        }
        if (empty($shift)) {
            $errors[] = "Please select a study shift (សូមជ្រើសរើសវេនសិក្សា)!";
        }
        if (empty($major)) {
            $errors[] = "Please select your major (សូមជ្រើសរើសជំនាញសិក្សា)!";
        }
        if (empty($skills)) {
            $errors[] = "Please select at least 1 programming skill (សូមរើសយ៉ាងហោច ១ ជំនាញ)!";
        }
    }
    ?>

    <!-- Error Box -->
    <?php if (!empty($errors)): ?>
        <div class="alert-error">
            <strong>❌ Validation Incomplete (សូមពិនិត្យព័ត៌មានខាងក្រោម):</strong>
            <ul>
                <?php foreach ($errors as $err): ?>
                    <li><?= htmlspecialchars($err) ?></li>
                <?php endforeach; ?>
            </ul>
            <p style="margin-top: 8px; font-size: 0.82rem; color: #7f1d1d;">
                <em>👉 សម្គាល់៖ រាល់ Radio, Checkbox, Select ដែលអ្នកបានរើសនៅតែរក្សាទុកដដែល (Sticky)!</em>
            </p>
        </div>
    <?php endif; ?>

    <!-- Success Box -->
    <?php if ($isSubmitted && empty($errors)): ?>
        <div class="alert-success">
            <h3>🎉 Enrollment Submitted Successfully!</h3>
            <div class="student-card">
                <table>
                    <tr>
                        <td style="width: 160px; font-weight: 700;">Student Name:</td>
                        <td><?= htmlspecialchars($studentName) ?></td>
                    </tr>
                    <tr>
                        <td style="font-weight: 700;">Gender:</td>
                        <td><?= htmlspecialchars(ucfirst($gender)) ?></td>
                    </tr>
                    <tr>
                        <td style="font-weight: 700;">Study Shift:</td>
                        <td><?= htmlspecialchars($shift) ?></td>
                    </tr>
                    <tr>
                        <td style="font-weight: 700;">Major / Degree:</td>
                        <td><?= htmlspecialchars($major) ?></td>
                    </tr>
                    <tr>
                        <td style="font-weight: 700;">Selected Skills:</td>
                        <td><strong><?= htmlspecialchars(implode(', ', $skills)) ?></strong></td>
                    </tr>
                </table>
            </div>
        </div>
    <?php endif; ?>

    <!-- Form Section -->
    <form action="" method="POST">
        <!-- 1. Text Input -->
        <div class="form-section">
            <div class="section-title">1. Student Name <span class="required">*</span>:</div>
            <input type="text" name="student_name" value="<?= htmlspecialchars($studentName) ?>" placeholder="e.g. Heng Piseth">
        </div>

        <!-- 2. Radio Button Group 1: Gender -->
        <div class="form-section">
            <div class="section-title">2. Gender (Radio with Default) <span class="required">*</span>:</div>
            <div class="options-row">
                <label class="custom-option">
                    <input type="radio" name="gender" value="male" <?= ($gender === 'male') ? 'checked' : '' ?>>
                    👨 Male (ប្រុស)
                </label>
                <label class="custom-option">
                    <input type="radio" name="gender" value="female" <?= ($gender === 'female') ? 'checked' : '' ?>>
                    👩 Female (ស្រី)
                </label>
                <label class="custom-option">
                    <input type="radio" name="gender" value="other" <?= ($gender === 'other') ? 'checked' : '' ?>>
                    🧑 Other
                </label>
            </div>
        </div>

        <!-- 3. Radio Button Group 2: Study Shift -->
        <div class="form-section">
            <div class="section-title">3. Study Shift (Radio without Default) <span class="required">*</span>:</div>
            <div class="options-row">
                <label class="custom-option">
                    <input type="radio" name="shift" value="Morning" <?= ($shift === 'Morning') ? 'checked' : '' ?>>
                    🌅 ព្រឹក (Morning 8:00 - 11:15)
                </label>
                <label class="custom-option">
                    <input type="radio" name="shift" value="Afternoon" <?= ($shift === 'Afternoon') ? 'checked' : '' ?>>
                    ☀️ រសៀល (Afternoon 14:00 - 17:15)
                </label>
                <label class="custom-option">
                    <input type="radio" name="shift" value="Evening" <?= ($shift === 'Evening') ? 'checked' : '' ?>>
                    🌙 យប់ (Evening 17:30 - 20:30)
                </label>
            </div>
        </div>

        <!-- 4. Select Dropdown: Major -->
        <div class="form-section">
            <div class="section-title">4. Major / Degree (Select Dropdown) <span class="required">*</span>:</div>
            <select name="major">
                <option value="">-- សូមជ្រើសរើសជំនាញសិក្សា --</option>
                <option value="Computer Science (CS)" <?= ($major === 'Computer Science (CS)') ? 'selected' : '' ?>>Computer Science (CS)</option>
                <option value="Information Technology (IT)" <?= ($major === 'Information Technology (IT)') ? 'selected' : '' ?>>Information Technology (IT)</option>
                <option value="Software Engineering (SE)" <?= ($major === 'Software Engineering (SE)') ? 'selected' : '' ?>>Software Engineering (SE)</option>
                <option value="Cyber Security" <?= ($major === 'Cyber Security') ? 'selected' : '' ?>>Cyber Security</option>
            </select>
        </div>

        <!-- 5. Checkbox Array: Skills -->
        <div class="form-section">
            <div class="section-title">5. Programming Skills (Checkbox Array <code>skills[]</code>) <span class="required">*</span>:</div>
            <p style="font-size: 0.85rem; color: #64748b; margin-bottom: 10px;">
                <em>អាចជ្រើសរើសបានច្រើន (Multiple selection):</em>
            </p>
            <div class="options-row">
                <label class="custom-option">
                    <input type="checkbox" name="skills[]" value="PHP & MySQL" <?= in_array('PHP & MySQL', $skills) ? 'checked' : '' ?>>
                    🐘 PHP & MySQL
                </label>
                <label class="custom-option">
                    <input type="checkbox" name="skills[]" value="JavaScript" <?= in_array('JavaScript', $skills) ? 'checked' : '' ?>>
                    ⚡ JavaScript
                </label>
                <label class="custom-option">
                    <input type="checkbox" name="skills[]" value="Python" <?= in_array('Python', $skills) ? 'checked' : '' ?>>
                    🐍 Python
                </label>
                <label class="custom-option">
                    <input type="checkbox" name="skills[]" value="HTML/CSS" <?= in_array('HTML/CSS', $skills) ? 'checked' : '' ?>>
                    🎨 HTML / CSS
                </label>
                <label class="custom-option">
                    <input type="checkbox" name="skills[]" value="Laravel" <?= in_array('Laravel', $skills) ? 'checked' : '' ?>>
                    🔴 Laravel Framework
                </label>
            </div>
        </div>

        <div class="btn-group">
            <button type="submit" class="btn btn-submit">Submit Application (ផ្ញើទិន្នន័យ)</button>
            <a href="index.php" class="btn btn-reset">Reset All</a>
        </div>
    </form>

    <!-- Syntax & Rules Reference Table -->
    <div class="rule-table-box">
        <h3>📚 ក្បួនសរសេរ Sticky Multi-Controls (Reference Table)៖</h3>
        <table class="table-rules">
            <thead>
                <tr>
                    <th>Control Type</th>
                    <th>HTML Attribute</th>
                    <th>PHP Sticky Syntax</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Radio Button</strong></td>
                    <td><code>checked</code></td>
                    <td><code>&lt;?= ($gender === 'male') ? 'checked' : '' ?&gt;</code></td>
                </tr>
                <tr>
                    <td><strong>Select Option</strong></td>
                    <td><code>selected</code></td>
                    <td><code>&lt;?= ($major === 'IT') ? 'selected' : '' ?&gt;</code></td>
                </tr>
                <tr>
                    <td><strong>Checkbox Array</strong></td>
                    <td><code>checked</code></td>
                    <td><code>&lt;?= in_array('PHP', $skills) ? 'checked' : '' ?&gt;</code></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="nav-links">
        <a href="sticky_multi_controls.php">📄 Handout Script (sticky_multi_controls.php)</a>
        <a href="checkbox_array_explained.php">🔍 Why use name="skills[]"? →</a>
        <a href="../index.php">← Back to Lesson 4 Hub</a>
    </div>
</div>

</body>
</html>

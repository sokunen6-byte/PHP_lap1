<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sticky Form Concept - Text Inputs & Textareas</title>
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
            max-width: 680px;
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
            background: #e0e7ff;
            color: #4338ca;
            margin-bottom: 10px;
            text-transform: uppercase;
        }
        h1 {
            font-size: 1.6rem;
            color: #0f172a;
            margin-bottom: 6px;
        }
        .subtitle {
            font-size: 0.95rem;
            color: #64748b;
            margin-bottom: 25px;
            line-height: 1.5;
        }
        .concept-card {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-left: 4px solid #6366f1;
            border-radius: 8px;
            padding: 16px;
            margin-bottom: 25px;
            font-size: 0.9rem;
            line-height: 1.6;
        }
        .form-group {
            margin-bottom: 18px;
        }
        label {
            display: block;
            font-weight: 600;
            margin-bottom: 6px;
            font-size: 0.9rem;
            color: #334155;
        }
        .required {
            color: #ef4444;
        }
        input[type="text"], input[type="email"], input[type="password"], textarea {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font-size: 0.95rem;
            outline: none;
            transition: border-color 0.2s;
        }
        input[type="text"]:focus, input[type="email"]:focus, input[type="password"]:focus, textarea:focus {
            border-color: #6366f1;
        }
        textarea {
            min-height: 95px;
            resize: vertical;
        }
        .btn-group {
            display: flex;
            gap: 12px;
            margin-top: 25px;
        }
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            font-size: 0.92rem;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }
        .btn-submit {
            background: #4f46e5;
            color: #ffffff;
            flex: 1;
        }
        .btn-submit:hover {
            background: #4338ca;
        }
        .btn-reset {
            background: #e2e8f0;
            color: #475569;
        }
        .btn-reset:hover {
            background: #cbd5e1;
        }
        .alert-error {
            padding: 15px;
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
            padding: 18px;
            border-radius: 8px;
            background: #ecfdf5;
            border-left: 4px solid #10b981;
            color: #065f46;
            margin-bottom: 20px;
        }
        .rule-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-top: 30px;
        }
        @media (max-width: 600px) {
            .rule-grid {
                grid-template-columns: 1fr;
            }
        }
        .rule-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 15px;
            font-size: 0.85rem;
            line-height: 1.6;
        }
        .rule-card h4 {
            margin-bottom: 6px;
            color: #0f172a;
            font-size: 0.95rem;
        }
        .nav-footer {
            margin-top: 30px;
            display: flex;
            justify-content: space-between;
            font-size: 0.9rem;
        }
        .nav-footer a {
            color: #4f46e5;
            text-decoration: none;
            font-weight: 600;
        }
        .nav-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <span class="badge">Lesson 4 / Topic 4.2.3</span>
    <h1>Sticky Form Concept & Controls</h1>
    <p class="subtitle">
        Preserving user input inside <code>&lt;input type="text"&gt;</code> and <code>&lt;textarea&gt;</code> when validation fails.
    </p>

    <!-- Concept Explanation -->
    <div class="concept-card">
        <strong>💡 តើអ្វីជា Sticky Form?</strong><br>
        Sticky Form គឺជាបច្ចេកទេសរចនា <strong>User Experience (UX)</strong> ដ៏សំខាន់។ នៅពេល User បំពេញ Form រួចចុច Submit ហើយមាន Error លើ Field ណាមួយ ប្រព័ន្ធត្រូវរក្សាទុកតម្លៃដែល User បានបំពេញរួចក្នុងប្រអប់ដទៃទៀត កុំឱ្យ User ត្រូវចំណាយពេលវាយបញ្ចូលឡើងវិញពីដើម។
    </div>

    <?php
    // ១. ចាប់យកតម្លៃដែលបាន submit តាមរយៈ POST
    $fullname = trim($_POST['fullname'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $address  = trim($_POST['address'] ?? '');
    $bio      = trim($_POST['bio'] ?? '');
    // សម្គាល់៖ password មិនត្រូវធ្វើឱ្យ Sticky ឡើយ!

    $errors = [];
    $isSubmitted = ($_SERVER['REQUEST_METHOD'] === 'POST');

    // ២. Validation ផ្ទៀងផ្ទាត់ទិន្នន័យ
    if ($isSubmitted) {
        if (empty($fullname)) {
            $errors[] = "Full Name មិនអាចទទេបានទេ (សូមបញ្ចូលឈ្មោះ)!";
        }
        if (empty($email)) {
            $errors[] = "Email មិនអាចទទេបានទេ (សូមបញ្ចូលអ៊ីមែល)!";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "ទម្រង់ Email មិនត្រឹមត្រូវឡើយ (Invalid email format)!";
        }
        $password = $_POST['password'] ?? '';
        if (empty($password)) {
            $errors[] = "Password មិនអាចទទេបានទេ (សូមបញ្ចូលលេខសម្ងាត់)!";
        }
    }
    ?>

    <!-- បង្ហាញ Error Message ប្រសិនបើ Validation មិនជោគជ័យ -->
    <?php if (!empty($errors)): ?>
        <div class="alert-error">
            <strong>❌ Validation Failed (ទិន្នន័យមិនទាន់គ្រប់គ្រាន់):</strong>
            <ul>
                <?php foreach ($errors as $err): ?>
                    <li><?= htmlspecialchars($err) ?></li>
                <?php endforeach; ?>
            </ul>
            <p style="margin-top: 8px; font-size: 0.82rem; color: #7f1d1d;">
                <em>👉 សម្គាល់៖ សូមសង្កេតមើលប្រអប់ខាងក្រោម ទិន្នន័យដែលអ្នកបានវាយនៅតែរក្សាទុកដដែល (Sticky)!</em>
            </p>
        </div>
    <?php endif; ?>

    <!-- បង្ហាញ Success Message ប្រសិនបើ Validation ជោគជ័យ -->
    <?php if ($isSubmitted && empty($errors)): ?>
        <div class="alert-success">
            <h3 style="margin-bottom: 8px;">🎉 Form Submitted Successfully!</h3>
            <p><strong>Full Name:</strong> <?= htmlspecialchars($fullname) ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($email) ?></p>
            <p><strong>Address:</strong> <?= htmlspecialchars($address ?: 'N/A') ?></p>
            <p><strong>Bio / Comment:</strong> <?= nl2br(htmlspecialchars($bio ?: 'N/A')) ?></p>
        </div>
    <?php endif; ?>

    <!-- Form Section -->
    <form action="" method="POST">
        <!-- 1. Sticky Text Input: Full Name -->
        <div class="form-group">
            <label for="fullname">Full Name <span class="required">*</span>:</label>
            <!-- ប្រើ attribute value="<?= htmlspecialchars($fullname) ?>" -->
            <input type="text" id="fullname" name="fullname" value="<?= htmlspecialchars($fullname) ?>" placeholder="e.g. Chan Dara">
        </div>

        <!-- 2. Sticky Text Input: Email -->
        <div class="form-group">
            <label for="email">Email Address <span class="required">*</span>:</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($email) ?>" placeholder="e.g. dara@example.com">
        </div>

        <!-- 3. Sticky Text Input: Address -->
        <div class="form-group">
            <label for="address">Address (អាសយដ្ឋាន):</label>
            <input type="text" id="address" name="address" value="<?= htmlspecialchars($address) ?>" placeholder="e.g. Phnom Penh, Cambodia">
        </div>

        <!-- 4. NON-STICKY Password Input -->
        <div class="form-group">
            <label for="password">Password <span class="required">*</span> <span style="font-weight: normal; color: #64748b; font-size: 0.8rem;">(Security: Never Sticky)</span>:</label>
            <!-- Password មិនត្រូវដាក់ value="" ឡើយ! -->
            <input type="password" id="password" name="password" placeholder="Enter password (e.g. 123456)">
        </div>

        <!-- 5. Sticky Textarea: Bio / Feedback -->
        <div class="form-group">
            <label for="bio">Bio / Comment (Textarea):</label>
            <!-- សម្រាប់ <textarea> តម្លៃត្រូវដាក់នៅចន្លោះ Opening និង Closing Tags -->
            <textarea id="bio" name="bio" placeholder="Write your biography or feedback here..."><?= htmlspecialchars($bio) ?></textarea>
        </div>

        <div class="btn-group">
            <button type="submit" class="btn btn-submit">Submit Form (សាកល្បង Submit)</button>
            <a href="index.php" class="btn btn-reset">Clear / Reset</a>
        </div>
    </form>

    <!-- Key Rules -->
    <div class="rule-grid">
        <div class="rule-card">
            <h4>📌 1. Sticky លើ &lt;input&gt;</h4>
            <p>
                ប្រើតាមរយៈ attribute <code>value=""</code><br>
                <code>value="&lt;?= htmlspecialchars($val) ?&gt;"</code>
            </p>
        </div>

        <div class="rule-card">
            <h4>📌 2. Sticky លើ &lt;textarea&gt;</h4>
            <p>
                ដាក់នៅចន្លោះ <code>&lt;textarea&gt;</code> Tags<br>
                <code>&lt;textarea&gt;&lt;?= htmlspecialchars($val) ?&gt;&lt;/textarea&gt;</code>
            </p>
        </div>

        <div class="rule-card">
            <h4>🛡️ 3. ការពារ XSS Attack</h4>
            <p>
                ត្រូវប្រើ <code>htmlspecialchars()</code> ជានិច្ច ដើម្បីការពារការវាយប្រហារ XSS តាមរយៈ Input។
            </p>
        </div>

        <div class="rule-card">
            <h4>🔒 4. Password មិនត្រូវ Sticky</h4>
            <p>
                ជាគោលការណ៍ Security Best Practice មិនត្រូវធ្វើឱ្យ Password មាន Sticky ឡើយ។
            </p>
        </div>
    </div>

    <div class="nav-footer">
        <a href="sticky_text_inputs.php">📄 View Handout Example (sticky_text_inputs.php)</a>
        <a href="../index.php">← Back to Lesson 4 Hub</a>
    </div>
</div>

</body>
</html>

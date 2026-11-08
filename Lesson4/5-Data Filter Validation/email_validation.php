<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>៤.២.២ Data Filter Validation (Handout Example)</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        body {
            background-color: #f1f5f9;
            color: #334155;
            padding: 30px 15px;
        }
        .container {
            max-width: 550px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);
            padding: 25px 30px;
        }
        h2 {
            font-size: 1.3rem;
            color: #0f172a;
            margin-bottom: 6px;
        }
        .subtitle {
            font-size: 0.88rem;
            color: #64748b;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 16px;
        }
        label {
            display: block;
            font-weight: 600;
            margin-bottom: 6px;
            font-size: 0.9rem;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font-size: 0.95rem;
            outline: none;
            transition: border-color 0.2s;
        }
        input[type="text"]:focus {
            border-color: #2563eb;
        }
        button[type="submit"] {
            background: #2563eb;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background: #1d4ed8;
        }
        .alert-error {
            margin-top: 20px;
            padding: 15px;
            background: #fef2f2;
            border-left: 4px solid #ef4444;
            border-radius: 6px;
            color: #991b1b;
            font-size: 0.9rem;
        }
        .alert-success {
            margin-top: 20px;
            padding: 15px;
            background: #ecfdf5;
            border-left: 4px solid #10b981;
            border-radius: 6px;
            color: #065f46;
            font-size: 0.9rem;
        }
        .teacher-box {
            margin-top: 25px;
            padding: 14px 16px;
            background: #eff6ff;
            border-left: 4px solid #3b82f6;
            border-radius: 6px;
            font-size: 0.85rem;
            color: #1e40af;
            line-height: 1.6;
        }
        .nav-back {
            display: inline-block;
            margin-top: 20px;
            color: #64748b;
            text-decoration: none;
            font-size: 0.88rem;
        }
        .nav-back:hover {
            color: #0f172a;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>៤.២.២ Data Filter Validation ជាមួយ filter_var()</h2>
    <p class="subtitle">គំរូកូដ <code>email_validation.php</code> ពី Handout មេរៀនទី ៤ (សាស្ត្រាចារ្យ សឿង លីម)</p>

    <?php
    $email = trim($_POST['email'] ?? '');
    $age = trim($_POST['age'] ?? '');
    $errors = [];
    $isSubmitted = ($_SERVER["REQUEST_METHOD"] === "POST");

    if ($isSubmitted) {
        // ១. Validate Email Format ជាមួយ FILTER_VALIDATE_EMAIL
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "ទម្រង់អាសយដ្ឋានអ៊ីមែលមិនត្រឹមត្រូវឡើយ!";
        }

        // ២. Validate Integer ជាមួយ FILTER_VALIDATE_INT
        // ចំណាំ៖ ត្រូវប្រៀបធៀបជាមួយ === false ដាច់ខាត (ការពារករណី user បញ្ចូលលេខ 0)
        if (filter_var($age, FILTER_VALIDATE_INT) === false) {
            $errors['age'] = "អាយុត្រូវតែជាតួលេខចំនួនគត់!";
        }
    }
    ?>

    <form method="POST">
        <div class="form-group">
            <label for="email">Email Address:</label>
            <input type="text" id="email" name="email" value="<?= htmlspecialchars($email) ?>" placeholder="e.g. sok@gmail.com (សាកល្បង: sok_at_gmail.com)">
        </div>

        <div class="form-group">
            <label for="age">Age (អាយុ):</label>
            <input type="text" id="age" name="age" value="<?= htmlspecialchars($age) ?>" placeholder="e.g. 20 (សាកល្បង: twenty)">
        </div>

        <button type="submit">Validate Data (ផ្ទៀងផ្ទាត់ទិន្នន័យ)</button>
    </form>

    <?php if ($isSubmitted && !empty($errors)): ?>
        <div class="alert-error">
            <strong>❌ មានកំហុស Validation Errors:</strong>
            <ul style="margin-left: 20px; margin-top: 6px;">
                <?php foreach ($errors as $field => $msg): ?>
                    <li><strong><?= htmlspecialchars($field) ?>:</strong> <?= htmlspecialchars($msg) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php elseif ($isSubmitted && empty($errors)): ?>
        <div class="alert-success">
            <strong>✅ ទិន្នន័យត្រឹមត្រូវទាំងអស់ (All Data Validated)!</strong><br>
            • Email: <strong><?= htmlspecialchars($email) ?></strong><br>
            • Age: <strong><?= htmlspecialchars($age) ?></strong> ឆ្នាំ
        </div>
    <?php endif; ?>

    <div class="teacher-box">
        <strong>💡 ចំណុចសម្គាល់ពីសាស្ត្រាចារ្យ (Teacher Insights):</strong><br>
        • <strong>Return Value:</strong> <code>filter_var()</code> ប្រគល់តម្លៃ Filtered Value មកវិញបើត្រូវ ឬប្រគល់ <code>false</code> បើខុសទម្រង់។<br>
        • <strong>ការប្រុងប្រយ័ត្ន <code>0</code> ជាមួយ integer:</strong> ពេល Validate លេខ <code>0</code>, <code>filter_var(0, FILTER_VALIDATE_INT)</code> ប្រគល់ <code>0</code> ដែល PHP ចាត់ទុកជា <code>falsy</code>! ដូច្នេះ<strong>ត្រូវប្រៀបធៀបជាមួយ <code>=== false</code> ជាដាច់ខាត</strong>។
    </div>

    <a href="index.php" class="nav-back">← Back to Overview</a>
</div>

</body>
</html>

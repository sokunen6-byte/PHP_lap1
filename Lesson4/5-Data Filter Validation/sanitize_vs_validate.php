<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sanitizing vs Validating in PHP</title>
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
            max-width: 650px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);
            padding: 25px 30px;
        }
        h2 {
            font-size: 1.4rem;
            color: #0f172a;
            margin-bottom: 6px;
        }
        .subtitle {
            font-size: 0.9rem;
            color: #64748b;
            margin-bottom: 20px;
        }
        .compare-box {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 25px;
        }
        @media (max-width: 600px) {
            .compare-box {
                grid-template-columns: 1fr;
            }
        }
        .box {
            padding: 15px;
            border-radius: 8px;
            font-size: 0.88rem;
            line-height: 1.5;
        }
        .box-sanitize {
            background: #fffbeb;
            border: 1px solid #fde68a;
            border-left: 4px solid #f59e0b;
        }
        .box-validate {
            background: #ecfdf5;
            border: 1px solid #a7f3d0;
            border-left: 4px solid #10b981;
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
        }
        button[type="submit"] {
            background: #059669;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background: #047857;
        }
        .result-card {
            margin-top: 25px;
            padding: 18px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-size: 0.9rem;
            line-height: 1.8;
        }
        .nav-back {
            display: inline-block;
            margin-top: 25px;
            color: #059669;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
        }
        .nav-back:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Sanitizing vs Validating</h2>
    <p class="subtitle">ស្វែងយល់ពីភាពខុសគ្នារវាងការលាងសម្អាត (Sanitize) និងការផ្ទៀងផ្ទាត់ (Validate)</p>

    <div class="compare-box">
        <div class="box box-sanitize">
            <strong>🧹 1. Sanitization (លាងសម្អាត):</strong><br>
            • លុបចោលតួអក្សរដែលមិនត្រឹមត្រូវចេញពី String<br>
            • ឧទាហរណ៍៖ <code>FILTER_SANITIZE_EMAIL</code><br>
            • មិនប្រាប់ថាល្អឬអាក្រក់ទេ គ្រាន់តែកាត់ចោលតួអក្សរខុស!
        </div>
        <div class="box box-validate">
            <strong>✅ 2. Validation (ផ្ទៀងផ្ទាត់):</strong><br>
            • ពិនិត្យមើលថាតើទិន្នន័យស្របតាមលក្ខខណ្ឌឬអត់<br>
            • ឧទាហរណ៍៖ <code>FILTER_VALIDATE_EMAIL</code><br>
            • ប្រគល់តម្លៃត្រឡប់មកវិញ ឬប្រគល់ <code>false</code>!
        </div>
    </div>

    <?php
    $rawInput = trim($_POST['raw_input'] ?? 'sok(test)///@gmail.com');
    $isSubmitted = ($_SERVER['REQUEST_METHOD'] === 'POST');

    // ១. Sanitize: កម្ចាត់តួអក្សរខុសច្បាប់
    $sanitized = filter_var($rawInput, FILTER_SANITIZE_EMAIL);

    // ២. Validate: ពិនិត្យមើលថាតើទម្រង់ត្រឹមត្រូវឬនៅ
    $isValid = filter_var($sanitized, FILTER_VALIDATE_EMAIL);
    ?>

    <form method="POST">
        <div class="form-group">
            <label for="raw_input">សាកល្បងបញ្ចូលអ៊ីមែលដែលមានតួអក្សរខុស (Messy Input):</label>
            <input type="text" id="raw_input" name="raw_input" value="<?= htmlspecialchars($rawInput) ?>">
        </div>

        <button type="submit">Process (Sanitize & Validate)</button>
    </form>

    <div class="result-card">
        <strong>លទ្ធផលនៃការសាកល្បង៖</strong><br>
        1. <strong>Original Input (ដើម):</strong> <code><?= htmlspecialchars($rawInput) ?></code><br>
        2. <strong>After FILTER_SANITIZE_EMAIL (លាងរួច):</strong> <code><?= htmlspecialchars($sanitized) ?></code><br>
        3. <strong>After FILTER_VALIDATE_EMAIL (ផ្ទៀងផ្ទាត់):</strong> 
        <?php if ($isValid !== false): ?>
            <span style="color: #16a34a; font-weight: 700;">✅ Valid Email Address!</span>
        <?php else: ?>
            <span style="color: #dc2626; font-weight: 700;">❌ Still Invalid!</span>
        <?php endif; ?>
    </div>

    <a href="index.php" class="nav-back">← Back to Data Filter Overview</a>
</div>

</body>
</html>

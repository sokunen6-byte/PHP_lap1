<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Understanding Checkbox Array: name="skills[]"</title>
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
            max-width: 680px;
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
        .comparison-cards {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 25px;
        }
        @media (max-width: 600px) {
            .comparison-cards {
                grid-template-columns: 1fr;
            }
        }
        .card {
            padding: 16px;
            border-radius: 8px;
            font-size: 0.88rem;
            line-height: 1.6;
        }
        .card-wrong {
            background: #fef2f2;
            border: 1px solid #fecaca;
            border-left: 4px solid #ef4444;
        }
        .card-correct {
            background: #ecfdf5;
            border: 1px solid #a7f3d0;
            border-left: 4px solid #10b981;
        }
        .code-block {
            background: #0f172a;
            color: #38bdf8;
            padding: 10px;
            border-radius: 6px;
            font-family: Consolas, monospace;
            font-size: 0.85rem;
            margin-top: 8px;
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
        .result-box {
            margin-top: 25px;
            padding: 16px;
            background: #f8fafc;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 0.9rem;
        }
        pre {
            background: #1e293b;
            color: #f8fafc;
            padding: 12px;
            border-radius: 6px;
            overflow-x: auto;
            font-size: 0.85rem;
            margin-top: 8px;
        }
        .nav-back {
            display: inline-block;
            margin-top: 25px;
            color: #2563eb;
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
    <h2>ហេតុអ្វីត្រូវដាក់ <code>name="skills[]"</code> មានដង្កៀប <code>[]</code>?</h2>
    <p class="subtitle">Why Checkboxes require square brackets in PHP form processing</p>

    <div class="comparison-cards">
        <div class="card card-wrong">
            <strong style="color: #991b1b;">❌ ករណីគ្មានដង្កៀប: <code>name="skills"</code></strong><br>
            នៅពេល User ធីក Checkbox ច្រើន ប្រព័ន្ធ Browser នឹងបញ្ជូន key ឈ្មោះដដែលៗ (ឧ. <code>skills=PHP&skills=JS</code>)។<br>
            <strong>លទ្ធផល៖</strong> PHP នឹងចាប់បានតែ Checkbox ចុងក្រោយគេបង្អស់តែមួយគត់! ព័ត៌មានមុនៗត្រូវបាត់បង់ទាំងអស់។
        </div>
        <div class="card card-correct">
            <strong style="color: #065f46;">✅ ករណីមានដង្កៀប: <code>name="skills[]"</code></strong><br>
            ដង្កៀប <code>[]</code> ប្រាប់ទៅកាន់ PHP ឱ្យបង្កើត Indexed Array ស្វ័យប្រវត្តិ។<br>
            <strong>លទ្ធផល៖</strong> PHP ចាប់យកតម្លៃដែល User បានធីកទាំងអស់ចូលទៅក្នុង <code>$_POST['skills']</code> ជា Array ពេញលេញ!
        </div>
    </div>

    <!-- Live Test Form -->
    <form method="POST">
        <p><strong>សាកល្បងធីក Checkbox ច្រើនខាងក្រោម៖</strong></p>
        <div style="margin: 15px 0;">
            <?php
            $mySkills = $_POST['my_skills'] ?? [];
            $available = ['PHP', 'MySQL', 'JavaScript', 'Tailwind', 'Docker'];
            foreach ($available as $item): ?>
                <label style="margin-right: 15px; cursor: pointer;">
                    <input type="checkbox" name="my_skills[]" value="<?= $item ?>" <?= in_array($item, $mySkills) ? 'checked' : '' ?>>
                    <?= $item ?>
                </label>
            <?php endforeach; ?>
        </div>

        <button type="submit">Submit & View PHP Array</button>
    </form>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <div class="result-box">
            <strong>📊 ទម្រង់ Array ដែល PHP ទទួលបានក្នុង <code>$_POST['my_skills']</code>:</strong>
            <pre><?php print_r($mySkills); ?></pre>

            <p style="margin-top: 10px;">
                ចំនួនធាតុដែលបានជ្រើសរើស៖ <strong><?= count($mySkills) ?></strong><br>
                <?php if (!empty($mySkills)): ?>
                    បង្ហាញជាអត្ថបទ (String)៖ <code><?= htmlspecialchars(implode(', ', $mySkills)) ?></code>
                <?php else: ?>
                    <em>គ្មាន Checkbox ណាមួយត្រូវបានជ្រើសឡើយ</em>
                <?php endif; ?>
            </p>
        </div>
    <?php endif; ?>

    <a href="index.php" class="nav-back">← Back to Sticky Multi-Controls</a>
</div>

</body>
</html>

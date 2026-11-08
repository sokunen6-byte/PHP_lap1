<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>៤.២.៤ Sticky Multi-Controls (Handout Example)</title>
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
        .control-group {
            margin-bottom: 18px;
            padding-bottom: 14px;
            border-bottom: 1px dashed #e2e8f0;
        }
        .control-title {
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 0.95rem;
            color: #1e293b;
        }
        label {
            margin-right: 15px;
            font-size: 0.9rem;
            cursor: pointer;
        }
        select {
            width: 100%;
            padding: 9px 12px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font-size: 0.95rem;
            background: #ffffff;
            outline: none;
        }
        button[type="submit"] {
            background: #2563eb;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 5px;
        }
        button[type="submit"]:hover {
            background: #1d4ed8;
        }
        .result-box {
            margin-top: 20px;
            padding: 15px;
            background: #ecfdf5;
            border-left: 4px solid #10b981;
            border-radius: 6px;
            color: #065f46;
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
    <h2>៤.២.៤ Sticky Multi-Controls</h2>
    <p class="subtitle">គំរូកូដ <code>sticky_multi_controls.php</code> ពី Handout មេរៀនទី ៤ (សាស្ត្រាចារ្យ សឿង លីម)</p>

    <?php
    // ចាប់យកតម្លៃដែលបាន submit តាមរយៈ POST
    $gender = $_POST['gender'] ?? 'male';
    $degree = $_POST['degree'] ?? '';
    $skills = $_POST['skills'] ?? []; // Array of checkboxes
    $isSubmitted = ($_SERVER['REQUEST_METHOD'] === 'POST');
    ?>

    <form method="POST">
        <!-- 1. Radio Buttons (ប្រើ attribute 'checked') -->
        <div class="control-group">
            <div class="control-title">ភេទ (Gender - Radio):</div>
            <label>
                <input type="radio" name="gender" value="male" <?= ($gender === 'male') ? 'checked' : '' ?>> ប្រុស (Male)
            </label>
            <label>
                <input type="radio" name="gender" value="female" <?= ($gender === 'female') ? 'checked' : '' ?>> ស្រី (Female)
            </label>
        </div>

        <!-- 2. Select Dropdown (ប្រើ attribute 'selected') -->
        <div class="control-group">
            <div class="control-title">កម្រិតជំនាញ / មហាវិទ្យាល័យ (Degree - Select):</div>
            <select name="degree">
                <option value="">-- សូមជ្រើសរើសជំនាញ --</option>
                <option value="CS" <?= ($degree === 'CS') ? 'selected' : '' ?>>Computer Science (CS)</option>
                <option value="IT" <?= ($degree === 'IT') ? 'selected' : '' ?>>Information Technology (IT)</option>
                <option value="MIS" <?= ($degree === 'MIS') ? 'selected' : '' ?>>Management Information Systems (MIS)</option>
            </select>
        </div>

        <!-- 3. Checkbox Array (ប្រើ attribute 'checked' ជាមួយ in_array()) -->
        <div class="control-group">
            <div class="control-title">ជំនាញបច្ចេកវិទ្យា (Skills - Checkbox Array <code>skills[]</code>):</div>
            <label>
                <input type="checkbox" name="skills[]" value="PHP" <?= in_array('PHP', $skills) ? 'checked' : '' ?>> PHP
            </label>
            <label>
                <input type="checkbox" name="skills[]" value="JS" <?= in_array('JS', $skills) ? 'checked' : '' ?>> JavaScript
            </label>
            <label>
                <input type="checkbox" name="skills[]" value="MySQL" <?= in_array('MySQL', $skills) ? 'checked' : '' ?>> MySQL
            </label>
        </div>

        <button type="submit">Submit Multi-Controls</button>
    </form>

    <?php if ($isSubmitted): ?>
        <div class="result-box">
            <strong>✅ លទ្ធផលទទួលបានពី Form:</strong><br>
            • ភេទ (Gender): <strong><?= htmlspecialchars($gender) ?></strong><br>
            • ជំនាញ (Degree): <strong><?= htmlspecialchars($degree ?: 'មិនបានជ្រើស') ?></strong><br>
            • ជំនាញដែលចេះ (Skills Array): 
            <strong>
                <?= !empty($skills) ? htmlspecialchars(implode(', ', $skills)) : 'មិនបានជ្រើសរើស' ?>
            </strong>
        </div>
    <?php endif; ?>

    <div class="teacher-box">
        <strong>💡 ចំណុចសម្គាល់ពីសាស្ត្រាចារ្យ (Teacher Insights):</strong><br>
        • <strong>Radio Buttons:</strong> ប្រើ <code>($gender === 'value') ? 'checked' : ''</code><br>
        • <strong>Select Dropdown:</strong> ប្រើ <code>($degree === 'value') ? 'selected' : ''</code><br>
        • <strong>Checkbox Array:</strong> ត្រូវតែដាក់ឈ្មោះ <code>name="skills[]"</code> (មានដង្កៀប <code>[]</code>) ហើយប្រើ <code>in_array('val', $skills) ? 'checked' : ''</code>!
    </div>

    <a href="index.php" class="nav-back">← Back to Multi-Controls Hub</a>
</div>

</body>
</html>

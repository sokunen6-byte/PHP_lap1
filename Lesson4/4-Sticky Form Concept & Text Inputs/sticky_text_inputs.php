<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>៤.២.៣ Sticky Form - Text Inputs & Textareas</title>
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
        input[type="text"], textarea {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font-size: 0.95rem;
            outline: none;
            transition: border-color 0.2s;
        }
        input[type="text"]:focus, textarea:focus {
            border-color: #2563eb;
        }
        textarea {
            resize: vertical;
            min-height: 90px;
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
            margin-top: 20px;
            padding: 15px;
            background: #ecfdf5;
            border-left: 4px solid #10b981;
            border-radius: 6px;
            color: #065f46;
        }
        .note-box {
            margin-top: 20px;
            padding: 12px 16px;
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
    <h2>៤.២.៣ Sticky Form Concept (Handout Example)</h2>
    <p class="subtitle">គំរូកូដផ្ទាល់ចេញពី Handout មេរៀនទី ៤ (សាស្ត្រាចារ្យ សឿង លីម)</p>

    <?php
    // ចាប់យកតម្លៃដែលបាន Submit តាមរយៈ POST
    $address = trim($_POST['address'] ?? '');
    $comment = trim($_POST['comment'] ?? '');
    $submitted = ($_SERVER['REQUEST_METHOD'] === 'POST');
    ?>

    <form method="POST">
        <div class="form-group">
            <label for="address">អាសយដ្ឋាន (Address - Text Input)៖</label>
            <!-- សម្រាប់ <input type="text"> គឺបញ្ចូលតម្លៃតាម attribute value="" -->
            <input type="text" id="address" name="address" value="<?= htmlspecialchars($address) ?>" placeholder="ឧ. រាជធានីភ្នំពេញ">
        </div>

        <div class="form-group">
            <label for="comment">មតិយោបល់ (Comment - Textarea)៖</label>
            <!-- ចំពោះ <textarea> គឺបញ្ចូលទិន្នន័យនៅចន្លោះ Opening និង Closing Tags -->
            <textarea id="comment" name="comment" rows="3" placeholder="វាយមតិយោបល់នៅទីនេះ..."><?= htmlspecialchars($comment) ?></textarea>
        </div>

        <button type="submit">ផ្ញើទិន្នន័យ (Submit)</button>
    </form>

    <?php if ($submitted): ?>
        <div class="result-box">
            <strong>✅ លទ្ធផលទទួលបាន (Submitted Data):</strong><br>
            • អាសយដ្ឋាន៖ <?= htmlspecialchars($address ?: '(ទទេ)') ?><br>
            • មតិយោបល់៖ <?= nl2br(htmlspecialchars($comment ?: '(ទទេ)')) ?>
        </div>
    <?php endif; ?>

    <div class="note-box">
        <strong>💡 ចំណុចសំខាន់ (Key Syntax):</strong><br>
        1. <code>&lt;input type="text" value="&lt;?= htmlspecialchars($address) ?&gt;"&gt;</code><br>
        2. <code>&lt;textarea&gt;&lt;?= htmlspecialchars($comment) ?&gt;&lt;/textarea&gt;</code><br>
        3. ត្រូវប្រើ <code>htmlspecialchars()</code> ជានិច្ចដើម្បីទប់ស្កាត់ XSS Attack!
    </div>

    <a href="index.php" class="nav-back">← Back to Overview</a>
</div>

</body>
</html>

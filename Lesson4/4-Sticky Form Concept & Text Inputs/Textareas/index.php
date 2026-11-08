<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sticky Form - Textarea Control</title>
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
            max-width: 580px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);
            padding: 25px 30px;
        }
        h2 {
            font-size: 1.35rem;
            color: #0f172a;
            margin-bottom: 6px;
        }
        .subtitle {
            font-size: 0.9rem;
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
        textarea, input[type="text"] {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font-size: 0.95rem;
            outline: none;
            transition: border-color 0.2s;
        }
        textarea:focus, input[type="text"]:focus {
            border-color: #4f46e5;
        }
        textarea {
            min-height: 120px;
            resize: vertical;
        }
        button[type="submit"] {
            background: #4f46e5;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background: #4338ca;
        }
        .result-box {
            margin-top: 20px;
            padding: 15px;
            background: #ecfdf5;
            border-left: 4px solid #10b981;
            border-radius: 6px;
            color: #065f46;
        }
        .notice {
            background: #fef3c7;
            border-left: 4px solid #f59e0b;
            color: #92400e;
            padding: 12px;
            border-radius: 6px;
            font-size: 0.85rem;
            margin-bottom: 20px;
            line-height: 1.5;
        }
        .nav-back {
            display: inline-block;
            margin-top: 20px;
            color: #4f46e5;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 600;
        }
        .nav-back:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Sticky Textarea Example</h2>
    <p class="subtitle">Focusing on how to make <code>&lt;textarea&gt;</code> preserve multi-line input</p>

    <div class="notice">
        <strong>⚠️ សម្គាល់ពិសេសលើ &lt;textarea&gt;៖</strong><br>
        <code>&lt;textarea&gt;</code> <strong>គ្មាន attribute <code>value=""</code> ទេ</strong>! តម្លៃត្រូវតែដាក់នៅចន្លោះ tag បើក និង tag បិទ៖<br>
        <code>&lt;textarea name="message"&gt;&lt;?= htmlspecialchars($message) ?&gt;&lt;/textarea&gt;</code>
    </div>

    <?php
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');
    $isSubmitted = ($_SERVER['REQUEST_METHOD'] === 'POST');
    ?>

    <form method="POST">
        <div class="form-group">
            <label for="subject">Subject (ប្រធានបទ - Text Input)៖</label>
            <input type="text" id="subject" name="subject" value="<?= htmlspecialchars($subject) ?>" placeholder="e.g. Website Inquiry">
        </div>

        <div class="form-group">
            <label for="message">Detailed Message (សារលម្អិត - Textarea)៖</label>
            <!-- Sticky Textarea -->
            <textarea id="message" name="message" placeholder="Type your message here..."><?= htmlspecialchars($message) ?></textarea>
        </div>

        <button type="submit">Submit Feedback</button>
    </form>

    <?php if ($isSubmitted): ?>
        <div class="result-box">
            <h4 style="margin-bottom: 6px;">Received Data:</h4>
            <p><strong>Subject:</strong> <?= htmlspecialchars($subject ?: '(Empty)') ?></p>
            <p><strong>Message:</strong><br><?= nl2br(htmlspecialchars($message ?: '(Empty)')) ?></p>
        </div>
    <?php endif; ?>

    <a href="../index.php" class="nav-back">← Back to Sticky Form Folder</a>
</div>

</body>
</html>

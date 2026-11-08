<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Detection - isset() Function</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
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
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }
        h1 {
            font-size: 1.5rem;
            color: #0f172a;
            margin-bottom: 6px;
        }
        .subtitle {
            font-size: 0.9rem;
            color: #64748b;
            margin-bottom: 25px;
        }
        .code-box {
            background: #0f172a;
            color: #a7f3d0;
            padding: 14px 18px;
            border-radius: 8px;
            font-family: Consolas, monospace;
            font-size: 0.9rem;
            margin-bottom: 25px;
            line-height: 1.5;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-weight: 600;
            margin-bottom: 5px;
            font-size: 0.9rem;
        }
        input[type="text"], input[type="search"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font-size: 0.95rem;
        }
        .btn-group {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }
        .btn-action {
            padding: 10px 18px;
            border: none;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            color: white;
        }
        .btn-save {
            background: #10b981;
        }
        .btn-save:hover {
            background: #059669;
        }
        .btn-draft {
            background: #6366f1;
        }
        .btn-draft:hover {
            background: #4f46e5;
        }
        .status-box {
            margin-top: 25px;
            padding: 16px;
            border-radius: 8px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
        }
        .btn-back {
            display: inline-block;
            margin-top: 25px;
            color: #64748b;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
        }
        .btn-back:hover {
            color: #0f172a;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Request Detection with <code>isset()</code></h1>
    <p class="subtitle">Detecting which button or form was submitted</p>

    <div class="code-box">
        // Request Detection using isset()<br>
        if (isset($_POST['saveBtn'])) {<br>
        &nbsp;&nbsp;&nbsp;&nbsp;// User clicked 'Save & Publish'<br>
        } elseif (isset($_POST['draftBtn'])) {<br>
        &nbsp;&nbsp;&nbsp;&nbsp;// User clicked 'Save as Draft'<br>
        }
    </div>

    <form action="" method="POST">
        <div class="form-group">
            <label for="title">Article / Task Title:</label>
            <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($_POST['title'] ?? ''); ?>" placeholder="Enter a title..." required>
        </div>

        <div class="btn-group">
            <!-- ផ្តល់ឈ្មោះខុសគ្នាទៅប៊ូតុងនីមួយៗ (Distinct name attributes) -->
            <button type="submit" name="saveBtn" class="btn-action btn-save">💾 Save & Publish</button>
            <button type="submit" name="draftBtn" class="btn-action btn-draft">📝 Save as Draft</button>
        </div>
    </form>

    <div class="status-box">
        <?php
        if (isset($_POST['saveBtn'])) {
            $title = $_POST['title'] ?? '';
            echo '<div style="color: #059669; font-weight: 700; margin-bottom: 5px;">✅ Action: Published!</div>';
            echo '<p>ប៊ូតុង <strong>Save & Publish</strong> (<code>$_POST["saveBtn"]</code>) ត្រូវបានចុច។</p>';
            echo '<p>ចំណងជើង៖ <strong>' . htmlspecialchars($title) . '</strong></p>';
        } elseif (isset($_POST['draftBtn'])) {
            $title = $_POST['title'] ?? '';
            echo '<div style="color: #4f46e5; font-weight: 700; margin-bottom: 5px;">📝 Action: Saved as Draft!</div>';
            echo '<p>ប៊ូតុង <strong>Save as Draft</strong> (<code>$_POST["draftBtn"]</code>) ត្រូវបានចុច។</p>';
            echo '<p>ចំណងជើង៖ <strong>' . htmlspecialchars($title) . '</strong></p>';
        } else {
            echo '<div style="color: #64748b; font-weight: 600;">ℹ️ Form not submitted yet.</div>';
            echo '<p>មិនទាន់មានប៊ូតុងណាមួយត្រូវបានចុចនៅឡើយទេ (Please click one of the buttons above).</p>';
        }
        ?>
    </div>

    <a href="index.php" class="btn-back">← Back to REQUEST Folder</a>
</div>

</body>
</html>

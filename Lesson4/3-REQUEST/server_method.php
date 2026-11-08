<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Detection - $_SERVER['REQUEST_METHOD']</title>
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
            color: #38bdf8;
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
        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font-size: 0.95rem;
        }
        .btn-submit {
            padding: 10px 20px;
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
        }
        .btn-submit:hover {
            background: #1d4ed8;
        }
        .status-box {
            margin-top: 25px;
            padding: 16px;
            border-radius: 8px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
        }
        .status-title {
            font-weight: 700;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
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
    <h1>Request Detection with <code>$_SERVER['REQUEST_METHOD']</code></h1>
    <p class="subtitle">Checking how the page is being requested (GET vs POST)</p>

    <div class="code-box">
        // Request Detection Syntax<br>
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {<br>
        &nbsp;&nbsp;&nbsp;&nbsp;// Execute code only when form is submitted via POST<br>
        }
    </div>

    <!-- Self-submitting POST form -->
    <form action="" method="POST">
        <div class="form-group">
            <label for="student_name">Student Name:</label>
            <input type="text" id="student_name" name="student_name" placeholder="Enter student name" required>
        </div>

        <div class="form-group">
            <label for="course">Course Name:</label>
            <input type="text" id="course" name="course" placeholder="e.g. Web Application (PHP)" required>
        </div>

        <button type="submit" class="btn-submit">Submit with POST</button>
    </form>

    <div class="status-box">
        <?php
        // Request detection logic
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $student = $_POST['student_name'] ?? '';
            $course  = $_POST['course'] ?? '';
            echo '<div class="status-title" style="color: #16a34a;">🟢 Detected HTTP Request: POST</div>';
            echo '<p>ទិន្នន័យត្រូវបានបញ្ជូនមកតាមរយៈវិធីសាស្ត្រ <strong>POST</strong>។</p>';
            echo '<ul style="margin-left: 20px; margin-top: 8px;">';
            echo '<li>Student Name: <strong>' . htmlspecialchars($student) . '</strong></li>';
            echo '<li>Course: <strong>' . htmlspecialchars($course) . '</strong></li>';
            echo '</ul>';
        } else {
            echo '<div class="status-title" style="color: #2563eb;">🔵 Detected HTTP Request: ' . htmlspecialchars($_SERVER['REQUEST_METHOD']) . '</div>';
            echo '<p>ទំព័រនេះកំពុងផ្ទុកតាមរយៈ <strong>' . htmlspecialchars($_SERVER['REQUEST_METHOD']) . '</strong> (ពេលទើបបើកទំព័រដំបូង ឬ Refresh)។ មិនទាន់មានទិន្នន័យ POST នៅឡើយទេ។</p>';
        }
        ?>
    </div>

    <a href="index.php" class="btn-back">← Back to REQUEST Folder</a>
</div>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Process - POST Result</title>
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
            padding: 40px 15px;
        }
        .container {
            max-width: 550px;
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
        .success-box {
            padding: 16px 20px;
            border-radius: 8px;
            background: #f0fdf4;
            border-left: 4px solid #16a34a;
            color: #166534;
            margin-bottom: 20px;
        }
        .error-box {
            padding: 16px 20px;
            border-radius: 8px;
            background: #fef2f2;
            border-left: 4px solid #ef4444;
            color: #991b1b;
            margin-bottom: 20px;
        }
        .table-data {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        .table-data th, .table-data td {
            text-align: left;
            padding: 10px 12px;
            border-bottom: 1px solid #e2e8f0;
        }
        .table-data th {
            background: #f8fafc;
            color: #475569;
            font-size: 0.85rem;
        }
        .btn-group {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }
        .btn {
            padding: 10px 18px;
            border-radius: 6px;
            font-size: 0.9rem;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
        }
        .btn-primary {
            background: #0ea5e9;
            color: #ffffff;
        }
        .btn-primary:hover {
            background: #0284c7;
        }
        .btn-secondary {
            background: #64748b;
            color: #ffffff;
        }
        .btn-secondary:hover {
            background: #475569;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Login Process Target</h1>
    <p class="subtitle">Reading data from <code>$_POST</code> Superglobal</p>

    <?php
    // ត្រួតពិនិត្យមើលថាតើទិន្នន័យត្រូវបានបញ្ជូនមកតាមរយៈ HTTP POST ឬអត់
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // ចាប់យកតម្លៃពី $_POST
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        $submitted = true;
    } else {
        $username = '';
        $password = '';
        $submitted = false;
    }
    ?>

    <?php if ($submitted && (!empty($username) || !empty($password))): ?>
        <div class="success-box">
            <h3 style="margin-bottom: 6px;">✅ Form Submitted Successfully!</h3>
            <p>ទិន្នន័យត្រូវបានទទួលដោយសុវត្ថិភាពតាមរយៈ POST Body។</p>
        </div>

        <table class="table-data">
            <thead>
                <tr>
                    <th>Field</th>
                    <th>Value Captured via <code>$_POST</code></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Username</strong></td>
                    <td><?php echo htmlspecialchars($username); ?></td>
                </tr>
                <tr>
                    <td><strong>Password</strong></td>
                    <td>
                        <?php 
                        // សុវត្ថិភាព៖ បង្ហាញជា dot/asterisk សម្រាប់ពាក្យសម្ងាត់
                        echo htmlspecialchars(str_repeat('•', strlen($password))); 
                        echo " <span style='color: #64748b; font-size: 0.8rem;'>(" . strlen($password) . " characters)</span>";
                        ?>
                    </td>
                </tr>
                <tr>
                    <td><strong>Raw Password</strong></td>
                    <td><code><?php echo htmlspecialchars($password); ?></code></td>
                </tr>
            </tbody>
        </table>
    <?php else: ?>
        <div class="error-box">
            <h3>⚠️ Access Denied / No POST Data</h3>
            <p>ទំព័រនេះត្រូវតែហៅតាមរយៈ Form POST តែប៉ុណ្ណោះ។ (Please submit the login form first)</p>
        </div>
    <?php endif; ?>

    <div class="btn-group">
        <a href="login.php" class="btn btn-primary">← Back to Login Form</a>
        <a href="index.php" class="btn btn-secondary">POST Overview</a>
    </div>
</div>

</body>
</html>

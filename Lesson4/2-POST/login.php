<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POST Method - Login Form</title>
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
        .login-card {
            max-width: 450px;
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
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font-size: 0.95rem;
            outline: none;
            transition: border-color 0.2s;
        }
        input[type="text"]:focus, input[type="password"]:focus {
            border-color: #0ea5e9;
        }
        .btn-group {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }
        input[type="submit"], input[type="reset"], .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
        }
        input[type="submit"] {
            background: #0ea5e9;
            color: #ffffff;
            flex: 1;
        }
        input[type="submit"]:hover {
            background: #0284c7;
        }
        input[type="reset"] {
            background: #e2e8f0;
            color: #475569;
        }
        input[type="reset"]:hover {
            background: #cbd5e1;
        }
        .security-badge {
            margin-top: 20px;
            padding: 12px;
            background-color: #f0fdf4;
            border-left: 4px solid #16a34a;
            border-radius: 6px;
            font-size: 0.82rem;
            color: #15803d;
            line-height: 1.5;
        }
        .btn-back {
            display: inline-block;
            margin-top: 20px;
            color: #64748b;
            text-decoration: none;
            font-size: 0.9rem;
        }
        .btn-back:hover {
            color: #0f172a;
        }
    </style>
</head>
<body>

<div class="login-card">
    <h1>Login Form</h1>
    <p class="subtitle">Submitting securely with HTTP POST method</p>

    <!-- ទម្រង់បែបបទបញ្ជូនទិន្នន័យតាម POST ទៅកាន់ឯកសារ loginProcess.php -->
    <form action="loginProcess.php" method="POST">
        <div class="form-group">
            <label for="username">Username / Email:</label>
            <input type="text" id="username" name="username" placeholder="admin or student" required>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter password (e.g. 123456)" required>
        </div>

        <div class="btn-group">
            <input type="submit" name="submitLogin" value="Login Now">
            <input type="reset" value="Clear">
        </div>
    </form>

    <div class="security-badge">
        <strong>🔒 សុវត្ថិភាព (Security):</strong><br>
        ការប្រើប្រាស់ <code>method="POST"</code> ធ្វើឱ្យពាក្យសម្ងាត់មិនបង្ហាញនៅលើ URL bar ឡើយ។ ទិន្នន័យត្រូវបានបញ្ជូននៅក្នុង HTTP Request Body។
    </div>

    <a href="index.php" class="btn-back">← Back to POST Folder</a>
</div>

</body>
</html>

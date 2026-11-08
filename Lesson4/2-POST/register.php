<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POST Method - Self-Submitting Registration</title>
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
        .form-group {
            margin-bottom: 16px;
        }
        label {
            display: block;
            font-weight: 600;
            margin-bottom: 6px;
            font-size: 0.9rem;
            color: #334155;
        }
        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font-size: 0.95rem;
            outline: none;
            transition: border-color 0.2s;
        }
        input[type="text"]:focus, input[type="email"]:focus, input[type="password"]:focus {
            border-color: #0ea5e9;
        }
        .btn-group {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }
        input[type="submit"], input[type="reset"], .btn {
            padding: 10px 18px;
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
        .alert-success {
            padding: 15px;
            border-radius: 8px;
            background: #ecfdf5;
            border-left: 4px solid #10b981;
            color: #065f46;
            margin-bottom: 20px;
        }
        .alert-error {
            padding: 15px;
            border-radius: 8px;
            background: #fef2f2;
            border-left: 4px solid #ef4444;
            color: #991b1b;
            margin-bottom: 20px;
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

<div class="container">
    <h1>Student Registration</h1>
    <p class="subtitle">Self-submitting POST form with Sticky Controls</p>

    <?php
    $fullname = '';
    $email    = '';
    $phone    = '';
    $errors   = [];
    $success  = false;

    // ពិនិត្យពេលចុច Submit
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $fullname = trim($_POST['fullname'] ?? '');
        $email    = trim($_POST['email'] ?? '');
        $phone    = trim($_POST['phone'] ?? '');
        $password = $_POST['password'] ?? '';

        // Validation មូលដ្ឋាន
        if (empty($fullname)) {
            $errors[] = "Full Name is required (សូមបញ្ចូលឈ្មោះ)";
        }
        if (empty($email)) {
            $errors[] = "Email is required (សូមបញ្ចូលអ៊ីមែល)";
        }
        if (empty($password)) {
            $errors[] = "Password is required (សូមបញ្ចូលលេខសម្ងាត់)";
        }

        if (empty($errors)) {
            $success = true;
        }
    }
    ?>

    <?php if (!empty($errors)): ?>
        <div class="alert-error">
            <strong>❌ មានកំហុស (Errors):</strong>
            <ul style="margin-left: 20px; margin-top: 5px;">
                <?php foreach ($errors as $error): ?>
                    <li><?php echo htmlspecialchars($error); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if ($success): ?>
        <div class="alert-success">
            <strong>🎉 ចុះឈ្មោះជោគជ័យ (Registration Successful)!</strong><br>
            ឈ្មោះ៖ <?php echo htmlspecialchars($fullname); ?><br>
            អ៊ីមែល៖ <?php echo htmlspecialchars($email); ?><br>
            ទូរស័ព្ទ៖ <?php echo htmlspecialchars($phone); ?>
        </div>
    <?php endif; ?>

    <!-- action="" ឬ action="register.php" method="POST" -->
    <form action="" method="POST">
        <div class="form-group">
            <label for="fullname">Full Name:</label>
            <!-- Sticky Control: value="<?php echo htmlspecialchars($fullname); ?>" -->
            <input type="text" id="fullname" name="fullname" value="<?php echo htmlspecialchars($fullname); ?>" placeholder="e.g. Sok San">
        </div>

        <div class="form-group">
            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" placeholder="e.g. soksan@example.com">
        </div>

        <div class="form-group">
            <label for="phone">Phone Number:</label>
            <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($phone); ?>" placeholder="e.g. 012 345 678">
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Create a password">
        </div>

        <div class="btn-group">
            <input type="submit" value="Register Now">
            <input type="reset" value="Clear">
        </div>
    </form>

    <a href="index.php" class="btn-back">← Back to POST Folder</a>
</div>

</body>
</html>

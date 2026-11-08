<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GET Method - Example 2 (Submit to External Target)</title>
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
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            padding: 25px 30px;
        }
        h1 {
            font-size: 1.5rem;
            color: #0f172a;
            margin-bottom: 8px;
        }
        .subtitle {
            font-size: 0.9rem;
            color: #64748b;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
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
            transition: border-color 0.2s;
        }
        input[type="text"]:focus {
            border-color: #3b82f6;
        }
        .btn-group {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }
        input[type="submit"], input[type="reset"], .btn {
            padding: 10px 18px;
            border: none;
            border-radius: 6px;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }
        input[type="submit"] {
            background: #2563eb;
            color: #ffffff;
        }
        input[type="submit"]:hover {
            background: #1d4ed8;
        }
        input[type="reset"] {
            background: #e2e8f0;
            color: #475569;
        }
        input[type="reset"]:hover {
            background: #cbd5e1;
        }
        .btn-back {
            background: #64748b;
            color: white;
            margin-top: 20px;
        }
        .btn-back:hover {
            background: #475569;
        }
        .info-box {
            margin-top: 20px;
            padding: 12px 16px;
            border-radius: 6px;
            background-color: #eff6ff;
            border-left: 4px solid #3b82f6;
            font-size: 0.85rem;
            color: #1e40af;
            line-height: 1.5;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>GET Method - Example 2</h1>
    <p class="subtitle">Submit to External Target File (បញ្ជូនទៅកាន់ឯកសារគោលដៅ <code>example2Target.php</code>)</p>

    <!-- action="example2Target.php" គឺបញ្ជូនទិន្នន័យទៅកាន់ទំព័រផ្សេង -->
    <form action="example2Target.php" method="get">
        <div class="form-group">
            <label for="firstname">First Name:</label>
            <input type="text" id="firstname" name="firstname" placeholder="Enter first name" required>
        </div>

        <div class="form-group">
            <label for="lastname">Last Name:</label>
            <input type="text" id="lastname" name="lastname" placeholder="Enter last name" required>
        </div>

        <div class="btn-group">
            <input type="submit" value="Submit to example2Target.php">
            <input type="reset" value="Reset">
        </div>
    </form>

    <div class="info-box">
        <strong>💡 របៀបដំណើរការ:</strong><br>
        នៅពេលអ្នកចុច <strong>Submit</strong> កម្មវិធីរុករក (Browser) នឹងបញ្ជូនទៅកាន់ URL: <br>
        <code>example2Target.php?firstname=...&lastname=...</code>
    </div>

    <a href="index.php" class="btn btn-back">← Back to GET Folder</a>
</div>

</body>
</html>

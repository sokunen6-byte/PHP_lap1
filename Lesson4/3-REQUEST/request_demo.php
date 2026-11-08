<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REQUEST - $_REQUEST Superglobal Demo</title>
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
            max-width: 700px;
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
        .grid-forms {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 25px;
        }
        @media (max-width: 600px) {
            .grid-forms {
                grid-template-columns: 1fr;
            }
        }
        .form-box {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 18px;
        }
        .form-box h3 {
            font-size: 1rem;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .form-group {
            margin-bottom: 12px;
        }
        label {
            display: block;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 4px;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px 10px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font-size: 0.9rem;
        }
        input[type="submit"] {
            width: 100%;
            padding: 8px 14px;
            border: none;
            border-radius: 6px;
            font-size: 0.85rem;
            font-weight: 600;
            cursor: pointer;
            margin-top: 6px;
        }
        .btn-get {
            background: #2563eb;
            color: white;
        }
        .btn-get:hover {
            background: #1d4ed8;
        }
        .btn-post {
            background: #0ea5e9;
            color: white;
        }
        .btn-post:hover {
            background: #0284c7;
        }
        .result-box {
            padding: 20px;
            border-radius: 8px;
            background: #ecfdf5;
            border-left: 4px solid #10b981;
            margin-bottom: 20px;
        }
        .table-data {
            width: 100%;
            border-collapse: collapse;
            margin-top: 12px;
        }
        .table-data th, .table-data td {
            text-align: left;
            padding: 8px 10px;
            border-bottom: 1px solid #cbd5e1;
            font-size: 0.9rem;
        }
        .table-data th {
            background: #f1f5f9;
            color: #475569;
        }
        .info-box {
            padding: 14px;
            border-radius: 8px;
            background: #eff6ff;
            border-left: 4px solid #3b82f6;
            color: #1e40af;
            font-size: 0.85rem;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        .btn-back {
            display: inline-block;
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
    <h1>$_REQUEST Superglobal Demo</h1>
    <p class="subtitle">Accepting data from both GET and POST requests</p>

    <div class="info-box">
        <strong>💡 តើ <code>$_REQUEST</code> ជាអ្វី?</strong><br>
        <code>$_REQUEST</code> គឺជា PHP Superglobal Array ដែលប្រមូលផ្តុំទិន្នន័យមកពី <code>$_GET</code>, <code>$_POST</code>, និង <code>$_COOKIE</code> រួមបញ្ចូលគ្នា។<br>
        អ្នកអាច submit តាមរយៈ <strong>Form 1 (GET)</strong> ឬ <strong>Form 2 (POST)</strong> ខាងក្រោម ហើយ <code>$_REQUEST</code> អាចចាប់យកបានទាំងអស់!
    </div>

    <div class="grid-forms">
        <!-- Form 1: GET method -->
        <div class="form-box">
            <h3><span style="color: #2563eb;">●</span> Form 1: Method = GET</h3>
            <form action="" method="GET">
                <div class="form-group">
                    <label>Keyword:</label>
                    <input type="text" name="keyword" value="<?php echo htmlspecialchars($_REQUEST['keyword'] ?? ''); ?>" placeholder="e.g. PHP">
                </div>
                <div class="form-group">
                    <label>Department:</label>
                    <input type="text" name="dept" value="<?php echo htmlspecialchars($_REQUEST['dept'] ?? ''); ?>" placeholder="e.g. IT">
                </div>
                <input type="submit" class="btn-get" value="Submit as GET">
            </form>
        </div>

        <!-- Form 2: POST method -->
        <div class="form-box">
            <h3><span style="color: #0ea5e9;">●</span> Form 2: Method = POST</h3>
            <form action="" method="POST">
                <div class="form-group">
                    <label>Keyword:</label>
                    <input type="text" name="keyword" value="<?php echo htmlspecialchars($_REQUEST['keyword'] ?? ''); ?>" placeholder="e.g. Laravel">
                </div>
                <div class="form-group">
                    <label>Department:</label>
                    <input type="text" name="dept" value="<?php echo htmlspecialchars($_REQUEST['dept'] ?? ''); ?>" placeholder="e.g. Computer Science">
                </div>
                <input type="submit" class="btn-post" value="Submit as POST">
            </form>
        </div>
    </div>

    <?php
    // ចាប់យកតម្លៃតាមរយៈ $_REQUEST
    $keyword = $_REQUEST['keyword'] ?? '';
    $dept    = $_REQUEST['dept'] ?? '';
    $method  = $_SERVER['REQUEST_METHOD'];
    ?>

    <?php if (!empty($keyword) || !empty($dept)): ?>
        <div class="result-box">
            <h3 style="color: #065f46; margin-bottom: 5px;">🎉 Captured by $_REQUEST:</h3>
            <p style="font-size: 0.9rem;">
                Request Method used: <span style="font-weight: 700; color: #2563eb;"><?php echo htmlspecialchars($method); ?></span>
            </p>

            <table class="table-data">
                <thead>
                    <tr>
                        <th>Key</th>
                        <th>$_REQUEST Value</th>
                        <th>Present in $_GET?</th>
                        <th>Present in $_POST?</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><code>keyword</code></td>
                        <td><strong><?php echo htmlspecialchars($keyword); ?></strong></td>
                        <td><?php echo isset($_GET['keyword']) ? '✅ Yes' : '❌ No'; ?></td>
                        <td><?php echo isset($_POST['keyword']) ? '✅ Yes' : '❌ No'; ?></td>
                    </tr>
                    <tr>
                        <td><code>dept</code></td>
                        <td><strong><?php echo htmlspecialchars($dept); ?></strong></td>
                        <td><?php echo isset($_GET['dept']) ? '✅ Yes' : '❌ No'; ?></td>
                        <td><?php echo isset($_POST['dept']) ? '✅ Yes' : '❌ No'; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    <?php endif; ?>

    <a href="index.php" class="btn-back">← Back to REQUEST Folder</a>
</div>

</body>
</html>

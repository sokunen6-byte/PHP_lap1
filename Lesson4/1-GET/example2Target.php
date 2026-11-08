<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GET Method - Example 2 Target</title>
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
        .result-box {
            padding: 20px;
            border-radius: 8px;
            background-color: #ecfdf5;
            border-left: 4px solid #10b981;
            color: #065f46;
            margin-bottom: 20px;
        }
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        .data-table th, .data-table td {
            text-align: left;
            padding: 10px;
            border-bottom: 1px solid #e2e8f0;
        }
        .data-table th {
            background-color: #f8fafc;
            color: #475569;
            font-size: 0.85rem;
            text-transform: uppercase;
        }
        .btn-group {
            margin-top: 20px;
            display: flex;
            gap: 10px;
        }
        .btn {
            padding: 10px 18px;
            border: none;
            border-radius: 6px;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }
        .btn-primary {
            background: #2563eb;
            color: #ffffff;
        }
        .btn-primary:hover {
            background: #1d4ed8;
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
    <h1>Example 2 - Target Page</h1>
    <p class="subtitle">Processing Received <code>$_GET</code> Data</p>

    <?php
    // ចាប់យកតម្លៃដែលបញ្ជូនមកពី URL Query String
    $firstName = $_GET['firstname'] ?? '';
    $lastName  = $_GET['lastname'] ?? '';
    ?>

    <div class="result-box">
        <?php if (!empty($firstName) || !empty($lastName)): ?>
            <h2 style="font-size: 1.2rem; margin-bottom: 5px;">🎉 Welcome!</h2>
            <p>Welcome, <strong><?php echo htmlspecialchars($firstName . ' ' . $lastName); ?></strong>!</p>

            <table class="data-table">
                <thead>
                    <tr>
                        <th>Parameter Key</th>
                        <th>Received Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><code>firstname</code></td>
                        <td><?php echo htmlspecialchars($firstName); ?></td>
                    </tr>
                    <tr>
                        <td><code>lastname</code></td>
                        <td><?php echo htmlspecialchars($lastName); ?></td>
                    </tr>
                </tbody>
            </table>
        <?php else: ?>
            <p>⚠️ No parameters received via GET. (គ្មានទិន្នន័យត្រូវបានបញ្ជូនមកទេ)</p>
        <?php endif; ?>
    </div>

    <div class="btn-group">
        <a href="example2.php" class="btn btn-primary">← Back to Form (Example 2)</a>
        <a href="index.php" class="btn btn-secondary">GET Overview</a>
    </div>
</div>

</body>
</html>

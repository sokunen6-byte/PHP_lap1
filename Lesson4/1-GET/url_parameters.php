<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GET Method - URL Query Parameters</title>
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
        .links-group {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 25px;
        }
        .nav-link {
            padding: 10px 16px;
            background: #e0e7ff;
            color: #3730a3;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            font-size: 0.9rem;
            transition: background 0.2s;
        }
        .nav-link:hover {
            background: #c7d2fe;
        }
        .result-box {
            padding: 20px;
            border-radius: 8px;
            background-color: #f0fdf4;
            border-left: 4px solid #22c55e;
            color: #14532d;
            margin-bottom: 20px;
        }
        .info-box {
            padding: 12px 16px;
            border-radius: 6px;
            background-color: #eff6ff;
            border-left: 4px solid #3b82f6;
            font-size: 0.85rem;
            color: #1e40af;
            line-height: 1.5;
            margin-bottom: 20px;
        }
        .btn-back {
            padding: 10px 18px;
            background: #64748b;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            display: inline-block;
        }
        .btn-back:hover {
            background: #475569;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>GET Method - URL Parameters via Links</h1>
    <p class="subtitle">Passing data through Hyperlinks (បញ្ជូនទិន្នន័យតាម Link / Anchor Tag)</p>

    <div class="info-box">
        ចុចលើ Link ខាងក្រោមដើម្បីបញ្ជូនទិន្នន័យតាម URL Query String:
    </div>

    <div class="links-group">
        <a class="nav-link" href="url_parameters.php?product=Laptop&category=Electronics&price=899">💻 Laptop ($899)</a>
        <a class="nav-link" href="url_parameters.php?product=Smartphone&category=Electronics&price=599">📱 Smartphone ($599)</a>
        <a class="nav-link" href="url_parameters.php?product=PHP+Book&category=Education&price=25">📚 PHP Book ($25)</a>
    </div>

    <?php
    $product  = $_GET['product'] ?? '';
    $category = $_GET['category'] ?? '';
    $price    = $_GET['price'] ?? '';
    ?>

    <?php if (!empty($product)): ?>
        <div class="result-box">
            <h3 style="margin-bottom: 8px;">Product Details Selected:</h3>
            <p><strong>Product Name:</strong> <?php echo htmlspecialchars($product); ?></p>
            <p><strong>Category:</strong> <?php echo htmlspecialchars($category); ?></p>
            <p><strong>Price:</strong> $<?php echo htmlspecialchars($price); ?></p>
        </div>
    <?php else: ?>
        <p style="color: #64748b; margin-bottom: 20px;"><em>សូមចុចលើ Link ណាមួយខាងលើដើម្បីមើលព័ត៌មានលម្អិត។</em></p>
    <?php endif; ?>

    <a href="index.php" class="btn-back">← Back to GET Folder</a>
</div>

</body>
</html>

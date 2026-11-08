<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lesson 4 - GET Method</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        body {
            background-color: #f8fafc;
            color: #1e293b;
            padding: 40px 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        header {
            margin-bottom: 30px;
            border-bottom: 2px solid #e2e8f0;
            padding-bottom: 20px;
        }
        .badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 700;
            background: #dbeafe;
            color: #1d4ed8;
            margin-bottom: 10px;
            text-transform: uppercase;
        }
        h1 {
            font-size: 1.8rem;
            color: #0f172a;
            margin-bottom: 8px;
        }
        p.desc {
            color: #64748b;
            font-size: 1rem;
            line-height: 1.6;
        }
        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            margin-top: 25px;
        }
        .card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
            transition: transform 0.2s, box-shadow 0.2s;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1);
        }
        .card h3 {
            font-size: 1.15rem;
            color: #1e293b;
            margin-bottom: 8px;
        }
        .card p {
            color: #64748b;
            font-size: 0.88rem;
            line-height: 1.5;
            margin-bottom: 15px;
            flex: 1;
        }
        .btn-open {
            display: inline-block;
            text-align: center;
            background: #2563eb;
            color: #ffffff;
            text-decoration: none;
            padding: 8px 14px;
            border-radius: 6px;
            font-size: 0.85rem;
            font-weight: 600;
        }
        .btn-open:hover {
            background: #1d4ed8;
        }
        .summary-box {
            margin-top: 35px;
            background: #ffffff;
            border-radius: 10px;
            border: 1px solid #e2e8f0;
            padding: 20px 25px;
        }
        .summary-box h2 {
            font-size: 1.2rem;
            margin-bottom: 12px;
            color: #0f172a;
        }
        ul.notes {
            padding-left: 20px;
            color: #475569;
            font-size: 0.92rem;
            line-height: 1.8;
        }
        .nav-back {
            display: inline-block;
            margin-top: 30px;
            color: #2563eb;
            text-decoration: none;
            font-weight: 600;
        }
        .nav-back:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <header>
        <span class="badge">Lesson 4 / Folder 1</span>
        <h1>GET Method in PHP ($_GET)</h1>
        <p class="desc">
            ការប្រើប្រាស់ <code>$_GET</code> Superglobal សម្រាប់ចាប់យកទិន្នន័យដែលផ្ញើតាមរយៈ URL Query String ឬ Form ដែលមាន <code>method="GET"</code>។
        </p>
    </header>

    <div class="cards-grid">
        <div class="card">
            <div>
                <h3>1. Example 1</h3>
                <p>ទម្រង់បែបបទ Self-Submitting Form បញ្ជូនមកទំព័រដដែល ជាមួយនឹង Sticky Inputs និងការបង្ហាញលទ្ធផលស្វាគមន៍។</p>
            </div>
            <a href="example1.php" class="btn-open">Open Example 1 →</a>
        </div>

        <div class="card">
            <div>
                <h3>2. Example 2</h3>
                <p>ទម្រង់បែបបទដែលបញ្ជូនទិន្នន័យទៅកាន់ឯកសារគោលដៅដាច់ដោយឡែក (<code>example2Target.php</code>)។</p>
            </div>
            <a href="example2.php" class="btn-open">Open Example 2 →</a>
        </div>

        <div class="card">
            <div>
                <h3>3. URL Parameters</h3>
                <p>ការបញ្ជូនប៉ារ៉ាម៉ែត្រតាមរយៈ Hyperlinks (<code>&lt;a href="...?product=..."&gt;</code>) ដោយមិនចាំបាច់មាន Form។</p>
            </div>
            <a href="url_parameters.php" class="btn-open">Open URL Params →</a>
        </div>
    </div>

    <div class="summary-box">
        <h2>📌 Key Concepts of GET (ចំណុចសំខាន់ៗ):</h2>
        <ul class="notes">
            <li><strong>URL Visibility:</strong> ទិន្នន័យបង្ហាញច្បាស់នៅលើ URL Address Bar (ឧទាហរណ៍៖ <code>?key=value&key2=value2</code>)។</li>
            <li><strong>Bookmarkable & Cacheable:</strong> អាច save ទុកជា Bookmark ឬ Share URL ទៅកាន់អ្នកដទៃបាន (ល្អសម្រាប់ Search, Filter, Pagination)។</li>
            <li><strong>Data Length Limit:</strong> មានកម្រិតប្រវែង URL (ជាទូទៅប្រហែល 2048 តួអក្សរ)។</li>
            <li><strong>Security:</strong> <strong>មិនត្រូវប្រើ</strong> សម្រាប់ពាក្យសម្ងាត់ (Password), ព័ត៌មានកាតធនាគារ ឬទិន្នន័យសម្ងាត់ដទៃទៀតឡើយ។</li>
            <li><strong>Syntax:</strong> <code>$variable = $_GET['inputName'] ?? 'defaultValue';</code></li>
        </ul>
    </div>

    <a href="../index.php" class="nav-back">← Back to Lesson 4 Main Menu</a>
</div>

</body>
</html>

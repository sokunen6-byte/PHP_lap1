<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lesson 4 - POST Method</title>
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
            background: #e0f2fe;
            color: #0369a1;
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
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
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
            background: #0ea5e9;
            color: #ffffff;
            text-decoration: none;
            padding: 8px 14px;
            border-radius: 6px;
            font-size: 0.85rem;
            font-weight: 600;
        }
        .btn-open:hover {
            background: #0284c7;
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
            color: #0ea5e9;
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
        <span class="badge">Lesson 4 / Folder 2</span>
        <h1>POST Method in PHP ($_POST)</h1>
        <p class="desc">
            ការប្រើប្រាស់ <code>$_POST</code> Superglobal សម្រាប់ចាប់យកទិន្នន័យដែលផ្ញើតាមរយៈ HTTP Request Body ដោយមានសុវត្ថិភាពខ្ពស់ និងមិនបង្ហាញនៅលើ URL។
        </p>
    </header>

    <div class="cards-grid">
        <div class="card">
            <div>
                <h3>1. Login & Processing</h3>
                <p>ទម្រង់បែបបទ Login Form (<code>login.php</code>) បញ្ជូនទៅកាន់ <code>loginProcess.php</code> ដើម្បីផ្ទៀងផ្ទាត់ឈ្មោះ និងលេខសម្ងាត់។</p>
            </div>
            <a href="login.php" class="btn-open">Open Login Form →</a>
        </div>

        <div class="card">
            <div>
                <h3>2. Self-Submitting Registration</h3>
                <p>ទម្រង់ចុះឈ្មោះក្នុងទំព័រតែមួយ (<code>register.php</code>) រួមទាំង Form Validation និង Sticky Inputs (រក្សាទិន្នន័យដែលបានបញ្ចូល)។</p>
            </div>
            <a href="register.php" class="btn-open">Open Registration →</a>
        </div>
    </div>

    <div class="summary-box">
        <h2>📌 Key Concepts of POST (ចំណុចសំខាន់ៗ):</h2>
        <ul class="notes">
            <li><strong>Invisible in URL:</strong> ទិន្នន័យមិនបង្ហាញនៅលើ URL Address bar ឡើយ ដោយវាត្រូវបានបង្កប់នៅក្នុង HTTP Message Body។</li>
            <li><strong>High Security for Sensitive Data:</strong> សមស្របបំផុតសម្រាប់ passwords, credit card numbers, personal data។</li>
            <li><strong>No Size Limit:</strong> អាចផ្ទុកទិន្នន័យធំៗបានច្រើន និងប្រើប្រាស់សម្រាប់ File Uploads (រួមជាមួយ <code>enctype="multipart/form-data"</code>)។</li>
            <li><strong>Not Cacheable / Bookmarkable:</strong> មិនអាច Bookmark បានទេ ហើយពេលចុច Refresh/Reload កម្មវិធីរុករកនឹងសួរ Confirmation (Resend Data Prompt)។</li>
            <li><strong>Syntax:</strong> <code>$variable = $_POST['inputName'] ?? 'defaultValue';</code></li>
        </ul>
    </div>

    <a href="../index.php" class="nav-back">← Back to Lesson 4 Main Menu</a>
</div>

</body>
</html>

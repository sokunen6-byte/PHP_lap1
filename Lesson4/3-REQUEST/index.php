<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lesson 4 - REQUEST & Request Detection</title>
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
            background: #ede9fe;
            color: #6d28d9;
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
            background: #7c3aed;
            color: #ffffff;
            text-decoration: none;
            padding: 8px 14px;
            border-radius: 6px;
            font-size: 0.85rem;
            font-weight: 600;
        }
        .btn-open:hover {
            background: #6d28d9;
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
            color: #7c3aed;
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
        <span class="badge">Lesson 4 / Folder 3</span>
        <h1>REQUEST & Request Detection ($_REQUEST)</h1>
        <p class="desc">
            ស្វែងយល់អំពី <code>$_REQUEST</code> Superglobal និងវិធីសាស្ត្រ Request Detection (ការត្រួតពិនិត្យការបញ្ជូនទិន្នន័យ) តាមរយៈ <code>$_SERVER['REQUEST_METHOD']</code> និង <code>isset()</code>។
        </p>
    </header>

    <div class="cards-grid">
        <div class="card">
            <div>
                <h3>1. $_REQUEST Demo</h3>
                <p>ទម្រង់បែបបទពិសោធន៍ដែលអនុញ្ញាតឱ្យ submit តាមរយៈ GET ឬ POST ហើយចាប់យកដោយ <code>$_REQUEST</code> តែមួយ។</p>
            </div>
            <a href="request_demo.php" class="btn-open">Open $_REQUEST Demo →</a>
        </div>

        <div class="card">
            <div>
                <h3>2. $_SERVER Method</h3>
                <p>Request Detection ដោយប្រើ <code>$_SERVER['REQUEST_METHOD'] === 'POST'</code> ដើម្បីដឹងពីវិធីសាស្ត្រដែល Client ហៅមកកាន់ទំព័រ។</p>
            </div>
            <a href="server_method.php" class="btn-open">Open Server Method →</a>
        </div>

        <div class="card">
            <div>
                <h3>3. isset() Function</h3>
                <p>Request Detection ដោយប្រើ <code>isset($_POST['buttonName'])</code> ដើម្បីពិនិត្យមើលថាតើប៊ូតុងមួយណាត្រូវបានចុច submit។</p>
            </div>
            <a href="isset_detection.php" class="btn-open">Open isset() Demo →</a>
        </div>
    </div>

    <div class="summary-box">
        <h2>📌 Key Concepts of REQUEST (ចំណុចសំខាន់ៗ):</h2>
        <ul class="notes">
            <li><strong>Combined Array:</strong> <code>$_REQUEST</code> រួមបញ្ចូលគ្នារវាង <code>$_GET</code>, <code>$_POST</code>, និង <code>$_COOKIE</code>។</li>
            <li><strong>Convenience vs Security:</strong> ងាយស្រួលព្រោះមិនខ្វល់ថាទិន្នន័យមកពី GET ឬ POST ប៉ុន្តែក្នុងគម្រោងធំៗគេនិយមប្រើ <code>$_GET</code> ឬ <code>$_POST</code> ដោយផ្ទាល់ដើម្បីសុវត្ថិភាពខ្ពស់ និងភាពច្បាស់លាស់។</li>
            <li><strong>Method Detection:</strong> ការប្រើប្រាស់ <code>$_SERVER['REQUEST_METHOD'] === 'POST'</code> គឺជា Standard Best Practice ក្នុងការផ្ទៀងផ្ទាត់ការបញ្ជូនទម្រង់បែបបទ។</li>
            <li><strong>Button Detection:</strong> ការប្រើប្រាស់ <code>isset($_POST['btnName'])</code> ជួយឱ្យយើងអាចដាក់ប៊ូតុង Submit ច្រើនក្នុង Form តែមួយ (ឧ. Save Draft vs Publish)។</li>
        </ul>
    </div>

    <a href="../index.php" class="nav-back">← Back to Lesson 4 Main Menu</a>
</div>

</body>
</html>

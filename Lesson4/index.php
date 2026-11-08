<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lesson 4 - GET, POST, REQUEST in PHP</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        body {
            background-color: #f1f5f9;
            color: #1e293b;
            padding: 40px 20px;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
        }
        header {
            text-align: center;
            margin-bottom: 40px;
        }
        .lesson-tag {
            display: inline-block;
            background: #e2e8f0;
            color: #475569;
            padding: 5px 14px;
            border-radius: 9999px;
            font-weight: 700;
            font-size: 0.8rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 12px;
        }
        h1 {
            font-size: 2.2rem;
            color: #0f172a;
            margin-bottom: 10px;
        }
        p.subtitle {
            font-size: 1.05rem;
            color: #64748b;
            max-width: 650px;
            margin: 0 auto;
            line-height: 1.6;
        }
        .folders-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(270px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }
        .folder-card {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            padding: 25px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            border-top: 5px solid #cbd5e1;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .folder-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 20px -3px rgba(0, 0, 0, 0.1);
        }
        .folder-get {
            border-top-color: #2563eb;
        }
        .folder-post {
            border-top-color: #0ea5e9;
        }
        .folder-request {
            border-top-color: #7c3aed;
        }
        .card-icon {
            font-size: 2rem;
            margin-bottom: 15px;
        }
        .folder-card h2 {
            font-size: 1.35rem;
            color: #0f172a;
            margin-bottom: 10px;
        }
        .folder-card p {
            color: #64748b;
            font-size: 0.9rem;
            line-height: 1.6;
            margin-bottom: 20px;
            flex: 1;
        }
        .folder-files {
            background: #f8fafc;
            border-radius: 6px;
            padding: 10px 14px;
            margin-bottom: 20px;
            font-size: 0.85rem;
            color: #475569;
        }
        .folder-files strong {
            display: block;
            margin-bottom: 5px;
            color: #1e293b;
        }
        .folder-files ul {
            list-style: none;
            padding-left: 0;
        }
        .folder-files li::before {
            content: "📄 ";
        }
        .btn-visit {
            display: block;
            text-align: center;
            padding: 10px 16px;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            color: white;
            transition: opacity 0.2s;
        }
        .btn-visit:hover {
            opacity: 0.9;
        }
        .btn-get {
            background: #2563eb;
        }
        .btn-post {
            background: #0ea5e9;
        }
        .btn-request {
            background: #7c3aed;
        }
        .btn-sticky {
            background: #4f46e5;
        }
        .folder-sticky {
            border-top-color: #4f46e5;
        }
        .btn-filter {
            background: #10b981;
        }
        .folder-filter {
            border-top-color: #10b981;
        }
        .btn-multi {
            background: #f59e0b;
        }
        .folder-multi {
            border-top-color: #f59e0b;
        }
        .comparison-table-wrapper {
            background: #ffffff;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }
        .comparison-table-wrapper h2 {
            font-size: 1.4rem;
            margin-bottom: 15px;
            color: #0f172a;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            text-align: left;
            padding: 12px 14px;
            border-bottom: 1px solid #e2e8f0;
            font-size: 0.9rem;
        }
        th {
            background: #f8fafc;
            color: #334155;
            font-weight: 700;
        }
        tr:hover td {
            background: #f8fafc;
        }
    </style>
</head>
<body>

<div class="container">
    <header>
        <span class="lesson-tag">Web Application (PHP) - Y3S1</span>
        <h1>Lesson 4: GET, POST & REQUEST</h1>
        <p class="subtitle">
            មេរៀនទី ៤៖ ការបញ្ជូន និងទទួលទិន្នន័យតាមរយៈទម្រង់បែបបទ (HTML Forms) ដោយប្រើ PHP Superglobals <code>$_GET</code>, <code>$_POST</code> និង <code>$_REQUEST</code>។
        </p>
    </header>

    <div class="folders-grid">
        <!-- Folder 1: GET -->
        <div class="folder-card folder-get">
            <div>
                <div class="card-icon">🌐</div>
                <h2>Folder 1: GET</h2>
                <p>ផ្ញើ និងចាប់យកទិន្នន័យតាមរយៈ URL Query String ឬទម្រង់បែបបទ <code>method="GET"</code>។</p>
                <div class="folder-files">
                    <strong>Included Files:</strong>
                    <ul>
                        <li>index.php</li>
                        <li>example1.php</li>
                        <li>example2.php</li>
                        <li>example2Target.php</li>
                        <li>url_parameters.php</li>
                    </ul>
                </div>
            </div>
            <a href="1-GET/index.php" class="btn-visit btn-get">Explore GET Folder →</a>
        </div>

        <!-- Folder 2: POST -->
        <div class="folder-card folder-post">
            <div>
                <div class="card-icon">🔒</div>
                <h2>Folder 2: POST</h2>
                <p>ផ្ញើទិន្នន័យដោយសុវត្ថិភាពតាមរយៈ HTTP Request Body មិនបង្ហាញលើ URL (ល្អសម្រាប់ Password និងទិន្នន័យធំៗ)។</p>
                <div class="folder-files">
                    <strong>Included Files:</strong>
                    <ul>
                        <li>index.php</li>
                        <li>login.php</li>
                        <li>loginProcess.php</li>
                        <li>register.php</li>
                    </ul>
                </div>
            </div>
            <a href="2-POST/index.php" class="btn-visit btn-post">Explore POST Folder →</a>
        </div>

        <!-- Folder 3: REQUEST -->
        <div class="folder-card folder-request">
            <div>
                <div class="card-icon">⚡</div>
                <h2>Folder 3: REQUEST</h2>
                <p>ចាប់យកទិន្នន័យពីទាំង GET និង POST តាមរយៈ <code>$_REQUEST</code> រួមទាំងការធ្វើ Request Method Detection។</p>
                <div class="folder-files">
                    <strong>Included Files:</strong>
                    <ul>
                        <li>index.php</li>
                        <li>request_demo.php</li>
                        <li>server_method.php</li>
                        <li>isset_detection.php</li>
                    </ul>
                </div>
            </div>
            <a href="3-REQUEST/index.php" class="btn-visit btn-request">Explore REQUEST Folder →</a>
        </div>

        <!-- Folder 4: Sticky Form Concept & Text Inputs/Textareas -->
        <div class="folder-card folder-sticky">
            <div>
                <div class="card-icon">📌</div>
                <h2>Folder 4: Sticky Form</h2>
                <p>រក្សាទុកតម្លៃក្នុង <code>&lt;input type="text"&gt;</code> និង <code>&lt;textarea&gt;</code> ពេល Submit មាន Error (UX & XSS Prevention)។</p>
                <div class="folder-files">
                    <strong>Included Files:</strong>
                    <ul>
                        <li>index.php</li>
                        <li>sticky_text_inputs.php</li>
                        <li>Textareas/index.php</li>
                    </ul>
                </div>
            </div>
            <a href="4-Sticky Form Concept & Text Inputs/index.php" class="btn-visit btn-sticky">Explore Sticky Form →</a>
        </div>

        <!-- Folder 5: Data Filter Validation -->
        <div class="folder-card folder-filter">
            <div>
                <div class="card-icon">🛡️</div>
                <h2>Folder 5: Filter Validation</h2>
                <p>ផ្ទៀងផ្ទាត់ទិន្នន័យ (Email, Integer, URL, Float) តាមរយៈ <code>filter_var()</code> ដោយមិនបាច់សរសេរ Regex ដោយដៃ។</p>
                <div class="folder-files">
                    <strong>Included Files:</strong>
                    <ul>
                        <li>index.php</li>
                        <li>email_validation.php</li>
                        <li>sanitize_vs_validate.php</li>
                    </ul>
                </div>
            </div>
            <a href="5-Data Filter Validation/index.php" class="btn-visit btn-filter">Explore Filter Validation →</a>
        </div>

        <!-- Folder 6: Sticky Multi-Controls -->
        <div class="folder-card folder-multi">
            <div>
                <div class="card-icon">🎛️</div>
                <h2>Folder 6: Multi-Controls</h2>
                <p>រក្សាទុកស្ថានភាពជ្រើសរើសសម្រាប់ Radio Buttons, Select Dropdowns, និង Checkbox Array (<code>skills[]</code>)។</p>
                <div class="folder-files">
                    <strong>Included Files:</strong>
                    <ul>
                        <li>index.php</li>
                        <li>sticky_multi_controls.php</li>
                        <li>checkbox_array_explained.php</li>
                    </ul>
                </div>
            </div>
            <a href="6-Sticky Multi-Controls/index.php" class="btn-visit btn-multi">Explore Multi-Controls →</a>
        </div>
    </div>

    <!-- Comparison Table -->
    <div class="comparison-table-wrapper">
        <h2>📊 Comparison: GET vs POST vs REQUEST</h2>
        <table>
            <thead>
                <tr>
                    <th>លក្ខណៈពិសេស (Feature)</th>
                    <th>GET</th>
                    <th>POST</th>
                    <th>REQUEST</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>ទីតាំងទិន្នន័យ (Data Location)</strong></td>
                    <td>URL Query String</td>
                    <td>HTTP Request Body</td>
                    <td>GET, POST, and COOKIE</td>
                </tr>
                <tr>
                    <td><strong>ភាពមើលឃើញ (Visibility)</strong></td>
                    <td>បង្ហាញច្បាស់លើ URL Bar</td>
                    <td>មើលមិនឃើញលើ URL</td>
                    <td>អាស្រ័យលើវិធីផ្ញើដើម</td>
                </tr>
                <tr>
                    <td><strong>សុវត្ថិភាព (Security)</strong></td>
                    <td>ទាប (មិនត្រូវប្រើដាក់ Password)</td>
                    <td>ខ្ពស់ជាង (ល្អសម្រាប់ទិន្នន័យសំខាន់)</td>
                    <td>មធ្យម</td>
                </tr>
                <tr>
                    <td><strong>ទំហំទិន្នន័យ (Data Limit)</strong></td>
                    <td>មានកំណត់ (~2048 characters)</td>
                    <td>គ្មានកម្រិត (កំណត់ដោយ php.ini)</td>
                    <td>គ្មានកម្រិតតាម POST</td>
                </tr>
                <tr>
                    <td><strong>Bookmark / Cache</strong></td>
                    <td>អាច Bookmark និង Cache បាន</td>
                    <td>មិនអាច Bookmark ឬ Cache បានទេ</td>
                    <td>អាស្រ័យលើ Method</td>
                </tr>
                <tr>
                    <td><strong>ការប្រើប្រាស់ទូទៅ (Common Use)</strong></td>
                    <td>Search, Filters, Pagination</td>
                    <td>Login, Register, Sensitive data</td>
                    <td>Dynamic forms, Flexible endpoints</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>

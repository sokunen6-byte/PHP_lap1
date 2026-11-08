<!-- includes/header.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?? 'Admin Dashboard'; ?></title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background: #f8fafc;
            color: #1e293b;
        }

        /* Top Navigation */
        header {
            background: #0f172a;
            color: white;
            padding: 1rem 1.75rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.2rem;
            font-weight: bold;
            letter-spacing: 0.5px;
        }

        .user-tag {
            font-size: 0.9rem;
            color: #94a3b8;
        }

        .user-tag strong {
            color: #f8fafc;
        }

        /* Main App Grid */
        .app-body {
            display: flex;
            flex: 1;
        }

        /* Sidebar */
        aside {
            width: 230px;
            background: #1e293b;
            padding: 1.5rem 1rem;
            flex-shrink: 0;
        }

        aside nav a {
            display: block;
            color: #94a3b8;
            text-decoration: none;
            padding: 0.75rem 1rem;
            border-radius: 6px;
            margin-bottom: 0.35rem;
            font-size: 0.95rem;
        }

        aside nav a:hover,
        aside nav a.active {
            background: #334155;
            color: #ffffff;
            font-weight: 600;
        }

        /* Content View */
        main {
            flex: 1;
            padding: 2rem;
        }

        h1 {
            font-size: 1.6rem;
            margin-bottom: 0.5rem;
        }

        .subtitle {
            color: #64748b;
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
        }

        /* Stat Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1.25rem;
            margin-bottom: 2rem;
        }

        .card {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 1.25rem;
        }

        .card-label {
            font-size: 0.85rem;
            color: #64748b;
            margin-bottom: 0.4rem;
            text-transform: uppercase;
            font-weight: 600;
        }

        .card-val {
            font-size: 1.75rem;
            font-weight: bold;
            color: #0f172a;
        }

        /* Tables & Forms */
        .table-container {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        th,
        td {
            padding: 0.85rem 1.2rem;
            border-bottom: 1px solid #f1f5f9;
            font-size: 0.9rem;
        }

        th {
            background: #f8fafc;
            color: #475569;
            font-weight: 600;
        }

        .badge {
            display: inline-block;
            padding: 0.25rem 0.6rem;
            border-radius: 999px;
            font-size: 0.75rem;
            font-weight: bold;
        }

        .badge-active {
            background: #dcfce7;
            color: #15803d;
        }

        /* Footer */
        footer {
            background: #ffffff;
            border-top: 1px solid #e2e8f0;
            text-align: center;
            padding: 1rem;
            color: #64748b;
            font-size: 0.85rem;
        }
    </style>
</head>

<body>
    <header>
        <div class="logo">⚡ <?php echo $appName ?? 'App Admin'; ?></div>
        <div class="user-tag">Welcome, <strong>Admin</strong></div>
    </header>
    <div class="app-body">
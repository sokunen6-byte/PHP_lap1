<?php
// 1. require_once: ណែនាំខ្ពស់បំផុតសម្រាប់ Config, Functions, Classes (DB Config, Core Logic)
// ធានាថា Load តែ ១ ដងគត់ និងបោះ Fatal Error បញ្ឈប់ Script ភ្លាមៗបើបាត់ឯកសារ
require_once __DIR__ . '/includes/config.php';

$pageTitle = "Overview | " . $appName;

// 2. require: ប្រើសម្រាប់ឯកសារសំខាន់ ចាំបាច់ (HTML Header, Layout)
// ប្រសិនបើបាត់ឯកសារ វានឹងបោះ Fatal Error បញ្ឈប់ Script ភ្លាមៗ
require __DIR__ . '/includes/header.php';

// 3. include: ប្រើសម្រាប់ HTML Templates មិនសូវសំខាន់ (Sidebar, Ads)
// ប្រសិនបើបាត់ឯកសារ វានឹងបោះតែ Warning ហើយបន្តដំណើរការកូដខាងក្រោមធម្មតា
include __DIR__ . '/includes/sidebar.php';
?>

<main>
    <h1>Overview</h1>
    <p class="subtitle">Platform performance and live metrics.</p>

    <?php
    // 4. include_once: ប្រើសម្រាប់ Optional Helper Scripts, Extension Libraries, Widgets
    // ប្រសិនបើបាត់ឯកសារ វានឹងបោះតែ Warning ហើយបន្តដំណើរការ និងការពារកុំឱ្យ Load ជាន់គ្នា
    include_once __DIR__ . '/includes/notice.php';
    ?>

    <div class="stats-grid">
        <div class="card">
            <div class="card-label">Total Users</div>
            <div class="card-val">1,248</div>
        </div>
        <div class="card">
            <div class="card-label">Revenue</div>
            <div class="card-val"><?php echo formatCurrency(14820); ?></div>
        </div>
        <div class="card">
            <div class="card-label">Active Sessions</div>
            <div class="card-val">93</div>
        </div>
    </div>
</main>

<?php
// require: ឯកសារសំខាន់ ចាំបាច់សម្រាប់បិទ Layout (HTML Footer)
require __DIR__ . '/includes/footer.php';
?>

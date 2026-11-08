<?php
// includes/config.php
// Best Practice: Use require_once() for DB Config, Functions, and Classes.
// ធានាថា Load តែ ១ ដងគត់ ដើម្បីកុំឱ្យជាន់គ្នា (Function redeclaration error) និងឈប់ភ្លាមៗបើបាត់ឯកសារ។

$appName = "App Admin";
$version = "1.0.0";

// Helper function to format currency
function formatCurrency($amount) {
    return '$' . number_format($amount);
}

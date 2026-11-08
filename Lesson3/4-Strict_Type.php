<?php
declare(strict_types=1);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strict Types, Default Parameters & Arrow Functions</title>
</head>
<body>
    
    <?php
    // strict types
    // declare(strict_types=1); Strict Types (declare(strict_types=1);)៖ បង្ខំឱ្យប្រព័ន្ធផ្ទៀងផ្ទាត់ Data Type នៃ Parameters និង Return Value យ៉ាងតឹងរ៉ឹងបំផុត។

    function calculateTotal(float $price, int $quantity): float {
        return $price * $quantity;
    }

    $total = calculateTotal(15.50, 3);

    echo $total;

    // default parameters
    function greetUser(string $name = "Guest") {
        echo "Hello, $name!";
    }

    greetUser("Alice");
    echo "<br>";
    greetUser();

    echo "<br>";

    // arrow functions
    $numbers = [1, 2, 3, 4, 5];
    $squaredNumbers = array_map(fn($n) => $n ** 2, $numbers);
    
    echo "Squared numbers: " . implode(", ", $squaredNumbers);
    ?>

</body>
</html>
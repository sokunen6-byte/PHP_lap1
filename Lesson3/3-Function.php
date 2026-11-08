<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Function</title>
</head>
<body>
    
    <?php
    // without return value
    function sayHello(string $name) {
        echo "Hello, $name!";
    }
    sayHello("John");

    echo "<br>";

    // with return value  
    function addNumbers(int $a, int $b): int {
        $Sum = $a + $b;
        echo "The sum of $a and $b is: $Sum";
        return $Sum;
    }
    addNumbers(5, 10);

    // without parameter
    function greet() {
        echo "<br>Hello, World!";
    }
    greet();

    ?>

</body>
</html>
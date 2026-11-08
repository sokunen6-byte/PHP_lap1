<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Aarrays Examples</title>
</head>
<body>
    
    <?php

    // Indexed Array
    $fruits = array("Apple", "Banana", "Orange");
    echo "<h2>Indexed Array:</h2>";
    foreach ($fruits as $fruit) {
        echo $fruit . "<br>";
    }

    // Associative Array
    $ages = array("John" => 25, "Jane" => 30, "Bob" => 35);
    echo "<h2>Associative Array:</h2>";
    foreach ($ages as $name => $age) {
        echo $name . " is " . $age . " years old.<br>";
    }

    // Multidimensional Array
    $students = array(
        array("John", 25, "A"),
        array("Jane", 30, "B"),
        array("Bob", 35, "C")
    );
    echo "<h2>Multidimensional Array:</h2>";
    foreach ($students as $student) {
        echo "Name: " . $student[0] . ", Age: " . $student[1] . ", Grade: " . $student[2] . "<br>";
    }

    ?>

</body>
</html>
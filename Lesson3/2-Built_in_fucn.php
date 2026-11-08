<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Built in Function</title>
</head>
<body>
    
    <?php

    $fruits = array("Apple", "Banana", "Orange");
    foreach ($fruits as $fruit) {
        echo $fruit . "<br>";
    }
    echo in_array("Banana", $fruits) ? "Banana is in the array.<br>" : "Banana is not in the array.<br>";
    echo "Element count: " . count($fruits) . "<br>";
    echo array_push($fruits, "Mango") . "<br>";
    echo "Hello World: " . strlen("Hello World") . "<br>";
    // echo var_dump($fruits) . "<br>";

    ?>

</body>
</html>
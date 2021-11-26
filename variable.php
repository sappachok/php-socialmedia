<h1>Hello!!</h1>
<?php
    echo "test"."<br>";

    $a = 5; 
    $b = 2;

    $c = $a + $b;
    echo $c."<br>";

    echo $a * $b."<br>";
?>
<h2 style="color:red;">Result is <?php echo $c; ?></h2>
-----------------------------<br>
<?php

$month = array("ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.");

foreach($month as $val) {
    echo $val." ";
}

foreach($month as $val) {
    echo $val." ";
}

function print_line($num, $sym) {
    for($i=0; $i<=$num; $i++) {
        echo $sym;
    }
    echo "<br>";
}

print_line(100,"*");
print_line(50,"+");

//foreach()
//session_start();
echo $_SESSION["user_name"];
?>
<a href="test_db.php">goto test</a>
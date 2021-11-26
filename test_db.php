<?php
    echo "<h1>Database connect test.</h1>";
    echo $b;
    // new mysqli("[host]", "[username]", "[password]") or die("Cannot connect database.");    
    $mysqli = new mysqli("localhost", "root", "") or die("Cannot connect database.");

    $mysqli->select_db("socialmedia") or die("Cannot select database.");

    if($mysqli) {
        echo "Connect Database Success!!<br>";
    }

    $result = $mysqli->query("select * from user"); //SQL

    $_SESSION["user_name"] = $result->user_name;
    

    // $result = $mysqli->query("select user_id, user_name, fullname from user"); //SQL
    // Comment 

    /*
        การวนรูปเพื่อแสดงค่าจากฐานข้อมูล
        $result->fetch_object()
    */

    while($obj = $result->fetch_object()) {
        echo $obj->user_id." ";
        echo $obj->user_name." ";
        echo $obj->full_name." ";
        echo "<br>";
    }
?>
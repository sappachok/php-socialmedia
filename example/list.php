<?php
    // new mysqli("[host]", "[username]", "[password]") or die("Cannot connect database.");
    $mysqli = new mysqli("localhost", "root", "") or die("Cannot connect database.");

    // $mysqli->select_db("[database_name]")
    $mysqli->select_db("socialmedia") or die("Cannot select database.");
    //echo $conn;

    $sql = "select * from users";

    //$mysqli->query("[sql]");
    $result = $mysqli->query($sql);
    
    while($obj = $result->fetch_object()){
        echo $obj->user_id." ";
        echo $obj->user_name." ";
        echo $obj->full_name." ";
        echo "<br>";
    }


?>
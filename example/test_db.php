<?php    
    // new mysqli("[host]", "[username]", "[password]") or die("Cannot connect database.");
    $mysqli = new mysqli("localhost", "root", "") or die("Cannot connect database.");

    // $mysqli->select_db("[database_name]")
    $mysqli->select_db("socialmedia") or die("Cannot select database.");
    //echo $conn;

    echo $mysqli->server_info."<br>";
    echo $mysqli->client_info."<br>";
    echo $mysqli->server_version."<br>";
    
?>
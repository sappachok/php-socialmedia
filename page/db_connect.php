<?php
    $mysqli = new mysqli("localhost", "root", "") or die("Cannot connect database.");
    $mysqli->select_db("socialmedia") or die("Cannot select database.");
    if(!$mysqli) echo "Cannot Connect Database!!<br>";
?>
<?php
    // mysqli_connect("{host}", "{user}", "{password}")
    $conn = mysqli_connect("localhost", "root", "") or die("Cannot connect database.");

    // mysqli_select_db($conn, "{database_name}")
    mysqli_select_db($conn, "socialmedia") or die("Cannot select database.");
    //echo $conn;
?>
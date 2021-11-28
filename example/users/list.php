<!DOCTYPE html>
<html lang="en">
<head>
    <title>Social Media</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <h2>จัดการผู้ใช้</h2>
        <p><a href="add.php" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> เพิ่มผู้ใช้</a></p>        
        <table class="table table-bordered table-striped">
            <thead>
                <th>User ID</th>
                <th>User name</th>
                <th>Full name</th>
                <th>จัดการ</th>
            </thead>   
            <tbody>
<?php
    // new mysqli("[host]", "[username]", "[password]") or die("Cannot connect database.");
    $mysqli = new mysqli("localhost", "root", "") or die("Cannot connect database.");

    // $mysqli->select_db("[database_name]")
    $mysqli->select_db("socialmedia") or die("Cannot select database.");
    //echo $conn;

    $sql = "select * from user";

    //$mysqli->query("[sql]");
    $result = $mysqli->query($sql);
    
    while($obj = $result->fetch_object()){
        echo "<tr>";
        echo "<td>".$obj->user_id."</td>";
        echo "<td>".$obj->user_name."</td>";
        echo "<td>".$obj->full_name."</td>";
        echo "<td><a href='#edit' class='btn btn-info'><span class='glyphicon glyphicon-pencil'></span> แก้ไข</a> <a href='#delete' class='btn btn-danger'><span class='glyphicon glyphicon-trash'></span> ลบ</a></td>";
        echo "</tr>";
    }
?>
            </tbody>
        </table>
    </div>
</body>
</html>
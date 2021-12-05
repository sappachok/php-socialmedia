<?php
    session_start();
	include("db_connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body style="background-color:#eeeeee;">
<br>
<?php
    if(isset($_POST["login"])) {
            // new mysqli("[host]", "[username]", "[password]") or die("Cannot connect database.");      

        $user_name = $_POST["user_name"];
        $password = $_POST["password"];

        $sql = "select * from user where user_name='$user_name' and password='$password' ";
        //echo $sql;
        $result = $mysqli->query($sql);
        //echo "num row: ".$result->num_rows."<br>";
        if($result->num_rows > 0) {
            $obj = $result->fetch_object();
            
            $_SESSION["user_id"] = $obj->user_id;
            $_SESSION["user_name"] = $obj->user_name;
            $_SESSION["full_name"] = $obj->full_name;
            $_SESSION["login"] = true;

            if($obj->user_name=="admin") {
                $_SESSION["admin"] = true;
            }

            echo "<div class='alert alert-success'>การยืนยันตัวตนถูกต้อง</div>";
            echo "<meta http-equiv='refresh' content='2;url=index.php'>";
            
            exit();
        } else {
            echo "<div class='alert alert-danger'>การยืนยันตัวตนไม่ถูกต้อง</div>";            
        }
    }
?>
<div class="container"> <!-- container-fluid ขยายเต็มหน้าจอ -->
    <div class="row">
        <div class="col-sm-12">
        <!-- Start content -->
        <h1>ยืนยันตัวตน</h1>

        <form method="post">
        <p>  
            <label>ชื่อผู้ใช้</label>
            <input type="text" name="user_name" class="form-control">
        </p>
        <p>  
            <label>รหัสผ่าน</label>
            <input type="password" name="password" class="form-control">
        </p>   
        <p>
            <button type="submit" name="login" class="btn btn-primary">เข้าสู่ระบบ</button>
        </p>              
        </form>

        <!-- End content -->
        </div>
    </div>
</div>  
</body>
</html>
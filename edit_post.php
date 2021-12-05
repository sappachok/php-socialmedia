<?php
    session_start();
    include("header.php");
    include("db_connect.php");

    // new mysqli("[host]", "[username]", "[password]") or die("Cannot connect database.");    
    $mysqli = new mysqli("localhost", "root", "") or die("Cannot connect database.");
    $mysqli->select_db("socialmedia") or die("Cannot select database.");
    if(!$mysqli) echo "Cannot Connect Database!!<br>";

    if(isset($_POST["save"])) {
        $user_id = $_GET["user_id"];

        $user_name = $_POST["user_name"];
        $password = $_POST["password"];
        $full_name = $_POST["full_name"];

        $sql = "update user set user_name='$user_name', full_name='$full_name', password='$password' 
            where user_id='$user_id'
        ";

        $result = $mysqli->query($sql);  

        if($result) {
            echo "<div class='alert alert-success'>บันทึกเสร็จสิ้น</div>";
        } else {
            echo "<div class='alert alert-danger'>บันทึกข้อมูลล้มเหลว</div>";
            echo "<div>$sql</div>";
        }
    }

    $message_id = $_GET["message_id"];
    $sql = "select * from message where message_id='$message_id'";
    //echo $sql;
    $result = $mysqli->query($sql);
    $obj = $result->fetch_object();
?>
<div class="container"> <!-- container-fluid ขยายเต็มหน้าจอ -->
    <!-- Start content -->
    <p><a href="index.php" class="btn btn-info">กลับไป</a></p>

    <h2>แก้ไขข้อความ</h2>

    <form method="post">
    <p>              
        <textarea name="message_body" class="form-control" rows="5"><?php echo $obj->message_body; ?></textarea>
    </p>  
    <p>              
        <button type="submit" name="save" class="btn btn-primary">บันทึก</button>
    </p>
    </form>
    <!-- End content -->
</div>  
<?php
  include("footer.php");
?>
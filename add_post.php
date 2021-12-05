<?php
    session_start();
    include("header.php");
    include("db_connect.php");
?>
<div class="container">
<?php
    if(isset($_POST["save"])) {            
        $message_body = $_POST["message_body"];

        $sql = "insert into message (message_body, message_datetime, user_id)
        value ('$message_body','".date("d-m-Y H:i:s")."','".$_SESSION["user_id"]."')";

        $result = $mysqli->query($sql);

        if($result) {
            echo "<div class='alert alert-success'>บันทึกเสร็จสิ้น</div>";
        } else {
            echo "<div class='alert alert-danger'>บันทึกข้อมูลล้มเหลว</div>";
            echo "<div>$sql</div>";
        }

        echo "<p><a href='index.php' class='btn btn-info'>กลับไป</a></p>";
    }
?>

    <!-- Start content -->
    <h2>เพิ่มข้อความ</h2>

    <form method="post">
    <p>              
        <textarea name="message_body" class="form-control" rows="5"></textarea>
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
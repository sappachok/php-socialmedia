<?php
    session_start();
    include("header.php");
    include("db_connect.php");
?>
<div class="container">
<?php
    if(isset($_POST["save"])) {
        $message_id = $_GET["message_id"];
        $message_body = $_POST["message_body"];

        $sql = "update message set message_body='$message_body'
            where message_id='$message_id'
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
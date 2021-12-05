<?php
    session_start();
	include("header.php");
	include("db_connect.php");
?>
<div class="container">
		<p><a href="index.php" class="btn btn-info">กลับไป</a></p>
<?php
    if(isset($_GET["ms_id"])) {
        $message_id = $_GET["ms_id"];

        $sql = "delete from message where message_id='$message_id'";

        $result = $mysqli->query($sql);

        if($result) {
            echo "<div class='alert alert-success'>ลบข้อมูลเสร็จสิ้น</div>";
        } else {
            echo "<div class='alert alert-danger'>ลบข้อมูลล้มเหลว</div>";
            echo "<div>$sql</div>";
        }
    }
?>
</div>
<?php
	include("footer.php");
?>
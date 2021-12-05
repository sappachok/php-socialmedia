<?php
    session_start();
	include("header.php");
	include("db_connect.php");
?>
<div class="container">
		<p><a href="index.php" class="btn btn-info">กลับไป</a></p>
<?php
		if(isset($_POST["save"])) {      
			$message_body = $_POST["message_body"];

			$sql = "insert into message (message_datetime, message_body, user_id)
			value ('".date("d-m-Y H:i:s")."','$message_body','".$_SESSION["user_id"]."')";
			//echo $sql;

			$result = $mysqli->query($sql);        

			if($result) {
				echo "<div class='alert alert-success'>บันทึกเสร็จสิ้น</div>";
			} else {
				echo "<div class='alert alert-danger'>บันทึกข้อมูลล้มเหลว</div>";
				echo "<div>$sql</div>";
			}
		} else {
?>
		<form method="post">
			<p>
				<label>ข้อความ</label>
				<textarea name="message_body" class="form-control"></textarea>
			</p>
			<p class="text-right">
				<button type="submit" name="save" class="btn btn-info">ส่งข้อความ</button>
			</p>
		</form>
<?php
		}
?>
</div>
<?php
	include("footer.php");
?>
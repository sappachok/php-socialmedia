<?php
    session_start();
	include("header.php");
	include("db_connect.php");
?>
<div class="container">
		<p><a href="index.php" class="btn btn-info">กลับไป</a></p>
<?php
		if(isset($_POST["save"])) {  
			$message_id = $_GET["ms_id"];
			$message_body = $_POST["message_body"];

			$sql = "update message set message_body='$message_body' where message_id='$message_id' ";
			//echo $sql;

			$result = $mysqli->query($sql);        

			if($result) {
				echo "<div class='alert alert-success'>บันทึกเสร็จสิ้น</div>";
			} else {
				echo "<div class='alert alert-danger'>บันทึกข้อมูลล้มเหลว</div>";
				echo "<div>$sql</div>";
			}
		} else {
			$message_id = $_GET["ms_id"];
			$sql = "select * from message where message_id='$message_id' ";
			$result = $mysqli->query($sql);
			$obj = $result->fetch_object();
?>
		<form method="post">
			<p>
				<label>ข้อความ</label>
				<textarea name="message_body" class="form-control"><?php if(isset($obj->message_body)) echo $obj->message_body; ?></textarea>
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
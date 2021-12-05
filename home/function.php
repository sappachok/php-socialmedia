<?php
function check_login() {
	if(!isset($_SESSION["login"])) {
		echo "<p class='alert alert-warning'>ยังไม่ได้ยืนยันตัวตน</p>";
		echo "<meta http-equiv='refresh' content='2;url=login.php'>";
		exit();
	}
}
?>
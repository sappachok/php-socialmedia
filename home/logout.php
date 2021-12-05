<?php
	session_start();
	session_destroy();
?>
<div class="container">
<?php
	echo "ออกจากระบบ";
	echo "<meta http-equiv='refresh' content='2;url=login.php'>";
?>
</div>
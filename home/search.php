<?php
    session_start();
	include("header.php");
	include("db_connect.php");
?>
<div class="container">
	<form method="post">
	<p>
		<label>ค้นหาเพื่อน</label>
		<input type="text" name="name" class="form-control">
	</p>
	<p>
		<button type="submit" name="search" class="btn btn-info">ค้นหา</button>
	</p>
	</form>
</div>
<?php
	include("footer.php");
?>
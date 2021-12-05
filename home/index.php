<?php
    session_start();
	include("db_connect.php");
	include("header.php");

?>
<div class="container">
	<p>
<?php
    echo "<h1>Hello Social Media</h1><br>";
    echo "สวัสดีคุณ ";
    echo $_SESSION["full_name"]."<br>";    
?>
	</p>
    <p><a href="add_post.php" class="btn btn-info">สร้างโพสใหม่</a></p>
	<p>
<?php
		$sql = "select * from message where user_id='".$_SESSION["user_id"]."' 
			order by message_id desc";
        //echo $sql;
        $result = $mysqli->query($sql);
        //echo "num row: ".$result->num_rows."<br>";
        while($obj = $result->fetch_object()) {
			echo "<div class='card'>";
			echo "<div class='card-body'>";
			echo "<p><small>".$obj->message_datetime."</small></p>";
			echo "<p>".$obj->message_body."</p>";
			echo "<div class='text-right'><a href='edit_post.php?ms_id=".$obj->message_id."' class='btn btn-button btn-success'>แก้ไข</a>
			<a href='delete_post.php?ms_id=".$obj->message_id."' class='btn btn-button btn-danger'>ลบ</a></div>";
			echo "</div>";
			echo "</div>";
			echo "<br>";
		}
?>
	</p>
</div>
<?php
	include("footer.php");
?>
<?php
    session_start();
	include("header.php");
	include("db_connect.php");
?>
<div class="container">
    <h2>เพื่อนทั้งหมด</h2>

    <h3>การขอเป็นเพื่อน</h3>
<?php
    $sql = "select * from user_be_friend where user_id='".$_SESSION["user_id"]."' 
    and status = 'R' ";

    $result = $mysqli->query($sql);
    while($obj = $result->fetch_object()) {
        echo "<div class='card'>";
        echo "<div class='card-body'>".$obj->full_name."</div>";
        echo "</div>";
    }
?>
    <h3>การยืนยันคำขอ</h3>
    <?php
    $sql = "select * from user_be_friend where friend_id='".$_SESSION["user_id"]."' 
    and status = 'R' ";

    $result = $mysqli->query($sql);
    while($obj = $result->fetch_object()) {
        echo "<div class='card'>";
        echo "<div class='card-body'>".$obj->full_name."</div>";
        echo "</div>";
    }
?>    
</div>
<?php
	include("footer.php");
?>
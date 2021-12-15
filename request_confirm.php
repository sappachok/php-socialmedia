<?php
    session_start();
	include("header.php");
	include("db_connect.php");
?>
<div class="container">
<?php
    $user_id = $_GET["user_id"];
    $friend_id = $_GET["friend_id"];

    $update_sql = "update user_be_friend set status='F' 
    where user_id='$user_id' and friend_id='$friend_id' ";

    $update_result = $mysqli->query($update_sql);

    $insert_sql = "insert into user_be_friend (user_id, friend_id, status)
    value ('$friend_id', '$user_id', 'F')
    ";

    $insert_result = $mysqli->query($insert_sql);

    if($update_result && $insert_result) {
        echo "<div class='alert alert-success'>การยืนยันเสร็จสิ้น</div>";
        header("refresh:2, url=friend.php");
    } else {
        // Change Failed
        echo "<div class='alert alert-danger'>การยืนยันผิดพลาด</div>";
        header("refresh:2, url=friend.php");
    }

?>
</div>
<?php
	include("footer.php");
?>
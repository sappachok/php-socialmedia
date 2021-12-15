<?php
    session_start();
	include("header.php");
	include("db_connect.php");
?>
<div class="container">
<?php
    $user_id = $_GET["user_id"];
    $friend_id = $_GET["friend_id"];

    $delete_sql = "delete from user_be_friend
    where user_id='$user_id' and friend_id='$friend_id' ";

    $delete_result = $mysqli->query($delete_sql);

    $delete_sql = "delete from user_be_friend
    where user_id='$friend_id' and friend_id='$user_id' ";

    $delete_result = $mysqli->query($delete_sql);    

    if($delete_result) {
        echo "<div class='alert alert-success'>การลบเสร็จสิ้น</div>";
        header("refresh:2, url=friend.php");
    } else {
        // Change Failed
        echo "<div class='alert alert-danger'>การลบผิดพลาด</div>";
        header("refresh:2, url=friend.php");
    }

?>
</div>
<?php
	include("footer.php");
?>
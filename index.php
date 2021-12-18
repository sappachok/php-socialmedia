<?php
  session_start();
  include("header.php");
  include("db_connect.php");

?>  
<div class="container">
<?php
  echo "<h1>Hello Social Media</h1><br>";
  
  if(isset($_SESSION["file_photo"])) {
    echo "<img src='uploads/".$_SESSION["file_photo"]."' height='250'>";
  }
  
  echo "<p>สวัสดีคุณ ";
  echo $_SESSION["full_name"]."</p><br>";    
?>
  <br>
  <p>
    <a href="add_post.php" class="btn btn-primary">สร้างโพสใหม่</a>
    <a href="add_photo.php" class="btn btn-success">อัพโหลดรูป</a>
  </p>
<?php
  $sql = "select * from message where user_id='".$_SESSION["user_id"]."'
      order by message_id desc
    ";
  $result = $mysqli->query($sql);
  while ($obj = $result->fetch_object()) {
    echo "<div class=\"card\">";
    echo "<div class=\"card-body\">";
    if($obj->message_image != "") {
        echo "<div><img src='message_image_uploads/".$obj->message_image."' class='img-fluid'></div>";
    }
    echo "<div>".$obj->message_datetime."</div>";
    echo "<p>".$obj->message_body."</p>";

    if($obj->message_image != "") {
        echo "<div class='text-right'><a href='edit_photo.php?message_id=".$obj->message_id."' class='btn btn-primary'>แก้ไข</a>
        <a href='delete_post.php?message_id=".$obj->message_id."' class='btn btn-danger'>ลบ</a>
      </div>";
    } else {
        echo "<div class='text-right'><a href='edit_post.php?message_id=".$obj->message_id."' class='btn btn-success'>แก้ไข</a>
        <a href='delete_post.php?message_id=".$obj->message_id."' class='btn btn-danger'>ลบ</a>
      </div>";
    }
    echo "</div>";
    echo "</div>"; 
    echo "<br>";   
  }
?>
</div>
<?php
  include("footer.php");
?>
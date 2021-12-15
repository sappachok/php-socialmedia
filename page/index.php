<?php
  session_start();
  include("header.php");
  include("db_connect.php");

?>  
<div class="container">
<?php
  $user_id = $_GET["user_id"];

  $sql = "select * from user where user_id='".$user_id."' ";
  $result = $mysqli->query($sql);

  $user_info = $result->fetch_object();

  echo "<h1>Hello Social Media</h1><br>";
  
  if(isset($user_info->file_photo)) {
    echo "<img src='../uploads/".$user_info->file_photo."' height='250'>";
  }
  
  echo "<h1>".$user_info->full_name."</h1><br>";    
?>
  <br>
  <p>
    <a href="add_post.php" class="btn btn-primary">สร้างโพสใหม่</a>
    <a href="add_photo.php" class="btn btn-success">อัพโหลดรูป</a>
  </p>
<?php
  $sql = "select * from message where user_id='".$user_id."'
      order by message_id desc
    ";
  $result = $mysqli->query($sql);
  while ($obj = $result->fetch_object()) {
    echo "<div class=\"card\">";
    echo "<div class=\"card-body\"><div>".$obj->message_datetime."</div>
    <p>".$obj->message_body."</p>";
    echo "</div>";
    echo "</div>";
    echo "<br>";   
  }
?>
</div>
<?php
  include("footer.php");
?>
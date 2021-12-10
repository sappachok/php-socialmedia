<?php
  session_start();
  include("admin_config.php");
  include("header.php");
  include("db_connect.php");  
?>  
<div class="container">
<?php
   
?>
  <br>
  <p>
    <a href="users/list.php" class="btn btn-info">จัดการผู้ใช้</a>
    <a href="posts/list.php" class="btn btn-info">จัดการโพส</a>
  </p>
</div>
<?php
  include("footer.php");
?>
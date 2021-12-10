<?php
  session_start();
  include("../admin_config.php");
  include("../header.php");
  include("../db_connect.php");
?>
<div class="container-fluid"> 
    <p><a href="list.php" class="btn btn-info">กลับไป</a></p>
<?php
    if(isset($_GET["user_id"])) {
            // new mysqli("[host]", "[username]", "[password]") or die("Cannot connect database.");    
        $mysqli = new mysqli("localhost", "root", "") or die("Cannot connect database.");

        $mysqli->select_db("socialmedia") or die("Cannot select database.");

        if(!$mysqli) echo "Cannot Connect Database!!<br>";        

        $user_id = $_GET["user_id"];

        $sql = "delete from user where user_id='$user_id'";

        $result = $mysqli->query($sql);

        if($result) {
            echo "<div class='alert alert-success'>ลบข้อมูลเสร็จสิ้น</div>";
        } else {
            echo "<div class='alert alert-danger'>ลบข้อมูลล้มเหลว</div>";
            echo "<div>$sql</div>";
        }
    }
?>
</div>
<?php
  include("../footer.php");
?>
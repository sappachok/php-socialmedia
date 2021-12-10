<?php
  session_start();
  include("../admin_config.php");
  include("../header.php");
  include("../db_connect.php");
?>  
<div class="container-fluid"> <!-- container-fluid ขยายเต็มหน้าจอ -->
    <div class="row">
        <div class="col-sm-12">
<?php
    echo "<h1>จัดการผู้ใช้</h1>";
    
    echo "<p><a href='add.php' class='btn btn-success'><i class='fa fa-plus'></i> เพิ่มผู้ใช้</a></p>";

    // new mysqli("[host]", "[username]", "[password]") or die("Cannot connect database.");    
    $mysqli = new mysqli("localhost", "root", "") or die("Cannot connect database.");

    $mysqli->select_db("socialmedia") or die("Cannot select database.");

    if($mysqli) {
        //echo "Connect Database Success!!<br>";
    }

    $result = $mysqli->query("select * from user"); //SQL    

    echo "<table class='table table-bordered table-striped table-hover'>";
    echo "<thead>";
    echo "<th>รหัสผู้ใช้</th>";
    echo "<th>ชื่อผู้ใช้</th>";
    echo "<th>ชื่อ-สกุล</th>";
    echo "<th>จัดการ</th>";
    echo "</thead>";

    echo "<tbody>";
    while($obj = $result->fetch_object()) {
        echo "<tr>";
        echo "<td>".$obj->user_id."</td>";
        echo "<td>".$obj->user_name."</td>";
        echo "<td>".$obj->full_name."</td>";
        echo "<td>
            <a href='edit.php?user_id=".$obj->user_id."' class='btn btn-info'><i class='fa fa-pencil'></i> แก้ไข</a> 
            <a href='delete.php?user_id=".$obj->user_id."' class='btn btn-danger'><i class='fa fa-trash'></i> ลบ</a></td>";
        echo "</tr>";     
    }
    echo "</tbody>";
    echo "</table>";
?>
        </div>
    </div>
</div>  
<?php
  include("../footer.php");
?>
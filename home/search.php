<?php
    session_start();
	include("header.php");
	include("db_connect.php");
?>
<div class="container">
    <h2>ค้นหาเพื่อน</h2>
    <form method="post">
    <p>
        <input type="text" name="keyword" class="form-control">
    </p>
    <p>
        <button type="submit" name="search" class="btn btn-primary">ค้นหา</button>
    </p>
    </form>

    <?php
        if(isset($_POST["search"])) {
            $keyword = $_POST["keyword"];

            $sql = "select * from user where full_name like '$keyword%' ";
            // keyword is "กร"
            // select * from user where full_name like 'กร%'            
            // กรษฎา, กรกรต, กรกฎา
            // select * from user where full_name like '%'
            // ดึงข้อมูลทั้งหมด ชื่ออะไรก็ได้

            $result = $mysqli->query($sql);
            while ($obj = $result->fetch_object()) {
                echo "<div>".$obj->full_name."</div>";
            }
        }
    ?>
</div>
<?php
	include("footer.php");
?>        
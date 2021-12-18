<?php
    session_start();
    include("header.php");
    include("db_connect.php");
?>
<div class="container">
<?php
    if(isset($_POST["save"])) {
        $message_body = $_POST["message_body"];

        if(!empty($_FILES["message_images"]["tmp_name"])) { // ไม่เป็นค่าว่าง (not empty)
            $message_image_name = $_FILES["message_images"]["name"];
            $message_image_tmp = $_FILES["message_images"]["tmp_name"];
            $target = "message_image_uploads/".$message_image_name;
            //$target = "message_image_uploads/stude-00085853_normal.png";
    
            if(move_uploaded_file($message_image_tmp, $target)) {
                // Upload Success
                $sql = "insert into message (message_body, message_image, message_datetime, user_id)
                value ('$message_body', '$message_image_name', '".date("d-m-Y H:i:s")."','".$_SESSION["user_id"]."')";
    
                $result = $mysqli->query($sql);
    
                if($result) {
                    echo "<div class='alert alert-success'>บันทึกเสร็จสิ้น</div>";
                } else {
                    echo "<div class='alert alert-danger'>บันทึกข้อมูลล้มเหลว</div>";
                    //echo "<div>$sql</div>";
                }    
            } else {
                // Upload Failed
                echo "<div class='alert alert-danger'>บันทึกข้อมูลล้มเหลว</div>";
            }
        } else {
            
        }

        

        echo "<p><a href='index.php' class='btn btn-info'>กลับไป</a></p>";
    }
?>

    <!-- Start content -->
    <h2>เพิ่มรูปภาพ</h2>

    <form method="post" enctype="multipart/form-data">
    <p>              
        <input type="file" name="message_images">
    </p>          
    <p>              
        <textarea name="message_body" class="form-control" rows="5"></textarea>
    </p>  
    <p>              
        <button type="submit" name="save" class="btn btn-primary">บันทึก</button>
    </p>
    </form>
    <!-- End content -->
</div>  
<?php
  include("footer.php");
?>
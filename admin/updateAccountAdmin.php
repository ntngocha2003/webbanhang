<?php    
    $sdt=$_POST['phone'];
    $diaChi=$_POST['address'];
    $gioiTinh=$_POST['gender'];
    
    $id=$_POST['id'];
    $uploadDir_img_logo = './image/';

    $file_tmp = isset($_FILES['image']['tmp_name']) ? $_FILES['image']['tmp_name'] : ""; 
    $file_name = isset($_FILES['image']['name']) ? $_FILES['image']['name'] : ""; 
    $file_type = isset($_FILES['image']['type']) ? $_FILES['image']['type'] : ""; 
    $file_size = isset($_FILES['image']['size']) ? $_FILES['image']['size'] : ""; 
    $file_error = isset($_FILES['image']['error']) ? $_FILES['image']['error'] : "";

    $dmyhis=date("Y").date("m").date("d").date("H").date("i").date("s");
    
    $image=$dmyhis.$file_name; 

    if(!empty($file_name)){
        copy ( $file_tmp, $uploadDir_img_logo.$image);
    }
         require_once 'connect.php';

        $updateTK=" UPDATE `staffs` SET `sdt`='$sdt',`image`='$image',`gioi_tinh`='$gioiTinh',`dia_chi`='$diaChi' WHERE id='$id' ";
        if(mysqli_query($conn,$updateTK)){
            echo "<h1>Sửa thành công</h1>";
            header("location: homeAdmin.php");
        }
?>
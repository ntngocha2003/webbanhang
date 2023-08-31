<?php
    $maNV=$_POST['maNV'];
    $tenNV=$_POST['tenNV'];
    $email=$_POST['email'];
    $sdt=$_POST['sdt'];
    $diaChi=$_POST['diaChi'];
    $ngaySinh=$_POST['ngaySinh'];
    $cccd=$_POST['cccd'];
    $gioiTinh=$_POST['gioiTinh'];
    $chucVu=$_POST['chucVu'];
    $id=$_POST['sid'];

    $uploadDir_img_logo = "./image/";

    $file_tmp = isset($_FILES['image']['tmp_name']) ? $_FILES['image']['tmp_name'] : ""; 
    $file_name = isset($_FILES['image']['name']) ? $_FILES['image']['name'] : ""; 
    $file_type = isset($_FILES['image']['type']) ? $_FILES['image']['type'] : ""; 
    $file_size = isset($_FILES['image']['size']) ? $_FILES['image']['size'] : ""; 
    $file_error = isset($_FILES['image']['error']) ? $_FILES['image']['error'] : "";

    $dmyhis=date("Y").date("m").date("d").date("H").date("i").date("s");
    $image=$dmyhis.$file_name; 
    copy ( $file_tmp, $uploadDir_img_logo.$image);
        require_once 'connect.php';

        $updateNv="UPDATE `staff` set ma_nv='$maNV',ten_nv='$tenNV',image='$image',email='$email',sdt='$sdt',
        dia_chi='$diaChi',ngay_sinh='$ngaySinh',cccd='$cccd',gioi_tinh='$gioiTinh',chuc_vu='$chucVu'
         Where id='$id' ";

        if(mysqli_query($conn,$updateNv)){
            echo "<h1>Sửa thành công</h1>";
            header("location: renderStaff.php");
        }
   

?>
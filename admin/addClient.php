<?php
    $maKH=$_POST['maKH'];
    $tenKH=$_POST['tenKH'];
    $email=$_POST['email'];
    $sdt=$_POST['sdt'];
    $diaChi=$_POST['diaChi'];
    $ngaySinh=$_POST['ngaySinh'];
    $cccd=$_POST['cccd'];
    $gioiTinh=$_POST['gioiTinh'];


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

        $addKh="INSERT INTO `client`(`id`, `ma_kh`, `ten_kh`, `image`, `email`, `sdt`, `dia_chi`, `ngay_sinh`,`cccd`,`gioi_tinh`) 
        VALUES (null,'$maKH','$tenKH','$image','$email','$sdt','$diaChi','$ngaySinh','$cccd','$gioiTinh')";

        if(mysqli_query($conn,$addKh)){
            echo "<h1>Thêm thành công</h1>";
            header("location: renderClient.php");
        }
   

?>
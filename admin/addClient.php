<?php
   
    $tenKH=$_POST['tenKH'];
    $email=$_POST['email'];
    $sdt=$_POST['sdt'];
    $diaChi=$_POST['diaChi'];
    $ngaySinh=$_POST['ngaySinh'];
    $cccd=$_POST['cccd'];
    $gioiTinh=$_POST['gioiTinh'];

        require_once 'connect.php';
      

        $addKh="INSERT INTO `client`(`id`, `id_count`, `ten_kh`, `email`, `sdt`, `dia_chi`, `ngay_sinh`, `cccd`, `gioi_tinh`) 
        VALUES (null,'70','$tenKH','$sdt','$email','$diaChi','$ngaySinh','$cccd','$gioiTinh')";

        if(mysqli_query($conn,$addKh)){
            echo "<h1>Thêm thành công</h1>";
            header("location: renderClient.php");
        }
   

?>
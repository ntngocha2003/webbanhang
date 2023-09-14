<?php
   
    $tenKH=$_POST['tenKH'];
    $email=$_POST['email'];
    $sdt=$_POST['sdt'];
    $diaChi=$_POST['diaChi'];
    $ngaySinh=$_POST['ngaySinh'];
    $cccd=$_POST['cccd'];
    $gioiTinh=$_POST['gioiTinh'];
    $id=$_POST['sid'];

        
        require_once 'connect.php';

        $updateKh="UPDATE `client` set ten_kh='$tenKH',email='$email',sdt='$sdt',
        dia_chi='$diaChi',ngay_sinh='$ngaySinh',cccd='$cccd',gioi_tinh='$gioiTinh'
         Where id='$id' ";

        if(mysqli_query($conn,$updateKh)){
            echo "<h1>Sửa thành công</h1>";
            header("location: renderClient.php");
        }
   

?>
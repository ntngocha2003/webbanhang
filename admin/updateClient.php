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

        $updateKh=" UPDATE `account` SET `sdt`='$sdt',
        `ngay_sinh`='$ngaySinh',`gioi_tinh`='$gioiTinh',`dia_chi`='$diaChi',`quen`='Khách hàng' WHERE id='$id' ";
        

        if(mysqli_query($conn,$updateKh)){
            echo "<h1>Sửa thành công</h1>";
            header("location: renderClient.php");
        }
   

?>
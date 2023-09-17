<?php
    
    $sdt=$_POST['phone'];
    $tenDN=$_POST['name'];
    $diaChi=$_POST['address'];
    $ngaySinh=$_POST['date'];
    $gioiTinh=$_POST['gender'];
    
    $id=$_POST['id'];
         require_once './admin/connect.php';

        $updateTK=" UPDATE `account` SET `sdt`='$sdt',
        `ngay_sinh`='$ngaySinh',`gioi_tinh`='$gioiTinh',`dia_chi`='$diaChi',`quen`='Khách hàng' WHERE id='$id' ";

        if(mysqli_query($conn,$updateTK)){
            echo "<h1>Sửa thành công</h1>";
            header("location: home.php");
        }
   

?>
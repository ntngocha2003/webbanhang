<?php    
    $sdt=$_POST['phone'];
    $diaChi=$_POST['address'];
    $gioiTinh=$_POST['gender'];
    
    $id=$_POST['id'];
         require_once 'connect.php';

        $updateTK=" UPDATE `account` SET `sdt`='$sdt',`gioi_tinh`='$gioiTinh',`dia_chi`='$diaChi' WHERE id='$id' ";
        if(mysqli_query($conn,$updateTK)){
            echo "<h1>Sửa thành công</h1>";
            header("location: homeAdmin.php");
        }
?>
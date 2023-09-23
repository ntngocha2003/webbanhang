<?php
    
    $tinhTrang=$_POST['tinhTrang'];
   
    $id=$_POST['sid'];
        require_once 'connect.php';

        $updateSp="UPDATE `client_order` set tinh_trang='$tinhTrang'
         Where id='$id' ";

        if(mysqli_query($conn,$updateSp)){
            echo "<h1>Sửa thành công</h1>";
            header("location: renderOrder.php");
        }
   

?>
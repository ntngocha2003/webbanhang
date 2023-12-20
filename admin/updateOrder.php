<?php
    
    $tinhTrang=$_POST['tinhTrang'];
    $id=$_POST['sid'];

    
        require_once 'connect.php';

        $updateOrder="UPDATE `client_order` SET `tinh_trang` = '$tinhTrang' 
         Where client_order.id='$id' ";

        if(mysqli_query($conn,$updateOrder)){
            echo "<h1>Sửa thành công</h1>";
            header("location: renderOrder.php");
        }
    
   

?>
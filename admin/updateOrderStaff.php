<?php
    
    $tinhTrang=$_POST['tinhTrang'];
    $id=$_POST['sid'];

    $time=time();
        require_once 'connect.php';

        $updateOrder="UPDATE `orders` set `tinh_trang` = '$tinhTrang' ,`last_updated`=$time
         Where orders.id='$id' ";

        if(mysqli_query($conn,$updateOrder)){
            echo "<h1>Sửa thành công</h1>";
            header("location: renderOrderStaff.php");
        }
    
   

?>
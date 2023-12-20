<?php
    
    $id=$_POST['id'];
         require_once './admin/connect.php';
          $updateTK=" UPDATE `client_order` SET `tinh_trang`='Đã hủy' WHERE id='$id' ";

        if(mysqli_query($conn,$updateTK)){
            echo "<h1>Sửa thành công</h1>";
            header("location: bill.php");
        }
   

?>
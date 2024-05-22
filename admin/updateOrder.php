<?php
    
    $tinhTrang=$_POST['tinhTrang'];
    $idNV=$_POST['idNV'];
    $id=$_POST['sid'];

    $time=time();
        require_once 'connect.php';

        if($tinhTrang=='Đang giao hàng'){
            $updateOrder="UPDATE `orders` SET `id_staff`='$idNV',`tinh_trang` = '$tinhTrang' ,`last_updated`=$time
            Where orders.id='$id' ";

        }
        else{
            $updateOrder="UPDATE `orders` SET `tinh_trang` = '$tinhTrang' ,`last_updated`=$time
            Where orders.id='$id' ";
        }

        if(mysqli_query($conn,$updateOrder)){
            echo "<h1>Sửa thành công</h1>";
            header("location: renderOrder.php");
        }
    
   

?>
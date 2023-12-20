<?php
    $tenNCC=$_POST['tenNCC'];
    $SDT=$_POST['SDT'];
    $Email=$_POST['Email'];
    $diaChi=$_POST['diaChi'];
   
    $id=$_POST['sid'];

    
        require_once 'connect.php';

        $updateNcc="UPDATE `supplier` set ten_ncc='$tenNCC',sdt='$SDT',email='$Email',dia_chi='$diaChi'
         Where id='$id' ";

        if(mysqli_query($conn,$updateNcc)){
            echo "<h1>Sửa thành công</h1>";
            header("location: renderSupplier.php");
        }
    
   

?>
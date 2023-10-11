<?php
     $maDM=$_POST['maDM'];
     $tenDM=$_POST['tenDM'];
     $id=$_POST['sid'];
         require_once 'connect.php';

        $updateDM="UPDATE `category` set ten_dm='$tenDM'Where id='$id' ";

        if(mysqli_query($conn,$updateDM)){
            echo "<h1>Sửa thành công</h1>";
            header("location: renderCategory.php");
        }
   

?>
<?php
    $chucVu=$_POST['chucVu'];
   
    $id=$_POST['sid'];

    
        require_once 'connect.php';

        $updateNv="UPDATE `account` set quen='$chucVu'
         Where id='$id' ";

        if(mysqli_query($conn,$updateNv)){
            echo "<h1>Sửa thành công</h1>";
            header("location: renderAccount.php");
        }
    
   

?>
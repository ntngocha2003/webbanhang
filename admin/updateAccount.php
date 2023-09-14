<?php
     $email=$_POST['email'];
     $tenDN=$_POST['tenDN'];
     $MK=$_POST['MK'];
     $quen=$_POST['quen'];
     $id=$_POST['sid'];
         require_once 'connect.php';

        $updateTK="UPDATE `account` set email='$email',ten_dn='$tenDN',mat_khau='$MK',quen='$quen'Where id='$id' ";

        if(mysqli_query($conn,$updateTK)){
            echo "<h1>Sửa thành công</h1>";
            header("location: renderAccount.php");
        }
   

?>
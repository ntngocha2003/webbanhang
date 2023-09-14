<?php
    $email=$_POST['email'];
    $tenDN=$_POST['tenDN'];
    $MK=$_POST['MK'];
    $quen=$_POST['quen'];
        require_once 'connect.php';

        $addTK="INSERT INTO `account`(`id`, `email`, `ten_dn`,`mat_khau`,`quen`) 
        VALUES (null,'$email','$tenDN','$MK','$quen')";

        if(mysqli_query($conn,$addTK)){
            echo "<h1>Thêm thành công</h1>";
            header("location: renderAccount.php");
        }

?>
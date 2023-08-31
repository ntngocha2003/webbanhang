<?php
    $maDM=$_POST['maDM'];
    $tenDM=$_POST['tenDM'];
        require_once 'connect.php';

        $addDm="INSERT INTO `category`(`id`, `ma_dm`, `ten_dm`) 
        VALUES (null,'$maDM','$tenDM')";

        if(mysqli_query($conn,$addDm)){
            echo "<h1>Thêm thành công</h1>";
            header("location: renderCategory.php");
        }

?>
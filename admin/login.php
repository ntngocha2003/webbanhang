<?php

    $name=$_POST['name'];
    $pass=$_POST['pass'];

    require_once 'connect.php';

    $login="select *from account where ten_dn='$name' and mat_khau='$pass'";

    $test= mysqli_query($conn,$login);


    if(mysqli_num_rows($test)>0){
        echo "<h1>Đăng nhập thành công</h1>";
        header("location: renderStaff.php");
    }else{
        echo "<h1>Đăng nhập thất bại</h1>";
        header("location: login.html");
    }
?>


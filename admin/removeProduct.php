<?php
    $ip=$_GET['sid'];

    require_once 'connect.php';

    $remove_sql="DELETE FROM product where id=$ip";

    if(mysqli_query($conn,$remove_sql)){
        echo "<h1>Xóa thành công</h1>";
        header("location: renderProduct.php");
    }

    
?>
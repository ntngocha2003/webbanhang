<?php
    $id=$_GET['sid'];

    require_once 'connect.php';

    $remove_sql="DELETE FROM account where id=$id";

    if(mysqli_query($conn,$remove_sql)){
        
        echo "<h1>Xóa thành công</h1>";
        header("location: renderClient.php");
    }

    
?>
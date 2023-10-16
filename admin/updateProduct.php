<?php
    $tenSP=$_POST['tenSP'];
    $moTa=$_POST['moTa'];
    $sale=$_POST['sale'];
    $giaGoc=$_POST['giaGoc'];
    $giaMoi=$_POST['giaMoi'];
    $tinhTrang=$_POST['tinhTrang'];
    $soLuong=$_POST['soLuong'];
    $danhMuc=$_POST['danhMuc'];
    $id=$_POST['sid'];

    
        require_once 'connect.php';

        $updateSp="UPDATE `product` set ten_sp='$tenSP',mota='$moTa',sale='$sale',gia_goc='$giaGoc',
        gia_moi='$giaMoi',tinh_trang='$tinhTrang',so_luong='$soLuong',id_dm='$danhMuc'
         Where id='$id' ";

        if(mysqli_query($conn,$updateSp)){
            echo "<h1>Sửa thành công</h1>";
            header("location: renderProduct.php");
        }
    
   

?>
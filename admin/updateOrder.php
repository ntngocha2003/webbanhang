<?php
    $maDH=$_POST['maDH'];
    $tenSP=$_POST['tenSP'];
    $moTa=$_POST['moTa'];
    $giaMoi=$_POST['giaMoi'];
    $tenNV=$_POST['tenNV'];
    $tenKH=$_POST['tenKH'];
    $soLuong=$_POST['soLuong'];
    $tinhTrang=$_POST['tinhTrang'];
    $diaChi=$_POST['diaChi'];
    $id=$_POST['sid'];

    $uploadDir_img_logo = "./image/";

    $file_tmp = isset($_FILES['image']['tmp_name']) ? $_FILES['image']['tmp_name'] : ""; 
    $file_name = isset($_FILES['image']['name']) ? $_FILES['image']['name'] : ""; 
    $file_type = isset($_FILES['image']['type']) ? $_FILES['image']['type'] : ""; 
    $file_size = isset($_FILES['image']['size']) ? $_FILES['image']['size'] : ""; 
    $file_error = isset($_FILES['image']['error']) ? $_FILES['image']['error'] : "";

    $dmyhis=date("Y").date("m").date("d").date("H").date("i").date("s");
    $image=$dmyhis.$file_name; 
    copy ( $file_tmp, $uploadDir_img_logo.$image);
        require_once 'connect.php';

        $updateSp="UPDATE `orders` set ma_dh='$maDH',ten_sp='$tenSP',mota='$moTa',image='$image',gia_moi='$giaMoi',ten_nv='$tenNV',
        ten_kh='$tenKH',so_luong='$soLuong',tinh_trang='$tinhTrang',dia_chi='$diaChi'
         Where id='$id' ";

        if(mysqli_query($conn,$updateSp)){
            echo "<h1>Sửa thành công</h1>";
            header("location: renderOrder.php");
        }
   

?>
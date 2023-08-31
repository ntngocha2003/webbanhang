<?php
    $maSP=$_POST['maSP'];
    $tenSP=$_POST['tenSP'];
    $moTa=$_POST['moTa'];
    $sale=$_POST['sale'];
    $giaGoc=$_POST['giaGoc'];
    $giaMoi=$_POST['giaMoi'];
    $tinhTrang=$_POST['tinhTrang'];
    $soLuong=$_POST['soLuong'];
    $danhMuc=$_POST['danhMuc'];
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

        $updateSp="UPDATE `product` set ma_sp='$maSP',ten_sp='$tenSP',mota='$moTa',image='$image',sale='$sale',gia_goc='$giaGoc',
        gia_moi='$giaMoi',tinh_trang='$tinhTrang',so_luong='$soLuong',ten_dm='$danhMuc'
         Where id='$id' ";

        if(mysqli_query($conn,$updateSp)){
            echo "<h1>Sửa thành công</h1>";
            header("location: renderProduct.php");
        }
   

?>
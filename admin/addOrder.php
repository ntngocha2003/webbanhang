<?php
   
    $tenSP=$_POST['tenSP'];
    $moTa=$_POST['moTa'];
    $giaMoi=$_POST['giaMoi'];
    $tenNV=$_POST['tenNV'];
    $tenKH=$_POST['tenKH'];
    $soLuong=$_POST['soLuong'];
    $tinhTrang=$_POST['tinhTrang'];
    $diaChi=$_POST['diaChi'];


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

        $addDH="INSERT INTO `orders`(`id`,  `ten_sp`, `mota`,`image`, `tong_tien`, `so_luong`, `ten_nv`,`ten_kh`,`tinh_trang`,`dia_chi`) 
        VALUES (null,'$tenSP','$moTa','$image','$giaMoi','$soLuong','$tenNV','$tenKH','$tinhTrang','$diaChi')";

        if(mysqli_query($conn,$addDH)){
            echo "<h1>Thêm thành công</h1>";
            header("location: renderOrder.php");
        }
   

?>
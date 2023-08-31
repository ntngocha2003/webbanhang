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

        $addSp="INSERT INTO `product`(`id`, `ma_sp`, `ten_sp`, `mota`,`image`, `sale`, `gia_goc`, `gia_moi`,`tinh_trang`,`so_luong`,`ten_dm`) 
        VALUES (null,'$maSP','$tenSP','$moTa','$image','$sale','$giaGoc','$giaMoi','$tinhTrang','$soLuong','$danhMuc')";

        if(mysqli_query($conn,$addSp)){
            echo "<h1>Thêm thành công</h1>";
            header("location: renderProduct.php");
        }
   

?>
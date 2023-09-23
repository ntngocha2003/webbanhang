<?php
if(isset($_POST['addS'])){
    $maNV=$_POST['maNV'];
    $tenNV=$_POST['tenNV'];
    $email=$_POST['email'];
    $sdt=$_POST['sdt'];
    $diaChi=$_POST['diaChi'];
    $ngaySinh=$_POST['ngaySinh'];
    $cccd=$_POST['cccd'];
    $gioiTinh=$_POST['gioiTinh'];
    $chucVu=$_POST['chucVu'];


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

        $addNv="INSERT INTO `staff`(`id`, `ma_nv`, `ten_nv`, `image`, `email`, `sdt`, `dia_chi`, `ngay_sinh`,`cccd`,`gioi_tinh`,`chuc_vu`) 
        VALUES (null,'$maNV','$tenNV','$image','$email','$sdt','$diaChi','$ngaySinh','$cccd','$gioiTinh','$chucVu')";

        if(mysqli_query($conn,$addNv)){
            echo "<h1>Thêm thành công</h1>";
            header("location: renderStaff.php");
        }
}  

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm nhân viên</title>
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="./css/addStaff.css">
    <link rel="stylesheet" href="./css/reponsiver.css"> 
    <!-- Latest compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"> -->

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="../font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../gird/GirdSystem/gird.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400, 500, 700display=swapsubset=vietnamese" rel="stylesheet">
</head>
<body>
    <div class="admin">
    <?php
                        require_once'header_admin.php';
                   ?> 

        <div class="admin_container">
            <div class="grid wide">
                <div class="row">
                    
                    <?php
                        require_once'admin_category.php';
                    ?> 
                
                    <div class="col l-9 m-12 c-12">
                        <div class="add_staff">

                            <div class="add-header">
                                <h3>Thêm nhân viên</h3>
                            </div>
                            <div class="add-content">
                                <form action="./addStaff.php" method="post" enctype="multipart/form-data">
                                    <div class="block row">

                                        <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label for="maNV">Mã nhân viên</label>
                                                <input type="text" class="form-control" name="maNV">
                                            </div>
                                        </div>
                                        <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label for="tenNV">Tên nhân viên</label>
                                                <input type="text" class="form-control" name="tenNV">
                                            </div>
                                        </div>
                                        
                                          <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label for="image">Ảnh 3 x 4</label>
                                                <input type="file" class="form-control" name="image">
                                                
                                            </div>
                                          </div>
                                          <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" name="email">
                                            </div>
                                          </div>
                                          <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label for="sdt">Số điện thoại</label>
                                                <input type="number" class="form-control" name="sdt">
                                            </div>
                                          </div>
                                          <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label for="diaChi">Địa chỉ</label>
                                                <input type="text" class="form-control" name="diaChi">
                                            </div>
                                          </div>
                                          <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label for="ngaySinh">Ngày sinh</label>
                                                <input type="date" class="form-control" name="ngaySinh">
                                            </div>
                                          </div>
                                          <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label for="cccd">CCCD</label>
                                                <input type="number" class="form-control" name="cccd">
                                            </div>
                                          </div>
                                          <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label class="control-label">Giới tính</label>
                                                <select name="gioiTinh" class="form-control" id="exampleSelect2" required>
                                                  <option>-- Chọn giới tính --</option>
                                                  <option>Nam</option>
                                                  <option>Nữ</option>
                                                </select>
                                            </div>
                                          </div>
                                          <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label for="exampleSelect1" class="control-label">Chức vụ</label>
                                                <select name="chucVu" class="form-control" id="exampleSelect1">
                                                  <option>-- Chọn chức vụ --</option>
                                                  <option>Bán hàng</option>
                                                  <option>Tư vấn</option>
                                                  <option>Dịch vụ</option>
                                                  <option>Kiểm hàng</option>
                                                  <option>Bảo trì</option>
                                                </select>
                                            </div>
                                          </div>
                                    </div>
                                    <div class="block">
                                        <button type="submit" class="btn btn-primary btn-save" name="addS">Lưu thông tin</button>
                                        <a onclick="return confirm('bạn có muốn hủy bỏ thao tác này không')" class="btn btn-cancel" href="./renderStaff.php">Hủy bỏ</a>
                                    </div>
                                  </form>
                            </div>
                        </div>
                    </div>  
                </div>
            </div> 
        </div> 


    </div>
    <script src="./js/main.js"></script>
</body>
</html>
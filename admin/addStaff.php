<?php
    session_start();
    ob_start();
    require_once 'connect.php';
?>
<?php
if(isset($_POST['addP'])){
    $tenNV=$_POST['tenNV'];
    $MK=$_POST['MK'];
    $sdt=$_POST['sdt'];
    $email=$_POST['email'];
    $ngaySinh=$_POST['ngaySinh'];
    $gioiTinh=$_POST['gioiTinh'];
    $diaChi=$_POST['diaChi'];
    $chucVu=$_POST['chucVu'];


    $uploadDir_img_logo = "./image/";

    $file_tmp = isset($_FILES['image']['tmp_name']) ? $_FILES['image']['tmp_name'] : ""; 
    $file_name = isset($_FILES['image']['name']) ? $_FILES['image']['name'] : ""; 
    $file_type = isset($_FILES['image']['type']) ? $_FILES['image']['type'] : ""; 
    $file_size = isset($_FILES['image']['size']) ? $_FILES['image']['size'] : ""; 
    $file_error = isset($_FILES['image']['error']) ? $_FILES['image']['error'] : "";

    $dmyhis=date("Y").date("m").date("d").date("H").date("i").date("s");
    $image=$dmyhis.$file_name; 

    $err=[];

    if(!empty($file_name)){
        copy ( $file_tmp, $uploadDir_img_logo.$image);
    }
    // else if(empty($file_name)){
    //     $err['image']='Bạn chưa chọn ảnh';
        
    // }

    if(empty($tenNV)){
        $err['tenNV']='Bạn chưa nhập tên nhân viên';
    }
    if(empty($MK)){
        $err['MK']='Bạn chưa nhập mật khẩu';
    }
    
    if(empty($sdt)){
        $err['sdt']='Bạn chưa nhập số điện thoại';
    }
    if(empty($ngaySinh)){
        $err['ngaySinh']='Bạn chưa nhập ngày sinh';
    }
    if(empty($diaChi)){
        $err['diaChi']='Bạn chưa nhập địa chỉ';
    }
   
    if(empty($chucVu)){
        $err['chucVu']='Bạn chưa chọn chức vụ';
    }
        require_once 'connect.php';
        if(empty($err)){

            $insertAccount = mysqli_query($conn, "INSERT INTO `account` (`id`, `ten_dn`, `mat_khau`,`quen`) 
                                    VALUES (NULL,'$tenNV','$MK','$chucVu')");
                               
            $accountID = $conn->insert_id;

            $addTK="INSERT INTO `staffs`(`id`, `id_acc`,`email`,`sdt`,`image`,`ngay_sinh`,`gioi_tinh`,`dia_chi`)
            VALUES (null,'" . $accountID . "','$email','$sdt','$image','$ngaySinh','$gioiTinh','$diaChi')" ;

            if(mysqli_query($conn,$addTK)){
                echo "<h1>Thêm thành công</h1>";
                header("location: renderStaff.php");
            }
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
    <link rel="stylesheet" href="./css/addProduct.css">
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
                        require 'header_admin.php';
                   ?> 

        <div class="admin_container">
            <div class="grid wide">
                <div class="row">
                    
                    <?php
                    require 'admin_category.php';
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

                                                <label for="tenNV">Tên nhân viên</label>
                                                <input type="text" class="form-control" name="tenNV">
                                                <span class="message">
                                                    <?php
                                                        echo (isset($err['tenNV'])?($err['tenNV']):'');
                                                    ?>
                                                </span>
                                            </div>
                                        </div>
                                        
                                          <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label for="MK">Mật khẩu</label>
                                                <input type="password" class="form-control" name="MK">
                                                <span class="message">
                                                    <?php
                                                        echo (isset($err['MK'])?($err['MK']):'');
                                                    ?>
                                                </span>
                                            </div>
                                            
                                          </div>

                                          <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label for="email">Email</label>
                                                <input type="text" class="form-control" name="email">

                                                <span class="message">
                                                    <?php
                                                        echo (isset($err['email'])?($err['email']):'');
                                                    ?>
                                                </span>
                                            </div>
                                          </div>

                                          <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label for="sdt">Số điện thoại</label>
                                                <input type="number" class="form-control" name="sdt">
                                                <span class="message">
                                                    <?php
                                                        echo (isset($err['sdt'])?($err['sdt']):'');
                                                    ?>
                                                </span>
                                            </div>
                                            
                                          </div>
                                          <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label for="image">Ảnh 3 x 4</label>
                                                <input type="file" class="form-control" name="image">

                                                <span class="message">
                                                    <?php
                                                        echo (isset($err['image'])?($err['image']):'');
                                                    ?>
                                                </span>
                                            </div>
                                          </div>
                                          <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label for="ngaySinh">Ngày sinh</label>
                                                <input type="date" class="form-control" name="ngaySinh">
                                                <span class="message">
                                                    <?php
                                                        echo (isset($err['ngaySinh'])?($err['ngaySinh']):'');
                                                    ?>
                                                </span>
                                            </div>
                                          </div>
                                          <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label for="gioiTinh">Giới tính</label>
                                                <select class="form-control" name="gioiTinh">
                                                    <option>--Chọn giới tính--</option>
                                                    <option>Nam</option>
                                                    <option>Nữ</option>
                                                    <option>Không xác định</option>
                                                    
                                                    
                                                </select>
                                            </div>
                                          </div>
                                          <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label for="diaChi">Địa chỉ</label>
                                                <input type="text" class="form-control" name="diaChi">
                                                <span class="message">
                                                    <?php
                                                        echo (isset($err['diaChi'])?($err['diaChi']):'');
                                                    ?>
                                                </span>
                                            </div>
                                          </div>
                                          <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label class="control-label">Chức vụ</label>
                                                <select name="chucVu"class="form-control" id="exampleSelect2" required>
                                                    <option>--Chọn chức vụ--</option>
                                                    <option>Nhân viên chăm sóc khách hàng</option>
                                                    <option>Nhân viên quản lý kho</option>
                                                    <option>Nhân viên giao hàng</option>
                                                </select>
                                            </div>
                                          </div>
                                          
                                    </div>
                                    <div class="block">
                                        <button type="submit" class="btn btn-primary btn-save" name="addP">Lưu thông tin</button>
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
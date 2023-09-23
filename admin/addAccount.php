<?php
    $email=$_POST['email'];
    $tenDN=$_POST['tenDN'];
    $MK=$_POST['MK'];
    $quen=$_POST['quen'];
        require_once 'connect.php';

        $addTK="INSERT INTO `account`(`id`, `email`, `ten_dn`,`mat_khau`,`quen`) 
        VALUES (null,'$email','$tenDN','$MK','$quen')";

        if(mysqli_query($conn,$addTK)){
            echo "<h1>Thêm thành công</h1>";
            header("location: renderAccount.php");
        }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm tài khoản</title>
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
                                <h3>Thêm tài khoản</h3>
                            </div>
                            <div class="add-content">
                                <form action="addAccount.php" method="post" enctype="multipart/form-data">
                                    <div class="block row">

                                        <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label for="sdt">Email</label>
                                                <input type="email" class="form-control" name="email">
                                            </div>
                                        </div>
                                        <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label for="tenDN">Tên đăng nhập</label>
                                                <input type="text" class="form-control" name="tenDN">
                                            </div>
                                        </div>
                                        <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label for="MK">Mật khẩu</label>
                                                <input type="password" class="form-control" name="MK">
                                            </div>
                                        </div>
                                        <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label for="quen">Quyền</label>
                                                <select class="form-control" name="quen">
                                                    <option>-- Chọn phân quền --</option>
                                                    <option>Admin</option>
                                                    <option>Nhân viên</option>
                                                    <option>Khách hàng</option>
                                                    
                                                </select>
                                            </div>
                                          </div>
                                        
                                    </div>
                                    <div class="block">
                                        <button type="submit" class="btn btn-primary btn-save">Lưu thông tin</button>
                                        <a onclick="return confirm('bạn có muốn hủy bỏ thao tác này không')" class="btn btn-cancel" href="./renderAccount.php">Hủy bỏ</a>
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
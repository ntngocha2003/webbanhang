<?php
    $id=$_GET['sid'];

    require_once 'connect.php';

    $edit_sql="SELECT * FROM staff where id=$id";

    $result=mysqli_query($conn,$edit_sql);

    $row= mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin nhân viên</title>
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
                                <h3>Sửa thông tin nhân viên</h3>
                            </div>
                            <div class="add-content">
                                <form action="./updateStaff.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" id="" name="sid" value="<?php echo $id?>">
                                    <div class="block row">

                                        <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label for="maNV">Mã nhân viên</label>
                                                <input type="text" class="form-control" name="maNV"
                                                    value="<?php echo $row['ma_nv']?>">
                                            </div>
                                        </div>
                                        <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label for="tenNV">Tên nhân viên</label>
                                                <input type="text" class="form-control" name="tenNV"
                                                    value="<?php echo $row['ten_nv']?>">
                                            </div>
                                        </div>
                                        
                                          <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label for="image">Ảnh 3 x 4</label>
                                                <input type="file" class="form-control" name="image"
                                                    value="<?php echo $row['image']?>">
                                                
                                            </div>
                                          </div>
                                          <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" name="email"
                                                    value="<?php echo $row['email']?>">
                                            </div>
                                          </div>
                                          <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label for="sdt">Số điện thoại</label>
                                                <input type="number" class="form-control" name="sdt"
                                                    value="<?php echo $row['sdt']?>">
                                            </div>
                                          </div>
                                          <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label for="diaChi">Địa chỉ</label>
                                                <input type="text" class="form-control" name="diaChi"
                                                    value="<?php echo $row['dia_chi']?>">
                                            </div>
                                          </div>
                                          <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label for="ngaySinh">Ngày sinh</label>
                                                <input type="date" class="form-control" name="ngaySinh"
                                                    value="<?php echo $row['ngay_sinh']?>">
                                            </div>
                                          </div>
                                          <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label for="cccd">CCCD</label>
                                                <input type="number" class="form-control" name="cccd"
                                                    value="<?php echo $row['cccd']?>">
                                            </div>
                                          </div>
                                          <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label class="control-label">Giới tính</label>
                                                <select value="<?php echo $row['gioi_tinh']?>" name="gioiTinh" class="form-control" id="exampleSelect2" required>
                                                  <option>-- Chọn giới tính --</option>
                                                  <option>Nam</option>
                                                  <option>Nữ</option>
                                                </select>
                                            </div>
                                          </div>
                                          <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label for="exampleSelect1" class="control-label">Chức vụ</label>
                                                <select value="<?php echo $row['chuc_vu']?>" name="chucVu" class="form-control" id="exampleSelect1">
                                                  <option>-- Chọn chức vụ --</option>
                                                  <option>Bán hàng</option>
                                                  <option>Tư vấn</option>
                                                  <option>Dịch vụ</option>
                                                  <option>Thu Ngân</option>
                                                  <option>Quản kho</option>
                                                  <option>Kiểm hàng</option>
                                                  <option>Bảo vệ</option>
                                                  <option>Tạp vụ</option>
                                                </select>
                                            </div>
                                          </div>
                                    </div>
                                    <div class="block">
                                        <button type="submit" class="btn btn-primary btn-save">Lưu thông tin</button>
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
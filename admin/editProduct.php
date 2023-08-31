<?php
    $id=$_GET['sid'];

    require_once 'connect.php';

    $edit_sql="SELECT * FROM product where id=$id";

    $result=mysqli_query($conn,$edit_sql);

    $row= mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="./css/addStaff.css">
    <link rel="stylesheet" href="./css/addProduct.css">
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
        <header class="header header_admin">
            <div class="grid wide">
                <div class="content_header">

                    <div class="header__logo header__logo-admin hide-on-tablet">
                        <div href="#" class="header__logo-link">
                            <i class="fas fa-heading header_logo-link--icon"></i>
                            _Ngọc Hà
                        </div>                                                        
                    </div>
                    <div class="log-out">
                        <a class="log-out-link" href="#">
                            <i class="fas fa-door-open"></i>
                            <p class="out">Đăng xuất</p>
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <div class="admin_container">
            <div class="grid wide">
                <div class="row">
                    
                    <div class="col l-3 m-3 c-3">
                        <div class="admin_manager">

                            <div class="admin_account">
                                <div class="admin_account-img">
                                    <img class="img-admin" src="../image/chocon.jpg">
                                </div>
                                <div class="admin_account-info">
                                    <h4 class="account-name">Hà Nguyễn</h4>
                                </div>
                            </div>
                            <div class="line"></div>
                            <div class="row sm-gutter admin_control">
                                <ul class="list_contol">
                                    <li class="list_contol-item">
                                        <a class="list_contol-item--link" href="#">Quản lý nhân viên</a>
                                    </li>
                                    <li class="list_contol-item">
                                        <a class="list_contol-item--link" href="#">Quản lý khách hàng</a>
                                    </li>
                                    <li class="list_contol-item">
                                        <a class="list_contol-item--link" href="#">Quản lý tài khoản</a>
                                    </li>
                                    <li class="list_contol-item">
                                        <a class="list_contol-item--link" href="#">Quản lý danh mục</a>
                                    </li>

                                    <li class="list_contol-item">
                                        <a class="list_contol-item--link" href="#">Quản lý sản phẩm</a>
                                    </li>
                                    <li class="list_contol-item">
                                        <a class="list_contol-item--link" href="#">Quản lý đơn hàng</a>
                                    </li>
                                    <li class="list_contol-item">
                                        <a class="list_contol-item--link" href="#">Quản lý doanh thu</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>  
                
                    <div class="col l-9 m-9 c-9">
                        <div class="add_staff">

                            <div class="add-header">
                                <h3>Sửa sản phẩm</h3>
                            </div>
                            <div class="add-content">
                                <form action="./updateProduct.php" method="post" enctype="multipart/form-data">
                                    <div class="block row">
                                        <input type="hidden" id="" name="sid" value="<?php echo $id?>">
                                        <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label for="maSP">Mã sản phẩm</label>
                                                <input type="text" class="form-control" name="maSP"
                                                    value="<?php echo $row['ma_sp']?>">
                                            </div>
                                        </div>
                                        <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label for="tenSP">Tên sản phẩm</label>
                                                <input type="text" class="form-control" name="tenSP"
                                                    value="<?php echo $row['ten_sp']?>">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label for="mota">Mô tả</label>
                                                <input type="text" class="form-control" name="moTa"
                                                value="<?php echo $row['mota']?>">
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

                                                <label for="sale">Sale</label>
                                                <input type="number" class="form-control" name="sale"
                                                value="<?php echo $row['sale']?>">
                                            </div>
                                          </div>
                                          <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label for="giaGoc">Gía gốc</label>
                                                <input type="number" class="form-control" name="giaGoc"
                                                value="<?php echo $row['gia_goc']?>">
                                            </div>
                                          </div>
                                          <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label for="giaMoi">Giá mới</label>
                                                <input type="number" class="form-control" name="giaMoi"
                                                value="<?php echo $row['gia_moi']?>">
                                            </div>
                                          </div>
                                          <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label for="tinhTrang">Tình trạng</label>
                                                <select class="form-control" name="tinhTrang"
                                                value="<?php echo $row['tinh_trang']?>">
                                                    <option>-- Chọn tình trạng --</option>
                                                    <option>Còn hàng</option>
                                                    <option>Hết hàng</option>
                                                    
                                                </select>
                                            </div>
                                          </div>
                                          <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label for="soLuong">Số lượng</label>
                                                <input type="number" class="form-control" name="soLuong"
                                                value="<?php echo $row['so_luong']?>">
                                            </div>
                                          </div>
                                          <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label class="control-label">Danh mục</label>
                                                <select name="danhMuc"class="form-control" id="exampleSelect2" required
                                                value="<?php echo $row['ten_dm']?>">
                                                  <option>-- Chọn danh mục --</option>
                                                  <option>Nam</option>
                                                  <option>Nữ</option>
                                                  <option>Trẻ em</option>
                                                </select>
                                            </div>
                                          </div>
                                          
                                    </div>
                                    <div class="block">
                                        <button type="submit" class="btn btn-primary btn-save">Lưu thông tin</button>
                                        <a class="btn btn-cancel" href="#">Hủy bỏ</a>
                                    </div>
                                  </form>
                            </div>
                        </div>
                    </div>  
                </div>
            </div> 
        </div> 


    </div>
</body>
</html>
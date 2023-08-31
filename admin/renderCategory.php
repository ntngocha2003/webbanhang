<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý danh mục</title>
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="./css/addStaff.css">
    <link rel="stylesheet" href="./css/renderStaff.css">
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
                        <a class="log-out-link" href="../home.html">
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
                                        <a class="list_contol-item--link" href="./renderStaff.php">Quản lý nhân viên</a>
                                    </li>
                                    <li class="list_contol-item">
                                        <a class="list_contol-item--link" href="./renderClient.php">Quản lý khách hàng</a>
                                    </li>
                                    <li class="list_contol-item">
                                        <a class="list_contol-item--link" href="./renderAccount.php">Quản lý tài khoản</a>
                                    </li>
                                    <li class="list_contol-item">
                                        <a class="list_contol-item--link" href="#">Quản lý danh mục</a>
                                    </li>
                                    <li class="list_contol-item">
                                        <a class="list_contol-item--link" href="./renderProduct.php">Quản lý sản phẩm</a>
                                    </li>
                                    <li class="list_contol-item">
                                        <a class="list_contol-item--link" href="./renderOrder.php">Quản lý đơn hàng</a>
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

                            <div class="container">
                                <div class="container_title">
                                    <h2 class="container_heading">Danh sách danh mục</h2>
                                </div>
                                <div class="control_link">

                                    <a class="control_link-item" href="./addCategory.html">+ Thêm mới danh mục</a>
                                    <a class="control_link-item" href="#">
                                        <i class="fas fa-file-import"></i>
                                            Nhập file
                                    </a>
                                    <a class="control_link-item" href="#">
                                        <i class="fas fa-download"></i>
                                            Xuất file
                                    </a>
                                    <a class="control_link-item" href="#">
                                        <i class="ti-trash" style="font-weight: 900;"></i>
                                            Xóa hết
                                    </a>
                                    <a class="control_link-item" href="#" style="margin-right: 0;">
                                        <i class="ti-search"style="font-weight: 900;"></i>
                                            Tìm kiếm
                                            <input type="text" class="control_link-item--input" name="input">
                                    </a>
                                </div>
                                    <table class="table table-borderless">
                                        <thead class="table-borderless-thead">
                                        <tr>
                                            <th class="table-borderless-th" >Check</th>
                                            <th class="table-borderless-th" >Mã danh mục</th>
                                            <th class="table-borderless-th" >Tên danh mục</th>
                                            <th class="table-borderless-th" >Thao tác</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                    
                                        <?php
                                            require_once 'connect.php';
                    
                                            $render_sql= "SELECT * FROM `category` ";
                                            $result=mysqli_query($conn,$render_sql);
                                            while($r=mysqli_fetch_assoc($result)){
                                                ?>
                                                <tr class="table-borderless-tr">
                                                    <td class="table-borderless-td">
                                                        <input type="checkbox" name="checkbox">
                                                    </td>
                                                    <td class="table-borderless-td">
                                                        <?php echo $r['ma_dm'];?>
                                                    </td>
                                                    <td class="table-borderless-td">
                                                        <?php echo $r['ten_dm'];?>
                                                    </td>
                                                    <td class="table-borderless-td" style="display:flex;justify-content: space-around;">
                                                        <a href="editCategory.php?sid=<?php echo $r['id'];?>" class="btn-info">Sửa</a>
                                                        <a onclick="return confirm('bạn có muốn xóa danh mục này không')"
                                                            href="removeCategory.php?sid=<?php echo $r['id'];?>" class="btn-danger">Xóa
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php    
                                            }
                                        ?>
                    
                                        </tbody>
                                    </table>    
                            </div>
                           
                        </div>
                    </div>  
                </div>
            </div> 
        </div> 


    </div>
</body>
</html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý tài khoản</title>
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="./css/addStaff.css">
    <link rel="stylesheet" href="./css/renderStaff.css">
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
        <header class="header header_admin">
            <div class="grid wide">
                <div class="content_header">

                    <div class="header__logo header__logo-admin hide-on-tablet">
                        <div href="#" class="header__logo-link">
                            <i class="fas fa-heading header_logo-link--icon"></i>
                            _Ngọc Hà
                        </div>                                                        
                    </div>
                    <div class="header_bar">
                        <i class="fas fa-bars header_bar-icon"></i>
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
                    
                    <div class="colum-1 col l-3 m-0 c-0">
                        <div class="admin_manager">

                            <div class="admin_account">
                                <div class="admin_close">
                                    <i class="ti-close admin_close-icon"></i>
                                </div>
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
                                        <a class="list_contol-item--link" href="#">Quản lý tài khoản</a>
                                    </li>
                                    <li class="list_contol-item">
                                        <a class="list_contol-item--link" href="./renderCategory.php">Quản lý danh mục</a>
                                    </li>
                                    <li class="list_contol-item">
                                        <a class="list_contol-item--link" href="./renderProduct.php">Quản lý sản phẩm</a>
                                    </li>
                                    <li class="list_contol-item">
                                        <a class="list_contol-item--link" href="./renderOrder.php">Quản lý đơn hàng</a>
                                    </li>
                                    <li class="list_contol-item">
                                        <a class="list_contol-item--link" href="./renderRevenue.php">Quản lý doanh thu</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>  
                
                    <div class="col l-9 m-12 c-12">
                        <div class="add_staff">

                            <div class="container">
                                <div class="container_title">
                                    <h2 class="container_heading">Danh sách tài khoản</h2>
                                </div>
                                <div class="control_link">

                                    <a class="control_link-item" href="./addAccount.html">+ Thêm mới tài khoản</a>
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
                                    <div class="control_link-item" >
                                        <form action="renderAccount.php" method="GET"style="margin: 0;">
                                            <!-- <i class="ti-search"style="font-weight: 900;"></i> -->
                                            <input type="submit" name="btnSearch" value="Search" 
                                            style="font-weight: bold;
                                                font-size: 1.4rem;
                                                color: var(--primary-color);
                                                border: 0;
                                                background-color: #fff;">
                                            <input type="text" name="search"class="control_link-item--input">
                                        </form>
                                            
                                    </div>
                                    <a class="control_link-item" href="renderAccount.php">
                                    
                                        <i class="fas fa-reply" style="font-weight: 900;"></i>
                                            Trở lại
                                    </a>
                                </div>

                                <?php
                        
                                    if(isset($_REQUEST['btnSearch'])){
                                        $search = addslashes($_GET['search']);
                                        if($search==""){
                                            echo "<p style='color:red';>Bạn chưa nhập từ khóa!!!</p>";
                                            
                                        }
                                        else{
                                            require_once 'connect.php';
                                            $query = "select * from account where ten_dn like '%$search%'";
                                            $sql = mysqli_query($conn,$query);
                                            $num = mysqli_num_rows($sql);

                                            if($num<=0){
                                                echo "<p style='color:red;'>Không có ket qua tra ve voi tu khoa <b>$search</b></p>";
                                            }
                                            
                                            else if ($num > 0 && $search != "")
                                            {
                                                // Dùng $num để đếm số dòng trả về.
                                                echo "<p style='color:var(--primary-color);'>$num ket qua tra ve voi tu khoa <b>$search</b></p>";
                                                ?>
                                                <table class="table table-borderless">
                                                    <thead>
                                                    <tr>
                                                        <th class="table-borderless-th" >Check</th>
                                                        <th class="table-borderless-th" >Email</th>
                                                        <th class="table-borderless-th" >Tên đăng nhập</th>
                                                        <th class="table-borderless-th" >Mật khẩu</th>
                                                        <th class="table-borderless-th" >Quyền</th>
                                                        <th class="table-borderless-th" >Thao tác</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php
                                                            require_once 'connect.php';

                                                            $query = "select * from account where ten_dn like '%$search%'";
                                                            $sql = mysqli_query($conn,$query);
                                                            while($r=mysqli_fetch_assoc($sql)){
                                                                ?>
                                                                <tr>
                                                                    <td class="table-borderless-td">
                                                                    <input type="checkbox" name="checkbox">
                                                                    </td>
                                                                    <td class="table-borderless-td">
                                                                        <?php echo $r['email'];?>
                                                                    </td>
                                                                    <td class="table-borderless-td">
                                                                        <?php echo $r['ten_dn'];?>
                                                                    </td>
                                                                    <td class="table-borderless-td">
                                                                        <?php echo $r['mat_khau'];?>
                                                                    </td>
                                                                    <td class="table-borderless-td">
                                                                        <?php echo $r['quen'];?>
                                                                    </td>
                                                                    <td class="table-borderless-td" style="display:flex;justify-content: space-around;">
                                                                        <a href="editAccount.php?sid=<?php echo $r['id'];?>" class="btn-info">Sửa</a>
                                                                        <a onclick="return confirm('bạn có muốn xóa tài khoản này không')"
                                                                            href="removeAccount.php?sid=<?php echo $r['id'];?>" class="btn-danger">Xóa
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            <?php    
                                                            }
                                                        ?>

                                                    </tbody>
                                                </table> 

                                                <?php           
                                                            
                                            }           
                                        }
                                    }
                                    else{
                                        require_once 'contentAccount.php';
                                    }
                        
                                ?>    
                                
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
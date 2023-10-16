<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ngọc Hà_shop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../gird/GirdSystem/gird.css">
    <link rel="stylesheet" href="../css/reponsive.css">
    <link rel="stylesheet" href="../css/cart.css">
    <link rel="stylesheet" href="../css/bill.css">
    <link rel="stylesheet" href="../css/product.css">
    <link rel="stylesheet" href="../css/acc.css">
    <link rel="stylesheet" href="../admin/css/addStaff.css">
    <link rel="stylesheet" href="..admin//css/renderStaff.css">
    <link rel="stylesheet" href="../font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../css/login_register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400, 500, 700display=swapsubset=vietnamese" rel="stylesheet">
</head>
<body>
    <div class="app">

    <?php
    session_start();
    ob_start();
    require_once '../admin/connect.php';
        if(isset($_SESSION['nameStaff'])){
            $row_nv=$_SESSION['nameStaff'];
            
            $render_sql= "SELECT * FROM `account`where ten_dn='$row_nv'";
            $result_nv=mysqli_query($conn,$render_sql);
            $r_nv=mysqli_fetch_assoc($result_nv);
        }

    ?>

    <?php
        require 'headerStaff.php';
    ?>

    <!-- phần nội dung -->
    
        <div class="app__container"style="margin-top: 160px;">
            <div class="grid wide">
                <div class="row sm-gutter">
                    <div class="col l-12 m-12 c-12">

                        <div class="home-product">
                                    <h1 class="info-user">Thông tin tài khoản</h1>
                                        
                                    <form method="POST" action="updateAccountStaff.php" class="contact-content" enctype="multipart/form-data">
                                        
                                            <div class="row sm-gutter product-item product-block">
                                                <div class="col l-5 m-5 c-5" style="border-right: 1px solid var(--primary-color);
                                                                                    margin-left:20px">
                                                    <div class="product-img">
                                                            <h2 class="title-user">Thông tin cá nhân</h2>
                                                            <input type="hidden" id="" name="id" value="<?php echo $r_nv['id']?>"/>
                                                            <div class="block row">
                                                                <div class="user_account-img col l-3 c-3 m-3">
                                                                    <img class="img-admin" src="../admin/image/<?php echo $r_nv['image'] ?>"style="width: 80px;height: 80px;border-radius: 50%;">
                                                                   
                                                                </div>
                                                                <div class="fullname col l-9 c-9 m-9" style="display: flex;align-items: center;">
                                                                    <lable class="text-inner">Họ và tên: 
                                                                        <p name="name"class="last-name input"style="width: 100%; color: #bbb;font-size:1.4rem">
                                                                            <?php echo $r_nv['ten_dn'] ?>
                                                                        </p>
                                                                    </lable>
                                                                    
                                                                </div>
                                                            </div>
                                            
                                                            <div class="form-check-inline">
                                                                <label class="form-check-label"> Ngày sinh: 
                                                                    <p name="date"class="form-check-input">
                                                                        <?php echo $r_nv['ngay_sinh'] ?>
                                                                    </p>
                                                                </label>
                                                            </div>
                                                            <div class="form-check-inline">
                                                                <label class="form-check-label"> Giới tính: 
                                                                <input type="text" name="gender" class="form-check-input" value="<?php echo $r_nv['gioi_tinh'] ?>" style="margin-left: 40px;">
                                                                </label>
                                                            </div>
                                                    </div>
                                                </div>
                                                <div class="col l-4 m-4 c-4"style="margin-right:-40px;
                                                                                    margin-left:20px">
                                                    <h2 class="title-user">Số điện thoại, email</h2>
                                                    <div class="ad-user" style="margin-bottom: 10px;">
                                                        <div>
                                                            <i class="ti-email"></i> 
                                                            <a href="email:<?php echo $r_nv['email'] ?>" style="color: #bbb;"><?php echo $r_nv['email'] ?></a>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="ad-user">
                                                        <div>
                                                            <i class="fas fa-phone-alt icon"></i> 
                                                            <input type="text" name="phone" value="0<?php echo $r_nv['sdt'] ?>" style="color: #bbb;"
                                                            />
                                                        </div>
                                                    </div>

                                                    <h2 class="title-user">Bảo mật</h2>
                                                    <div class="ad-user">
                                                        <div>
                                                            <i class="ti-unlock"></i> 
                                                            <a>Đổi mật khẩu</a>
                                                        </div>
                                                        
                                                    </div>

                                                    <h2 class="title-user">Liên kết mạng xã hội</h2>
                                                    <div class="ad-user">
                                                        <div>
                                                            <i class="ti-facebook"></i> 
                                                            <a>Facebook</a>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <div class="col l-3 m-3 c-3">
                                                    <div class="product-img">
                                                        <h2 class="title-user">Địa chỉ cá nhân</h2>
                                                        <div class="">
                                                            <label for="content"class="text-inner">Địa chỉ: </label><br>
                                                            <textarea id="content" name="address" rows="5" cols="28" 
                                                                style="font-size: 1.4rem; color:#bbb">
                                                                <?php echo $r_nv['dia_chi']?>
                                                            </textarea><br>
                                                                
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="text-align: center;margin-top: 20px;">
                                                <input type="submit" name="save_change-staff" class="btn-save-change" value="Lưu thay đổi"/>    
                                            </div>
                                    </form>

                               

                        </div>
                            
                    </div>
                </div>  
            </div>
        </div>
    </div>

</body>
</html>
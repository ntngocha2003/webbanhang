<?php
    session_start();
    ob_start();
    require_once 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý thông tin cá nhân</title>
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="./css/addStaff.css">
    <link rel="stylesheet" href="./css/renderStaff.css">
    <link rel="stylesheet" href="./css/reponsiver.css">
    <link rel="stylesheet" href="../css/cart.css">
    <link rel="stylesheet" href="../css/bill.css">
    <link rel="stylesheet" href="../css/product.css">
    <link rel="stylesheet" href="../css/acc.css">
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

                            <div class="container">
                                <div class="container_title">
                                    <h2 class="container_heading">Thông tin tài khoản</h2>
                                </div>
                               
                                <div class="app__container" style=" margin: 20px 0;
                                                                    border: 2px solid #89c0f1ab;;
                                                                    border-radius: 6px;
                                                                    background-color: #fff;">
                                    <div class="grid wide">
                                        <div class="row sm-gutter">
                                            <div class="col l-12 m-12 c-12">

                                                <div class="home-product">
                                                            
                                                            <form method="POST" action="updateAccountAdmin.php" class="contact-content" enctype="multipart/form-data">
                                                                
                                                                    <div class="row sm-gutter product-item" style="margin-top: 20px;">
                                                                        <div class="col l-5 m-5 c-5" style="border-right: 1px solid var(--primary-color);
                                                                                                            margin-left:20px">
                                                                            <div class="product-img">
                                                                                    <h2 class="title-user">Thông tin cá nhân</h2>
                                                                                    <input type="hidden" id="" name="id" value="<?php echo $r['id']?>"/>
                                                                                    <div class="block row">
                                                                                        <div class="user_account-img col l-3 c-3 m-3">
                                                                                        <?php
                                                                                            if(strlen($r['image'])==14){
                                                                                                ?>
                                                                                                <img class="img-admin" src="../admin/image/avatar.png"style="
                                                                                                    width: 80px;
                                                                                                    height: 80px;
                                                                                                    border-radius: 50%;
                                                                                                    ">
                                                                                                    <input type="file" class=" auth-form__input"style="width:90%;margin-left: 4px;margin-top: 6px;" name="image"value="<?php echo $r['image']?>">
                                                                                                <?php
                                                                                            }
                                                                                            else{          
                                                                                                ?>
                                                                                                <img class="img-admin" src="../admin/image/<?php echo $r['image'] ?>"style="
                                                                                                width: 80px;
                                                                                                height: 80px;
                                                                                                border-radius: 50%;
                                                                                                ">
                                                                                                <input type="file" class=" auth-form__input"style="width:90%;margin-left: 4px;margin-top: 6px;" name="image"value="<?php echo $r['image']?>">
                                                                                            <?php
                                                                                            }
                                                                                            ?>
                                                                                        
                                                                                        </div>
                                                                                        <div class="fullname col l-9 c-9 m-9" style="display: flex;align-items: center;">
                                                                                            <lable class="text-inner">Họ và tên: 
                                                                                                <p name="name"class="last-name input"style="width: 100%; color: #bbb;font-size:1.4rem">
                                                                                                    <?php echo $r['ten_dn'] ?>
                                                                                                </p>
                                                                                            </lable>
                                                                                            
                                                                                        </div>
                                                                                    </div>
                                                                    
                                                                                    <div class="form-check-inline">
                                                                                        <label class="form-check-label"> Ngày sinh: 
                                                                                            <p name="date"class="form-check-input">
                                                                                                <?php echo $r['ngay_sinh'] ?>
                                                                                            </p>
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="form-check-inline">
                                                                                        <label class="form-check-label"> Giới tính: 
                                                                                        <input type="text" name="gender" class="form-check-input" value="<?php echo $r['gioi_tinh'] ?>" style="margin-left: 40px;">
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
                                                                                    <a href="email:<?php echo $r['email'] ?>" style="color: #bbb;"><?php echo $r['email'] ?></a>
                                                                                </div>
                                                                                
                                                                            </div>
                                                                            <div class="ad-user">
                                                                                <div>
                                                                                    <i class="fas fa-phone-alt icon"></i> 
                                                                                    <input type="text" name="phone" value="0<?php echo $r['sdt'] ?>" style="color: #bbb;"
                                                                                    />
                                                                                </div>
                                                                            </div>

                                                                            <h2 class="title-user">Bảo mật</h2>
                                                                            <div class="ad-user">
                                                                                <div>
                                                                                    <i class="ti-unlock"></i> 
                                                                                    <a href="change-passAdmin.php">Đổi mật khẩu</a>
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
                                                                                    <textarea id="content" name="address" rows="5" cols="20" 
                                                                                        style="font-size: 1.4rem; color:#bbb">
                                                                                        <?php echo $r['dia_chi']?>
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
                           
                        </div>
                    </div>  
                </div>
            </div> 
        </div> 


    </div>
    <script src="./js/main.js"></script>
</body>
</html>

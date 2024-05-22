<?php
    require_once './admin/connect.php';
    session_start();
    ob_start();
    $err=[];
    if(isset($_POST['register'])){
        
        $email=$_POST['email'];
        $sdt=$_POST['sdt'];
        $tenDN=$_POST['name'];
        $MK=$_POST['pass'];
        $rMK=$_POST['rPass'];
        
        $uploadDir_img_logo = "./admin/image/";

        $file_tmp = isset($_FILES['image']['tmp_name']) ? $_FILES['image']['tmp_name'] : ""; 
        $file_name = isset($_FILES['image']['name']) ? $_FILES['image']['name'] : ""; 
        $file_type = isset($_FILES['image']['type']) ? $_FILES['image']['type'] : ""; 
        $file_size = isset($_FILES['image']['size']) ? $_FILES['image']['size'] : ""; 
        $file_error = isset($_FILES['image']['error']) ? $_FILES['image']['error'] : "";

        $dmyhis=date("Y").date("m").date("d").date("H").date("i").date("s");
        
        $image=$dmyhis.$file_name;
        
        $accounts="select customers.email, customers.sdt,account.* 
                    from customers join account on customers.id_acc=account.id";
        $result=mysqli_query($conn,$accounts); 
        $sql = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
        ?>
        <?php

       
        if(!empty($file_name)){
            copy ( $file_tmp, $uploadDir_img_logo.$image);
        }
        
        if(empty($email)){
            $err['email']='Bạn chưa nhập email';
           
        }
        else if(empty($sdt)){
            $err['sdt']='Bạn chưa nhập số điện thoại';
            
        }
        else if(empty($tenDN)){
            $err['name']='Bạn chưa nhập tên';
        }
        else if(empty($MK)){
            $err['pass']='Bạn chưa nhập mật khẩu';
           
        }
        else if($rMK!=$MK){
            $err['rPass']='Mật khẩu không trùng với mật khẩu cũ';
           
        }
            foreach ($sql as $row) {
                if(!empty($email)&& $email==$row['email']){
                    $err['emailcheck']='Email này đã được sử dụng, bạn vui lòng chọn email khác';
                    $email="";
                }
                else if(!empty($sdt) && $sdt==$row['sdt']){
                    $err['sdtcheck']='SĐT này đã được sử dụng, bạn vui lòng chọn SĐT khác';
                    $sdt="";
                }
                else if(!empty($tenDN) && $tenDN==$row['ten_dn']){
                    $err['namecheck']='Tên đăng nhập này đã được sử dụng, bạn vui lòng chọn tên đăng nhập khác khác';
                    $tenDN="";
                }
            }
        
        if(empty($err)){
            $insertAccount = mysqli_query($conn, "INSERT INTO `account` (`id`, `ten_dn`, `mat_khau`,`quen`) 
                                    VALUES (NULL,'$tenDN','$MK','Khách hàng')");
                               
            $accountID = $conn->insert_id;

            $addTK="INSERT INTO `customers`(`id`, `id_acc`,`email`,`sdt`,`image`)
            VALUES (null,'" . $accountID . "','$email','$sdt','$image')" ;

            if(mysqli_query($conn,$addTK)){
               
                header("location: home.php");
            }
            else{
                echo "<h1>Đăng ký thất bại</h1>";
            }
        }
    }
   

            
        

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký với tư cách khách hàng</title>
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./gird/GirdSystem/gird.css">
    <link rel="stylesheet" href="./css/reponsive.css">
    <link rel="stylesheet" href="./css/cart.css">
    <link rel="stylesheet" href="./css/bill.css">
    <link rel="stylesheet" href="./toast/toast.css">
    
    <link rel="stylesheet" href="./css/login_register.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>
    <form action="./registerClient.php" method="post" class="vh-100"enctype="multipart/form-data">
        <div class="container py-5 h-100">
          <div class="row d-flex align-items-center justify-content-center h-100">
            <!-- <div class="col-md-8 col-lg-7 col-xl-6">
              <img src="./image/anhcho.jpg"
                class="img-fluid" alt="Phone image">
            </div> -->
            <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
              
                <div class="auth-form__container">
                    <div class="auth-form__icon auth-form__icon--register">
                        <i class="ti-close icon-close"></i>
                    </div>
                    <div class="auth-form__header">
                        <h3 class="auth-form__heading">Đăng ký</h3>
                    </div>
                    
                    <div class="auth-form__form">
                        <div class="auth-form__group">
                            <input type="email" class="auth-form__input" id="emailRegister" placeholder="Email"name="email"value="<?=!empty($email)?$email:""?>"/>
                        </div>
                        <span class="message messageNumber">
                            <?php
                                echo (isset($err['email'])?($err['email']):'');
                            ?>
                        </span>
                        <span class="message messageNumber">
                            <?php
                                echo (isset($err['emailcheck'])?($err['emailcheck']):'');
                            ?>
                        </span>
                    </div>
                    <div class="auth-form__form">
                        <div class="auth-form__group">
                            <input type="phone" class="auth-form__input" id="phoneRegister" placeholder="Sdt"name="sdt"value="<?=!empty($sdt)?$sdt:""?>"/>
                        </div>
                        <span class="message messageNumber">
                            <?php
                                echo (isset($err['sdt'])?($err['sdt']):'');
                            ?>
                        </span>
                        <span class="message messageNumber">
                            <?php
                                echo (isset($err['sdtcheck'])?($err['sdtcheck']):'');
                            ?>
                        </span>
                    </div>
                    <div class="auth-form__form">
                        <div class="auth-form__group">
                            <input type="text" class="auth-form__input" id="nameRegister" placeholder="Name" name="name"value="<?=!empty($tenDN)?$tenDN:""?>"/>
                        </div>
                        <span class="message messageName">
                            <?php
                                echo (isset($err['name'])?($err['name']):'');
                            ?>
                        </span>
                        <span class="message messageName">
                            <?php
                                echo (isset($err['namecheck'])?($err['namecheck']):'');
                            ?>
                        </span>
                    </div>
                    <div class="auth-form__form">
                        <div class="auth-form__group">
                            <input type="password" class="auth-form__input" id="passwordRegister" placeholder="Mật khẩu"name="pass"value="<?=!empty($MK)?$MK:""?>"/>
                        </div>
                        <span class="message messagePass">
                            <?php
                                echo (isset($err['pass'])?($err['pass']):'');
                            ?>
                        </span>
                    </div>
                    <div class="auth-form__form">
                        <div class="auth-form__group">
                            <input type="password" class="auth-form__input" id="passwordRegisterAgain" placeholder="Nhập lại mật khẩu"name="rPass"value="<?=!empty($rMK)?$rMK:""?>"/>
                        </div>
                        <span class="message messagePassAgain">
                            <?php
                                echo (isset($err['rPass'])?($err['rPass']):'');
                            ?>
                        </span>
                    </div>
                    <div class="auth-form__form">
                        <div class="auth-form__group">
                            <input type="file" class="auth-form__input" id="image" name="image">
                            
                        </div>
                        <span class="message ">
                            <?php
                                echo (isset($err['image'])?($err['image']):'');
                            ?>
                        </span>
                    </div>

                    <div class="auth-form__aside">
                        <p class="auth-form__policy-text">
                            Bằng việc đăng kí ,bạn đã đồng ý với Ngọc Hà_shop về
                            <a href="" class="auth-form__text-link">Điều khoản dịch vụ</a>&
                            <a href="" class="auth-form__text-link">Chính sách bảo mật</a>
                        </p>
                    </div>

                    <div class="auth-form__controls">
                        <a href="./home.php" class="btn auth-form__controls-back btn--normal">TRỞ LẠI</a>
                        <input type="submit" class="btn btn--primary btn-register"name="register" value="Đăng ký"/>
                    </div>

                    <p class="question">
                        Bạn đã có tài khoản?
                        <a class="link-login" href="./loginClient.php">Đăng nhập</a>
                    </p>

                </div>
              
            </div>
          </div>
        </div>
      </form>
</body>
</html>
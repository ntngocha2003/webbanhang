<?php
    require_once 'connect.php';

    if(isset($_POST['login'])){
        $name=$_POST['name'];
        $pass=$_POST['pass'];
        if(isset($name) && isset($pass)){

            $login="select *from account where ten_dn='$name' and mat_khau='$pass' and quen='admin' ";
        
            $test= mysqli_query($conn,$login);
            if(mysqli_num_rows($test)>0){
                header("location: renderOrder.php");
            }else{
                echo '<center class="alert alert-danger">Đăng nhập thất bại</center>';
            }
        }
    }




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập với tư cách admin</title>
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../gird/GirdSystem/gird.css">
    <link rel="stylesheet" href="../css/reponsive.css">
    <link rel="stylesheet" href="../css/cart.css">
    <link rel="stylesheet" href="../css/bill.css">
    <link rel="stylesheet" href="../toast/toast.css">
    
    <link rel="stylesheet" href="../css/login_register.css">
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
       
    <form action="login.php" method="post" class="vh-100">
        <div class="container py-5 h-100">
          <div class="row d-flex align-items-center justify-content-center h-100">
            <div class="col-md-8 col-lg-7 col-xl-6">
              <img src="./image/anhcho.jpg"
                class="img-fluid" alt="Phone image">
            </div>
            <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
              
                <div class="auth-form__container">
                      <div class="auth-form__header">
                          <h3 class="auth-form__heading"style="margin-bottom: 24px;">Đăng nhập</h3>
                      </div>
      
                      <div class="auth-form__form auth-form__form1"style="margin-bottom: 24px;">
                          <div class="auth-form__group">
                              <input type="text" class="auth-form__input" id="nameLogin" placeholder="Name"name="name">
                          </div>
                          <span class="message messageNameLogin"></span>
                      </div>
                      <div class="auth-form__form auth-form__form1"style="margin-bottom: 24px;">
                          <div class="auth-form__group">
                              <input type="password" class="auth-form__input" id="passwordLogin" placeholder="Mật khẩu"name="pass">
                          </div>
                          <span class="message messagePassLogin"></span>
                      </div>
      
                      <div class="auth-form__aside">
                          <div class="auth-form__help" style="width: 350px;">
                              <a href="" class="auth-form__help-link auth-form__help-forgot">Quên mật khẩu</a>
                              <span class="auth-form__help-separate"></span>
                              <a href="" class="auth-form__help-link">Cần trợ giúp?</a>
                          </div>
                      </div>
      
      
                      <div class="auth-form__controls"style="width: 350px;">
                          <a href="loginClient.php" class="btn auth-form__controls-back btn--normal" 
                            style="background-color: #aaa;
                            display: flex;">TRỞ LẠI</a>
                          <input name="login" type="submit" class="btn btn--primary btn-login" value="ĐĂNG NHẬP"/>
                      </div>
        
                </div>

                
             
            </div>
          </div>
        </div>
      </form>
      <!-- <script src="./js/login.js"></script> -->
</body>
</html>
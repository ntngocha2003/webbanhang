<?php
    require_once './connect.php';
    session_start();
    ob_start();
    $err=[];
    if(isset($_POST['register'])){
        $oldPass=$_POST['oldpass'];
        $oldPass1=$_POST['oldpass1'];
        $newPass=$_POST['newpass'];
        if(isset($_SESSION['nameAdmin'])){
            $row=$_SESSION['nameAdmin'];
            $render_sql= "SELECT account.ten_dn, account.mat_khau,account.quen, staffs.* FROM `staffs` join `account` on staffs.id_acc=account.id
            where ten_dn='$row'";
            $result=mysqli_query($conn,$render_sql);
            $r=mysqli_fetch_assoc($result);
          
        }
       if(empty($oldPass)){
            $err['oldpass']='Bạn chưa nhập mật khẩu cũ';
        }
        else if($oldPass!=$r['mat_khau']){
            $err['oldpass1']='Mật khẩu cũ sai';
        }
        else if( $oldPass1!= $oldPass){
            $err['oldpass1']='Mật khẩu không trùng với mật khẩu cũ';
           
        }
        else if(empty($newPass)){
            $err['newpass']='Bạn chưa nhập mật khẩu mới';
        }
        
        if(empty($err)){
            $updateTK=" UPDATE `account` SET `mat_khau`='$newPass' WHERE id='".$r['id_acc']."' ";
            if(mysqli_query($conn, $updateTK)){
                header("location: homeAdmin.php");
            }
            else{
                echo "<h1>Đổi mật khẩu thất bại</h1>";
            }
        }
    }
   

            
        

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi mật khẩu</title>
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
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <form action="./change-passAdmin.php" method="post" class="vh-100"enctype="multipart/form-data">
        <div class="container py-5 h-100">
          <div class="row d-flex align-items-center justify-content-center h-100">
            <div class="col-md-8 col-lg-7 col-xl-6">
              <img src="./image/anhcho.jpg"
                class="img-fluid" alt="Phone image">
            </div>
            <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
              
                <div class="auth-form__container">
                    <div class="auth-form__icon auth-form__icon--register">
                        <i class="ti-close icon-close"></i>
                    </div>
                    <div class="auth-form__header">
                        <h3 class="auth-form__heading">Đổi mật khẩu</h3>
                    </div>
                    
                    <div class="auth-form__form">
                        <div class="auth-form__group">
                            <input type="password" class="auth-form__input" id="oldPassRegister" placeholder="Mật khẩu cũ" name="oldpass"value="<?=!empty($tenDN)?$tenDN:""?>"/>
                        </div>
                        <span class="message messageName">
                            <?php
                                echo (isset($err['oldpass'])?($err['oldpass']):'');
                            ?>
                        </span>
                    </div>
                    <div class="auth-form__form">
                        <div class="auth-form__group">
                            <input type="password" class="auth-form__input" id="oldPasswordRegister1" placeholder="Nhập lại mật khẩu cũ"name="oldpass1"value="<?=!empty($MK)?$MK:""?>"/>
                        </div>
                        <span class="message messagePass">
                            <?php
                                echo (isset($err['oldpass'])?($err['oldpass']):'');
                            ?>
                        </span>
                    </div>
                    <div class="auth-form__form">
                        <div class="auth-form__group">
                            <input type="password" class="auth-form__input" id="newPasswordRegister" placeholder="Nhập mật khẩu mới"name="newpass"value="<?=!empty($rMK)?$rMK:""?>"/>
                        </div>
                        <span class="message messagePassAgain">
                            <?php
                                echo (isset($err['newpass'])?($err['newpass']):'');
                            ?>
                        </span>
                    </div>
                   
                    <div class="auth-form__controls">
                        <a href="./homeAdmin.php" class="btn auth-form__controls-back btn--normal">TRỞ LẠI</a>
                        <input type="submit" class="btn btn--primary btn-register"name="register" value="Đổi mật khẩu"/>
                    </div>
                </div>
              
            </div>
          </div>
        </div>
      </form>
</body>
</html>
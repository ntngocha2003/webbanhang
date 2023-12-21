<?php 
  session_start();
  ob_start();
  require_once './admin/connect.php';
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác minh việc thanh toán</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./toast/toast.css">
    <link rel="stylesheet" href="./gird/GirdSystem/gird.css">
    <link rel="stylesheet" href="./css/reponsive.css">
    <link rel="stylesheet" href="./css/cart.css">
    <link rel="stylesheet" href="./css/bill.css">
    <link rel="stylesheet" href="./css/product.css">
    <link rel="stylesheet" href="./css/acc.css"><link rel="stylesheet" href="./css/login_register.css">
    <link rel="stylesheet" href="./admin/css/addStaff.css">
    <link rel="stylesheet" href="./admin/css/addProduct.css">
    <link rel="stylesheet" href="./font/themify-icons/themify-icons.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400, 500, 700display=swapsubset=vietnamese" rel="stylesheet">
</head>
<body>

    <?php
        if(isset($_SESSION['name'])){
            $row=$_SESSION['name'];
            $render_sql= "SELECT * FROM `account`where ten_dn='$row'";
            $result=mysqli_query($conn,$render_sql);
            $r=mysqli_fetch_assoc($result);
        }
    ?>

    <?php
        require_once './admin/connect.php';
        $id_acc=$r['id'];
        $num = 1;
        $bill="SELECT account.ten_dn, client_order.*
        FROM account
        INNER JOIN client_order ON account.id = client_order.id_account
        WHERE account.id ='$id_acc' and client_order.id in (select max(id) from client_order)";
        $result=mysqli_query($conn,$bill); 
        $sql = mysqli_fetch_all($result, MYSQLI_ASSOC);
        
        
        ?>                
    

    <div class="form-success" style="margin: 90px 300px;
                                    background-color: #eeeeeea8;
                                    width: 500px;
                                    padding: 30px;
                                    /* display:none */
                                ">
        <div class="auth-form__header" style="text-align: center;
                                                font-size: 4.4rem;
                                                color: #008000b8;">
            <i class="fas fa-check-circle"></i>
        </div>
        <div class="auth-form__header"style="text-align: center;">
            <h3 class="auth-form__heading"style="margin-bottom: 24px;">Đặt hàng thành công</h3>
        </div>
        <p style="margin-top: -5px;
                font-weight: 600;
                margin-bottom: 25px;
                color: #aaa;
                font-size: 1.1rem;">Chúng tôi sẽ liên hệ với quý khách để xác nhận đơn hàng trong thời gian sớm nhất</p>
    
        <div class="auth-form__controls">
          <a href="home.php" class="btn btn--primary" 
            style="font-size:1.4rem;
            display: flex;">Quay lại trang chủ</a>
            <?php
            foreach ($sql as $row) {
                        ?>

                            <a href="order_detail-user.php?id=<?=$row['id']?>"class="btn auth-form__controls-back btn--normal" style="margin-left: 136px;background-color: #fff;
                                                                                            font-size: 1.4rem;
                                                                                            display: flex;
                                                                                            color: var(--primary-color);">Xem chi tiết đơn hàng</a>`
                        <?php
            }
            ?>
        </div>
    
    </div>
</body>
<html>                   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ngọc Hà_shop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./gird/GirdSystem/gird.css">
    <link rel="stylesheet" href="./css/reponsive.css">
    <link rel="stylesheet" href="./css/cart.css">
    <link rel="stylesheet" href="./css/bill.css">

    <link rel="stylesheet" href="./home.html">

    <link rel="stylesheet" href="./css/login_register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400, 500, 700display=swapsubset=vietnamese" rel="stylesheet">
</head>
<body>

    <div class="app">
        <!-- phần đầu -->
        
        <?php
            require_once 'header.php';
        ?>

        <!-- phần nội dung -->
        <div class="app__container app_cart">
            <div class="grid wide">
                <!-- form thông tin -->
                <div class=" modal__information">
                    <div class="modal__bodyinfo modal__container--information">
                        <section class="contact-form">
                            <h2 class="text-heading">Thông tin người mua</h2>
                            <form method="" action="" class="contact-content">
                                <div class="block">
                                    <p class="text-inner">Họ và tên<span class="asterisk">*</span></p>
                                    <div class="fullname">

                                        <input type="text" name="name" placeholder=" Họ" value="" class="last-name input"> 
                                        <input type="text" name="name" placeholder=" Tên" value="" class="name input">
                                    </div>
                                </div>
                                <div class="block">
                                    <p class="text-inner">Email<span class="asterisk">*</span></p>
                                    <input type="email" name="eamil" placeholder=" Email" value="" class="email input">
                                </div>
                                <div class="block">
                                    <p class="text-inner">Số điện thoại<span class="asterisk">*</span></p>
                                    <input type="number" name="phone" placeholder=" Số điện thoại" class="phone-number input"></input>
                                </div>
                                
                                <div class="block">
                                    <p class="text-inner">Địa chỉ chi tiết<span class="asterisk">*</span></p>
                                    <input type="text" name="address" placeholder=" Số nhà..." class="address input"></input>
                                </div>

                                <div class="block">
                                    <p class="text-inner">Lời nhắn<span class="asterisk">*</span></p>
                                    <textarea class="message-information input"></textarea>
                                </div>

                                <div class="contact-footer">
                                    <button class="btn-cancel"type="submit">Hủy</button>
                                    <a  href="./bill.html"class="btn-confirm"type="submit">Xác nhận</a>
                                </div>
                            </form>
                        </section>

                    </div>
                </div>                                     
            </div> 
        </div> 
        
    <!-- phần cuối -->
        <?php
            require_once 'footer.php';
        ?>
    </div>
    
<!-- <script src="./js/localStorange.js"></script> -->
<script src="./js/cart.js"></script>

</body>

</html>
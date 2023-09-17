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
    <link rel="stylesheet" href="./font/themify-icons/themify-icons.css">

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
        <div class="app__container app_bill">
            <div class="grid wide">

                <div class="app_heading">
                    <h2> Chi tiết đơn hàng</h2>
                </div>

                <div class="row sm-gutter">
                    

                    <div class="col l-12 m-12 c-12">

                        <div class="info">
                            <div class="row sm-gutter ">
                                <div class="col l-4 m-4 c-4">
                                    <h3 class="info-heading">Địa chỉ người nhận</h3>
                                    <div class="address-user">
                                        <p><?php echo $r['ten_dn']?></p>
                                        <p><?php echo $r['dia_chi']?></p>
                                        <p><?php echo $r['sdt']?></p>
                                    </div>
                                </div>

                                <div class="col l-4 m-4 c-4">
                                    <h3 class="info-heading">Hình thức giao hàng</h3>
                                    <div class="address-user">
                                        <p>Giao hàng tiết kiệm, được giao bởi NgọcHà_Shop</p>
                                        <p>Hàng được giao nhanh trong vòng 3 - 4 ngày</p>
                                        <p>Phí vận chuyển: 0đ</p>
                                    </div>
                                </div>

                                <div class="col l-4 m-4 c-4">
                                    <h3 class="info-heading">Hình thức thanh toán</h3>
                                    <div class="address-user">
                                        
                                        <p>Thanh toán tiền mặt khi nhận hàng</p>
                                        
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>  
                </div>
                <div>
                    <table style="margin-top: 20px;">
                        <thead>
                            <tr>
                                <th class="col-name">Chi tiết</th>
                                <th class="col-name">Khách hàng</th>
                                <th class="col-name">Ngày đặt</th>
                                <th class="col-name">Số lượng sản phẩm</th>
                                <th class="col-name">Tổng tiền</th>
                                <th class="col-name">Hủy bỏ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="item-row">
                                <td class="code">
                                        <a href=""class="code-link">Details</a>
                                    
                                </td>
                                <td class="customer-name">
                                    
                                        <p><?php echo $r['ten_dn']?></p>
                                    
                                </td>
                                <td class="date">
                                    11/08/2023
                                </td>
                                
                                <td class="total-quantity">
                                    1
                                </td>

                                <td class="total-prices">
                                    117.000đ
                                </td>
                                <td class="return">
                                    <button class="btn-return">

                                        <i class="ti-reload "></i>
                                    </button>
                                </td>


                            </tr>
                        </tbody>
                    </table>
            
                   
                    <div class="btn-action btn-action1">

                        <a href="./home.php" class="btn-back">
                            <i class="fas fa-arrow-left"></i>
                            <span>Back to Shopping</span>
                        </a>
                        
                    </div>
                </div>             
            </div> 
        </div> 
        
    <!-- phần cuối -->
        <?php
            require_once 'footer.php';
        ?>
    </div>


<script src="./js/localStorange.js"></script>
<script src="./js/bill.js"></script>

</body>

</html>
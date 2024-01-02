<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Chi tiết đơn hàng</title>
        <link rel="stylesheet" href="../css/home.css">
        <link rel="stylesheet" href="../css/bill.css">
        <link rel="stylesheet" href="../css/base.css">
        <link rel="stylesheet" href="./css/addStaff.css">
        <link rel="stylesheet" href="./css/renderStaff.css">
        <link rel="stylesheet" href="./css/reponsiver.css">

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
        <!-- <?php
                require 'header_admin.php';
                
            ?> 

        <div class="admin_container">
            <div class="grid wide">
                <div class="row">
                    
                    <?php
                        require 'admin_category.php';
                   ?>
                    
                    <div class="col l-9 m-12 c-12">
                        <div class="add_staff"> -->

                            <!-- <div class="container">
                                <div class="container_title">
                                    <h2 class="container_heading">Chi tiết đơn hàng</h2>
                                </div> -->
                                
                                <?php
        
                                require_once 'connect.php';
                                $order="SELECT account.ten_dn,customers.image,customers.dia_chi,customers.sdt, orders.*
                                FROM customers
                                inner join account on account.id=customers.id_acc
                                INNER JOIN orders ON customers.id = orders.id_client   
                                where orders.id =". $_GET['id'];                            
                                $result=mysqli_query($conn,$order); 
                                $sql = mysqli_fetch_all($result, MYSQLI_ASSOC);

                                $bill_detail="SELECT  orders.*, order_detail.*, product.mota,product.image, product.ten_sp,payment.trang_thai
                                FROM orders
                                INNER JOIN order_detail ON orders.id = order_detail.id_order
                                INNER JOIN product ON product.id = order_detail.id_product
                                INNER JOIN payment ON orders.id = payment.id_order
                                WHERE orders.id =". $_GET['id'];
                                $result=mysqli_query($conn,$bill_detail);
                        
                                $sql_detail = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                
                                ?>
                                <div id="order-detail-wrapper" style=" width: 500px; margin-top: 80px;">
                                    <div id="order-detail">
                                        <h1 class="detail_user">Chi tiết đơn hàng</h1>
                                        <label class="detail_user-item">Người nhận: </label>
                                        <span class="item-name"> <?= $sql[0]['ten_dn'] ?></span>
                                        <br/>
                                        <label class="detail_user-item">Điện thoại: </label>
                                        <span class="item-name"> 0<?= $sql[0]['sdt'] ?></span>
                                        <br/>
                                        <label class="detail_user-item">Địa chỉ: </label>
                                        <span class="item-name"> <?= $sql[0]['dia_chi'] ?></span>
                                        <br/>
                                        <hr/>
                                        <h3 class="detail_product">Danh sách sản phẩm</h3>
                                        <ul>
                                            <?php
                                            $totalQuantity = 0;
                                            $totalMoney = 0;
                                            foreach ($sql_detail as $row) {
                                                ?>
                                                <li>
                                                    <label class="detail_user-item">Tên sản phẩm: </label>
                                                    <span class="item-name"><?= $row['ten_sp'] ?></span>
                                                    <br/>
                                                    <label class="detail_user-item">Mô tả: </label>
                                                    <span class="item-name"><?= $row['mota'] ?></span>
                                                    <br/>
                                                    <label class="detail_user-item">Số lượng: </label>
                                                    <span class="item-name"><?= $row['so_luong'] ?> sản phẩm</span>
                                                </li>
                                                <?php
                                                $totalMoney += ($row['gia_tien'] * $row['so_luong']);
                                                $totalQuantity += $row['so_luong'];
                                            }
                                            ?>
                                        </ul>
                                        <hr/>
                                        <label class="detail_user-item">Tổng SL:</label> 
                                        <span class="item-name"><?= $totalQuantity ?></span>
                                        <br/>
                                        <label class="detail_user-item">Tổng tiền:</label> 
                                        <span class="item-name"><?= number_format($totalMoney, 0, ",", ".") ?> đ</span>
                                        <br/>
                                        <label class="detail_user-item">Trạng thái thanh toán: </label>
                                        <span class="item-name"><?= $row['trang_thai'] ?></span>
                                        
                                    </div>
                                </div>
                                
                            <!-- </div> -->
                           
                        <!-- </div>
                    </div>  
                </div>
            </div>  -->
        </div> 


    </div>
    <script src="./js/main.js"></script>
    
    </body>
</html>
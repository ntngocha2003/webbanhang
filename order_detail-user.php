<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Chi tiết đơn hàng</title>
        <link rel="stylesheet" href="./css/home.css">
        <link rel="stylesheet" href="./css/base.css">
        <link rel="stylesheet" href="./gird/GirdSystem/gird.css">
        <link rel="stylesheet" href="./css/reponsive.css">
        <link rel="stylesheet" href="./css/cart.css">
        <link rel="stylesheet" href="./css/bill.css">
        <link rel="stylesheet" href="./admin/css/renderStaff.css">
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

                
                <div>
                <?php
        
                    require_once './admin/connect.php';
                    
                    
                    $bill_detail="SELECT  client_order.*, orders.*, product.mota,product.image, product.ten_sp
                    FROM client_order
                    INNER JOIN orders ON client_order.id = orders.id_client
                    INNER JOIN product ON product.id = orders.id_product
                    WHERE client_order.id =". $_GET['id'];
                    $result=mysqli_query($conn,$bill_detail);

                    // $sql= mysqli_fetch_assoc($result);  
                    $sql_detail = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    
                    ?>
                    <div id="order-detail-wrapper">
                        <div id="order-detail">
                            <h1 class="detail_user">Chi tiết đơn hàng</h1>
                            <label class="detail_user-item">Người nhận: </label>
                            <span class="item-name"> <?= $r['ten_dn'] ?></span>
                            <br/>
                            <label class="detail_user-item">Điện thoại: </label>
                            <span class="item-name"> <?= $r['sdt'] ?></span>
                            <br/>
                            <label class="detail_user-item">Địa chỉ: </label>
                            <span class="item-name"> <?= $r['dia_chi'] ?></span>
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
                            <label class="detail_user-item">Ghi chú: </label>
                            <span class="item-name"><?= $sql_detail[0]['ghi_chu'] ?></span>
                            
                        </div>
                    </div>
                   
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
    
    </body>
</html>
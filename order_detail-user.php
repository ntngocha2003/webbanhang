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

                <!-- <div class="app_heading">
                    <h2> Chi tiết đơn hàng</h2>
                </div> -->

                
                <div>
                    <?php
            
                        require_once './admin/connect.php';
                        
                        
                        $bill_detail="SELECT  orders.*, order_detail.*, product.mota,product.image, product.ten_sp,payment.phuong_thuc
                        FROM orders
                        INNER JOIN order_detail ON orders.id = order_detail.id_order
                        INNER JOIN product ON product.id = order_detail.id_product
                        INNER JOIN payment ON orders.id = payment.id_order
                        WHERE orders.id =". $_GET['id'];
                        $result=mysqli_query($conn,$bill_detail);

                        $sql_detail = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        
                        ?>
                    
                   
                    <div class="app__container app_bill">
                        <div class="grid wide">

                            <div class="app_heading">
                                <h2>Chi tiết đơn hàng</h2>
                            </div>

                            <div class="" style="background-color: #fff;margin-top: 10px;padding: 14px 0 4px 6px;display: flex;">
                            <?php
                                if($sql_detail[0]['tinh_trang']=='Đang chờ hàng'){
                                    ?>
                                        <div class="status-bill">
                                            <i class="fas fa-hourglass-start"></i>
                                            <p class="status">Đang chờ lấy hàng</p>
                                            
                                        </div>
                                    <?php
                                }

                                else if($sql_detail[0]['tinh_trang']=='Đang giao hàng'){
                                    ?>
                                        <div class="status-bill">
                                            <i class="fas fa-caravan"></i>
                                            <p class="status">Đang vận chuyển</p>
                                        </div>
                                    
                                    <?php
                                }
                                else if($sql_detail[0]['tinh_trang']=='Đã giao hàng'){
                                    ?>
                                    <div class="status-bill"style="color:rgb(89, 162, 56);">
                                        <i class="fas fa-caravan"></i>
                                        <p class="status">Giao hàng thành công</p>
                                    </div>
                                
                                <?php
                                }
                                else if($sql_detail[0]['tinh_trang']=='Đã hủy'){
                                    ?>
                                    <div class="status-bill"style="color:red">
                                        <i class="fas fa-ban"></i>
                                        <p class="status">Đã hủy</p>
                                    </div>
                                    
                                    <?php
                                }
                                ?>
                            </div>

                            <div class="row sm-gutter">
                                

                                <div class="col l-12 m-12 c-12">

                                    <div class="info">
                                        <div class="row sm-gutter ">
                                            <div class="col l-4 m-4 c-4">
                                                <h3 class="info-heading">Địa chỉ người nhận</h3>
                                                <div class="address-user">
                                                    <p>Tên: <?php echo $r['ten_dn']?></p>
                                                    <p>Địa chỉ: <?php echo $r['dia_chi']?></p>
                                                    <p>SĐT: 0<?php echo $r['sdt']?></p>
                                                </div>
                                            </div>

                                            <div class="col l-4 m-4 c-4">
                                                <h3 class="info-heading">Hình thức giao hàng</h3>
                                                <div class="address-user">
                                                    <p>Giao hàng tiết kiệm, được giao bởi NgọcHà_Shop</p>
                                                    <p>Hàng được giao nhanh trong vòng 3 - 4 ngày</p>
                                                    <p style="color:var(--primary-color)">Dự kiến giao vào ngày 
                                                    <?php
                                                    foreach ($sql_detail as $row) {

                                                    }
                                                    $n=date('d/m/Y', $row['created_time']);
                                                    $ngaygiao = DateTime::createFromFormat('d/m/yy', $n);
                                                    $ngaygiao->add(new DateInterval('P3D'));

                                                    echo $ngaygiao->format('d/m/Y'); 
                                                                            
                                                    ?>
                                                    </p><p>Phí vận chuyển: 0đ</p>
                                                </div>
                                            </div>

                                            <div class="col l-4 m-4 c-4">
                                                <h3 class="info-heading">Hình thức thanh toán</h3>
                                                <div class="address-user">
                                                <?php
                                                    foreach ($sql_detail as $row) {?>
                                                    <?php  
                                                    }
                                                    
                                                    ?>
                                                    <p><?php echo $row['phuong_thuc']?></p>
                                                    
                                                    
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>  
                            </div>
                            <div style="margin-top: 30px;
                            background-color: #fff;">
                                <table class="tableListProduct">
                                        <thead>
                                            <tr>
                                                <th class="col-name">
                                                    STT
                                                </th>
                                                <th class="col-name" style="text-align: left;">
                                                    Thông tin sản phẩm
                                                </th>
                                                <th class="col-name">
                                                    Số lượng
                                                </th>
                                                <th class="col-name">
                                                    Đơn giá
                                                </th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody class="list-items">
                                            <?php
                                               $totalQuantity = 0;
                                               $totalMoney = 0;
                                               $num=1;
                                                foreach ($sql_detail as $row) {
                                                
                                                    ?>
                                                    <tr class="item-row" id="">
                                                        <td>
                                                            <div style="margin-left:10px"><?php echo $num++; ?></div>
                                                        </td>
                                                        <td class="order-item">
                                                            <img src="./admin/image/<?=$row['image']?>"
                                                                style="width: 80px;
                                                                height: 80px;" alt="" >
                                                            <div class="product">
                                                                <h2 class="product-name" style="font-size: 1.3rem;">
                                                                    <?=$row['mota']?>
                                                                </h2>
                                                            
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="select-quantity">                                      
                                                                <span class="select-quantity-screen"><?=$row['so_luong']?></span>
                                                            </div>
                                                        </td>
                                                        <td class="subtotal">
                                                            <?=number_format($row['gia_tien'], 0, ",", ".")?>đ
                                                            
                                                        </td>
                                                        
                                                    </tr>
                                                    <?php
                                                    $totalMoney += ($row['gia_tien'] * number_format($row['so_luong'], 0, ",", "."));
                                                    $totalQuantity += $row['so_luong'];
                                                    }
                                                    ?>
                                                    
                                        </tbody>
                                </table>
                                                
                                <div class="total-price"style="padding-top: 15px;
                                    padding-bottom: 15px;">
                                    <div class="col l-2 c-2 m-2">
                                        <h2 class="title">Tạm tính: </h2>
                                        <h2 class="title">Phí vận chuyển: </h2>
                                        <h2 class="title">Tổng tiền: </h2>
                                       
                                    </div>
                                    <div class="col l-2 c-2 m-2">
                                        <h2><?=number_format($totalMoney, 0, ",", ".")?> đ</h2>
                                        <h2>0 đ</h2>
                                        <h2><?=number_format($totalMoney, 0, ",", ".")?> đ</h2>
                                    </div>
                                    
                                </div>
                                
                                <div style="background-color: #F5F5F5;
                                            padding-top: 30px;
                                            padding-bottom: 20px;
                                            display: flex;">
                                    <div class="btn-action" style="margin-left:20px;margin-top: 5px;">

                                        <a href="./bill.php" class="btn-back">
                                            <i class="fas fa-arrow-left"></i>
                                            <span>Trở lại đơn hàng của tôi</span>
                                        </a>

                                    </div>

                                    <div class="btn-action--next" style="margin-left:20px">

                                        <a href="" class="btn-next">
                                            Theo dõi đơn hàng
                                        </a>

                                    </div>
                                </div>
                               
                                
                            </div>             
                        </div> 
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
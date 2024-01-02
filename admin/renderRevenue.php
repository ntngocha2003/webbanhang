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
    <title>Quản lý doanh thu</title>
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="./css/addStaff.css">
    <link rel="stylesheet" href="./css/renderStaff.css">
    <link rel="stylesheet" href="./css/reponsiver.css">
    

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
                    
                    <?php
                        require_once 'connect.php';
                        $totalClients = mysqli_query($conn, "SELECT * FROM `account`where quen='Khách hàng'");
                        
                        $totalClients = $totalClients->num_rows;

                        $totalStaffs = mysqli_query($conn, "SELECT * FROM `account`where quen like '%Nhân viên%'");
                        
                        $totalStaffs = $totalStaffs->num_rows;

                        $totalProduct = mysqli_query($conn, "SELECT  *
                        FROM product");
                        
                        $sql = mysqli_fetch_all($totalProduct, MYSQLI_ASSOC);
                        $totalp=0;
                        foreach ($sql as $row) {
                            $totalp+=$row['so_luong'];
                            
                        }

                        $totalProduct1 = mysqli_query($conn, "SELECT  order_detail.*
                        FROM product
                        INNER JOIN order_detail ON product.id = order_detail.id_product
                        INNER JOIN orders ON orders.id = order_detail.id_order
                        where orders.tinh_trang like '%Đã giao%'
                        ");
                        
                        $sql = mysqli_fetch_all($totalProduct1, MYSQLI_ASSOC);
                        $totalBuy=0;
                        foreach ($sql as $row) {
                            $totalBuy+=$row['so_luong'];
                            
                        }

                        $totalOrders = mysqli_query($conn, "SELECT account.ten_dn,customers.image, orders.*
                                        FROM customers
                                        inner join account on account.id=customers.id_acc
                                        INNER JOIN orders ON customers.id = orders.id_client");
                        $totalOrders = $totalOrders->num_rows;

                        $totalOrders1 = mysqli_query($conn, "SELECT account.ten_dn,customers.image, orders.*
                                        FROM customers
                                        inner join account on account.id=customers.id_acc
                                        INNER JOIN orders ON customers.id = orders.id_client
                                        where orders.tinh_trang !='Đã giao hàng'");
                       
                        $totalOrders1 = $totalOrders1->num_rows;

                        $totalOrders2 = mysqli_query($conn, "SELECT account.ten_dn,customers.image, orders.*
                                        FROM customers
                                        inner join account on account.id=customers.id_acc
                                        INNER JOIN orders ON customers.id = orders.id_client
                                        where orders.tinh_trang='Đã giao hàng'");
                        $totalOrders2 = $totalOrders2->num_rows;

                        $totalOrders3 = mysqli_query($conn, "SELECT account.ten_dn,customers.image, orders.*
                                        FROM customers
                                        inner join account on account.id=customers.id_acc
                                        INNER JOIN orders ON customers.id = orders.id_client
                                        where orders.tinh_trang='Đã giao hàng'");
                                       
                                        $total=0;
                                        $sql = mysqli_fetch_all($totalOrders3, MYSQLI_ASSOC);
                                        foreach ($sql as $row){                  
                                            $total = $total+ $row['tong_tien'];
                                        }
                        
                        ?>
                    <div class="col l-9 m-12 c-12">
                        <div class="add_staff">

                            <div class="container">
                                <div class="container_title">
                                    <h2 class="container_heading">Thống kê doanh thu</h2>
                                </div>
                                
                                <div class="statistics">
                                    <div class="row sm-gutter "style="margin: 10px 0;">
                                        <div class="col l-6 m-6 c-6 ">
                                            <div class="statistics_section">

                                                <h3 class="statistics-heading">Tổng số khách hàng</h3>
                                                <div class="total_revenue">
                                                    <p>Có: <?php echo $totalClients?> khách hàng</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col l-6 m-6 c-6 ">
                                            <div class="statistics_section">

                                                <h3 class="statistics-heading">Tổng số nhân viên</h3>
                                                <div class="total_revenue">
                                                    <p>Có: <?php echo $totalStaffs?> nhân viên</p>
                                                </div>
                                            </div>
                                        </div>
                                        
    
                                    </div>

                                    <div class="row sm-gutter "style="margin: 10px 0;">
                                        <div class="col l-6 m-6 c-6 ">
                                            <div class="statistics_section">

                                                <h3 class="statistics-heading">Tổng số lượng sản phẩm còn</h3>
                                                <div class="total_revenue">
                                                    <p>Có: <?php echo $totalp?> sản phẩm</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col l-6 m-6 c-6 ">
                                            <div class="statistics_section">

                                                <h3 class="statistics-heading">Tổng số lượng sản phẩm đã bán</h3>
                                                <div class="total_revenue">
                                                    <p>Có: <?php echo $totalBuy?> sản phẩm</p>
                                                </div>
                                            </div>
                                        </div>
                                        
    
                                    </div>

                                    <div class="row sm-gutter "style="margin: 10px 0;">
                                        <div class="col l-6 m-6 c-6 ">
                                            <div class="statistics_section">
                                                <h3 class="statistics-heading">Tổng số đơn hàng</h3>
                                                <div class="total_revenue">
                                                    <p>Có: <?php echo $totalOrders?> đơn hàng</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col l-6 m-6 c-6 ">
                                            <div class="statistics_section">
                                                <h3 class="statistics-heading">Tổng số đơn hàng chưa hoàn thành</h3>
                                                <div class="total_revenue">
                                                    <p>Còn: <?php echo $totalOrders1?> đơn hàng</p>
                                                </div>
                                            </div>
                                        </div>
    
                                    </div>
                                    
                                    <div class="row sm-gutter "style="margin: 10px 0;">
                                        <div class="col l-6 m-6 c-6 ">
                                            <div class="statistics_section">
                                                <h3 class="statistics-heading">Tổng số đơn hàng đã giao</h3>
                                                <div class="total_revenue">
                                                    <p>Có: <?php echo $totalOrders2?> đơn hàng</p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col l-6 m-6 c-6 ">
                                            <div class="statistics_section">
                                                
                                                <h3 class="statistics-heading">Tổng số doanh thu</h3>
                                                <div class="total_revenue">
                                                    <p>Tổng số tiền: <?php echo $total?> đ</p>
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
                  
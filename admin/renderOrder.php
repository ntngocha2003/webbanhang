<?php
   session_start();
   ob_start();
    require_once 'connect.php';
        if(!empty($_GET['action']) && $_GET['action'] == 'search' && !empty($_POST)){
            $_SESSION['order_filter'] = $_POST;
            // var_dump($_SESSION['order_filter']);exit;
            header('Location: renderOrder.php');
        }
        if(!empty($_GET['action']) && $_GET['action'] == 'return' && !empty($_POST)){
            unset($_SESSION['order_filter']);
            header('Location: renderOrder.php');
        }
        
        if(!empty($_SESSION['order_filter'])){
            $where = "";
            foreach ($_SESSION['order_filter'] as $field => $value) {
                
                if(!empty($field)){
                    switch ($field) {
                        case 'ten_dn':
                            $where .= (!empty($where))?" AND ". "`".$field."` LIKE '%".$value."%'" : "`".$field."` LIKE '%".$value."%'";
                            break;
                            
                        }
                    }
                }
                extract($_SESSION['order_filter']);
            }
            $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 4;
            $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
            // var_dump($item_per_page);
            $offset = ($current_page - 1) * $item_per_page;
            if(!empty($where)){
                $totalRecords = mysqli_query($conn, "SELECT account.ten_dn,account.image, client_order.*
                FROM account
                INNER JOIN client_order ON account.id = client_order.id_account
                where (".$where.") ");
                // var_dump($where);exit;
        }else{
            $totalRecords = mysqli_query($conn, "SELECT account.ten_dn,account.image, client_order.*
            FROM account
            INNER JOIN client_order ON account.id = client_order.id_account");
        }
        $totalRecords = $totalRecords->num_rows;
        $totalPages = ceil($totalRecords / $item_per_page);
        if(!empty($where)){
            $orders = mysqli_query($conn, "SELECT account.ten_dn,account.image, client_order.*
            FROM account
            INNER JOIN client_order ON account.id = client_order.id_account where (".$where.") ORDER BY `id` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
        }else{
            
            $orders = mysqli_query($conn, "SELECT account.ten_dn,account.image, client_order.*
            FROM account
            INNER JOIN client_order ON account.id = client_order.id_account ORDER BY `id` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);

            $ordersDC = mysqli_query($conn, "SELECT account.ten_dn,account.image, client_order.*
            FROM account
            INNER JOIN client_order ON account.id = client_order.id_account where client_order.tinh_trang like '%Đang chờ hàng%' ");

            $ordersDG = mysqli_query($conn, "SELECT account.ten_dn,account.image, client_order.*
            FROM account
            INNER JOIN client_order ON account.id = client_order.id_account where client_order.tinh_trang like '%Đang giao%' ");
                   
            $ordersDGG = mysqli_query($conn, "SELECT account.ten_dn,account.image, client_order.*
            FROM account
            INNER JOIN client_order ON account.id = client_order.id_account where client_order.tinh_trang like '%Đã giao%' ");
             
            $ordersDH = mysqli_query($conn, "SELECT account.ten_dn,account.image, client_order.*
            FROM account
            INNER JOIN client_order ON account.id = client_order.id_account where client_order.tinh_trang like '%Đã hủy%' ");
                    
        }
        
        // mysqli_close($conn);
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý đơn hàng</title>
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/bill.css">
    <link rel="stylesheet" href="./css/addStaff.css">
    <link rel="stylesheet" href="./css/renderStaff.css">
    <link rel="stylesheet" href="./css/reponsiver.css">
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
                
                    <div class="col l-9 m-12 c-12">
                        <div class="add_staff">

                            <div class="container">
                                <div class="container_title">
                                    <h2 class="container_heading">Danh sách đơn hàng</h2>
                                </div>
                                <div class="control_link">
                                   
                                    <form class="control_link-item" style="margin-right: 0;"action="renderOrder.php?action=search" method="POST">
                                        <!-- <i class="ti-search"style="font-weight: 900;"></i> -->
                                        <input type="submit" name="btnSearch" value="Tìm kiếm" 
                                            style="font-weight: bold;
                                                font-size: 1.4rem;
                                                color: var(--primary-color);
                                                border: 0;
                                                background-color: #fff;
                                                cursor: pointer;">
                                            
                                        <input type="text" class="control_link-item--input" name="ten_dn"value="<?=!empty($value)?$value:""?>">
                                    </form>
                                    <form class="control_link-item" style="margin-right: 0;"action="renderOrder.php?action=return" method="POST">
                                        <!-- <i class="ti-search"style="font-weight: 900;"></i> -->
                                        <input type="submit" name="btnSearch" value="Trở lại" 
                                            style="font-weight: bold;
                                                font-size: 1.4rem;
                                                color: var(--primary-color);
                                                border: 0;
                                                background-color: #fff;
                                                cursor: pointer;">
                                            
                                    </form>
                                </div>
                                <div class="row sm-gutter">
                    

                                    <div class="col l-12 m-12 c-12">

                                        <div class="info-bill">
                                            <div class="row sm-gutter tabs">
                                                <div class="col l-2-4 m-2-4 c-2-4 tab-item active">
                                                    <p class="info-heading">
                                                        <span>Tất cả đơn hàng</span>
                                                    </p>
                                                </div>
                                                <div class="col l-2-4 m-2-4 c-2-4 tab-item">
                                                    <p  class="info-heading">
                                                        <span>Đang chờ hàng</span>
                                                    </p>
                                                </div>

                                                <div class="col l-2-4 m-2-4 c-2-4 tab-item">
                                                    <p  class="info-heading">
                                                        <span>Đang giao hàng</span>
                                                    </p>
                                                </div>

                                                <div class="col l-2-4 m-2-4 c-2-4 tab-item">
                                                    <p  class="info-heading">
                                                        <span>Đã giao hàng</span>
                                                    </p>
                                                </div>

                                                <div class="col l-2-4 m-2-4 c-2-4 tab-item">
                                                    <p  class="info-heading">
                                                        <span>Đã hủy</span>
                                                    </p>
                                                </div>

                                                <div class="line" style="top: 45px;
                                                                        background-color: var(--primary-color);"></div>

                                            </div>
                                        </div>
                                    </div>  
                                </div>
                                    <table class="table table-borderless tab-pane active">
                                        <thead class="table-borderless-thead">
                                        <tr>
                                            <th class="table-borderless-th" >STT</th>
                                           
                                            <th class="table-borderless-th" >Tên người nhận</th>
                                            <th class="table-borderless-th" >Ảnh</th>
                                            <th class="table-borderless-th" >Tổng tiền</th>
                                            <th class="table-borderless-th" >Ghi chú</th>
                                            <th class="table-borderless-th" >Tình trạng</th>
                                            <th class="table-borderless-th" >Ngày đặt</th>
                                            <th class="table-borderless-th" >In hóa đơn</th>
                                            <th class="table-borderless-th" >Thao tác</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                    
                                        <?php
                                            require_once 'connect.php';
                                           
                                            $sql = mysqli_fetch_all($orders, MYSQLI_ASSOC);
                                            $num=1;
                                            foreach($sql as $r){
                                               
                                                ?>
                                                
                                                <tr class="table-borderless-tr">
                                                    <td class="table-borderless-td">
                                                        <?php echo $num++?>
                                                    </td>
                                                    
                                                    <td class="table-borderless-td">
                                                        <div class="reponsive">
                                                            <?php echo $r['ten_dn'];?>
                                                        </div>
                                                    </td>
                                                    <td class="table-borderless-td">
                                                        <div class="reponsive">
                                                            <img class="table-borderless-td--img" src="./image/<?php echo $r['image']?>">
                                                        </div>
                                                        
                                                    
                                                    </td>
                                                    <td class="table-borderless-td">
                                                        <div class="reponsive">
                                                            <?php echo $r['tong_tien'];?> đ
                                                        </div>
                                                        
                                                    </td>

                                                    <td class="table-borderless-td">
                                                        <div class="detail">
                                                            <?php echo $r['ghi_chu'];?>
                                                        </div>
                                                        
                                                    </td>

                                                    <td class="table-borderless-td">
                                                        <div class="reponsive">
                                                            <?php echo $r['tinh_trang'];?>
                                                        </div>
                                                        
                                                    </td>
                                                   
                                                    <td class="table-borderless-td">
                                                        <div class="reponsive">
                                                            <?=date('d/m/Y', $r['created_time'])?>
                                                        </div>
                                                        
                                                    </td>
                                                    <td class="table-borderless-td">
                                                        <!-- target="_blank"  -->
                                                        <div class="reponsive">
                                                            <a target="_blank" href="order_detail.php?id=<?=$r['id']?>" 
                                                            style="color:#bbb">In</a>
                                                        </div>
                                                    </td>
                                                    <td class="table-borderless-td" style="display:flex;justify-content: space-around;">
                                                        <a href="editOrder.php?sid=<?php echo $r['id'];?>" class="btn-info">Sửa</a>
                                                        <a onclick="return confirm('bạn có muốn xóa đơn hàng này không')"
                                                            href="removeOrder.php?sid=<?php echo $r['id'];?>" class="btn-danger">Xóa
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php    
                                            }
                                        ?>
                    
                                        </tbody>
                                    </table> 

                                    <table class="table table-borderless tab-pane">
                                        <thead class="table-borderless-thead">
                                        <tr>
                                            <th class="table-borderless-th" >STT</th>
                                           
                                            <th class="table-borderless-th" >Tên người nhận</th>
                                            <th class="table-borderless-th" >Ảnh</th>
                                            <th class="table-borderless-th" >Tổng tiền</th>
                                            <th class="table-borderless-th" >Ghi chú</th>
                                            <th class="table-borderless-th" >Tình trạng</th>
                                            <th class="table-borderless-th" >Ngày đặt</th>
                                            <th class="table-borderless-th" >In hóa đơn</th>
                                            <th class="table-borderless-th" >Thao tác</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                    
                                        <?php
                                            require_once 'connect.php';
                                           
                                            $sql = mysqli_fetch_all($ordersDC, MYSQLI_ASSOC);
                                            $num=1;
                                            foreach($sql as $r){
                                               
                                                ?>
                                                
                                                <tr class="table-borderless-tr">
                                                    <td class="table-borderless-td">
                                                        <?php echo $num++?>
                                                    </td>
                                                    
                                                    <td class="table-borderless-td">
                                                        <div class="reponsive">
                                                            <?php echo $r['ten_dn'];?>
                                                        </div>
                                                    </td>
                                                    <td class="table-borderless-td">
                                                        <div class="reponsive">
                                                            <img class="table-borderless-td--img" src="./image/<?php echo $r['image']?>">
                                                        </div>
                                                        
                                                    
                                                    </td>
                                                    <td class="table-borderless-td">
                                                        <div class="reponsive">
                                                            <?php echo $r['tong_tien'];?> đ
                                                        </div>
                                                        
                                                    </td>

                                                    <td class="table-borderless-td">
                                                        <div class="detail">
                                                            <?php echo $r['ghi_chu'];?>
                                                        </div>
                                                        
                                                    </td>

                                                    <td class="table-borderless-td">
                                                        <div class="reponsive">
                                                            <?php echo $r['tinh_trang'];?>
                                                        </div>
                                                        
                                                    </td>
                                                   
                                                    <td class="table-borderless-td">
                                                        <div class="reponsive">
                                                            <?=date('d/m/Y', $r['created_time'])?>
                                                        </div>
                                                        
                                                    </td>
                                                    <td class="table-borderless-td">
                                                        <!-- target="_blank"  -->
                                                        <div class="reponsive">
                                                            <a target="_blank" href="order_detail.php?id=<?=$r['id']?>" 
                                                            style="color:#bbb">In</a>
                                                        </div>
                                                    </td>
                                                    <td class="table-borderless-td" style="display:flex;justify-content: space-around;">
                                                        <a href="editOrder.php?sid=<?php echo $r['id'];?>" class="btn-info">Sửa</a>
                                                        <a onclick="return confirm('bạn có muốn xóa đơn hàng này không')"
                                                            href="removeOrder.php?sid=<?php echo $r['id'];?>" class="btn-danger">Xóa
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php    
                                            }
                                        ?>
                    
                                        </tbody>
                                    </table> 

                                    <table class="table table-borderless tab-pane">
                                        <thead class="table-borderless-thead">
                                        <tr>
                                            <th class="table-borderless-th" >STT</th>
                                           
                                            <th class="table-borderless-th" >Tên người nhận</th>
                                            <th class="table-borderless-th" >Ảnh</th>
                                            <th class="table-borderless-th" >Tổng tiền</th>
                                            <th class="table-borderless-th" >Ghi chú</th>
                                            <th class="table-borderless-th" >Tình trạng</th>
                                            <th class="table-borderless-th" >Ngày đặt</th>
                                            <th class="table-borderless-th" >In hóa đơn</th>
                                            <th class="table-borderless-th" >Thao tác</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                    
                                        <?php
                                            require_once 'connect.php';
                                           
                                            $sql = mysqli_fetch_all($ordersDG, MYSQLI_ASSOC);
                                            $num=1;
                                            foreach($sql as $r){
                                               
                                                ?>
                                                
                                                <tr class="table-borderless-tr">
                                                    <td class="table-borderless-td">
                                                        <?php echo $num++?>
                                                    </td>
                                                    
                                                    <td class="table-borderless-td">
                                                        <div class="reponsive">
                                                            <?php echo $r['ten_dn'];?>
                                                        </div>
                                                    </td>
                                                    <td class="table-borderless-td">
                                                        <div class="reponsive">
                                                            <img class="table-borderless-td--img" src="./image/<?php echo $r['image']?>">
                                                        </div>
                                                        
                                                    
                                                    </td>
                                                    <td class="table-borderless-td">
                                                        <div class="reponsive">
                                                            <?php echo $r['tong_tien'];?> đ
                                                        </div>
                                                        
                                                    </td>

                                                    <td class="table-borderless-td">
                                                        <div class="detail">
                                                            <?php echo $r['ghi_chu'];?>
                                                        </div>
                                                        
                                                    </td>

                                                    <td class="table-borderless-td">
                                                        <div class="reponsive">
                                                            <?php echo $r['tinh_trang'];?>
                                                        </div>
                                                        
                                                    </td>
                                                   
                                                    <td class="table-borderless-td">
                                                        <div class="reponsive">
                                                            <?=date('d/m/Y', $r['created_time'])?>
                                                        </div>
                                                        
                                                    </td>
                                                    <td class="table-borderless-td">
                                                        <!-- target="_blank"  -->
                                                        <div class="reponsive">
                                                            <a target="_blank" href="order_detail.php?id=<?=$r['id']?>" 
                                                            style="color:#bbb">In</a>
                                                        </div>
                                                    </td>
                                                    <td class="table-borderless-td" style="display:flex;justify-content: space-around;">
                                                        <a href="editOrder.php?sid=<?php echo $r['id'];?>" class="btn-info">Sửa</a>
                                                        <a onclick="return confirm('bạn có muốn xóa đơn hàng này không')"
                                                            href="removeOrder.php?sid=<?php echo $r['id'];?>" class="btn-danger">Xóa
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php    
                                            }
                                        ?>
                    
                                        </tbody>
                                    </table> 

                                    <table class="table table-borderless tab-pane">
                                        <thead class="table-borderless-thead">
                                        <tr>
                                            <th class="table-borderless-th" >STT</th>
                                           
                                            <th class="table-borderless-th" >Tên người nhận</th>
                                            <th class="table-borderless-th" >Ảnh</th>
                                            <th class="table-borderless-th" >Tổng tiền</th>
                                            <th class="table-borderless-th" >Ghi chú</th>
                                            <th class="table-borderless-th" >Tình trạng</th>
                                            <th class="table-borderless-th" >Ngày đặt</th>
                                            <th class="table-borderless-th" >In hóa đơn</th>
                                            <th class="table-borderless-th" >Thao tác</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                    
                                        <?php
                                            require_once 'connect.php';
                                           
                                            $sql = mysqli_fetch_all($ordersDGG, MYSQLI_ASSOC);
                                            $num=1;
                                            foreach($sql as $r){
                                               
                                                ?>
                                                
                                                <tr class="table-borderless-tr">
                                                    <td class="table-borderless-td">
                                                        <?php echo $num++?>
                                                    </td>
                                                    
                                                    <td class="table-borderless-td">
                                                        <div class="reponsive">
                                                            <?php echo $r['ten_dn'];?>
                                                        </div>
                                                    </td>
                                                    <td class="table-borderless-td">
                                                        <div class="reponsive">
                                                            <img class="table-borderless-td--img" src="./image/<?php echo $r['image']?>">
                                                        </div>
                                                        
                                                    
                                                    </td>
                                                    <td class="table-borderless-td">
                                                        <div class="reponsive">
                                                            <?php echo $r['tong_tien'];?> đ
                                                        </div>
                                                        
                                                    </td>

                                                    <td class="table-borderless-td">
                                                        <div class="detail">
                                                            <?php echo $r['ghi_chu'];?>
                                                        </div>
                                                        
                                                    </td>

                                                    <td class="table-borderless-td">
                                                        <div class="reponsive">
                                                            <?php echo $r['tinh_trang'];?>
                                                        </div>
                                                        
                                                    </td>
                                                   
                                                    <td class="table-borderless-td">
                                                        <div class="reponsive">
                                                            <?=date('d/m/Y', $r['created_time'])?>
                                                        </div>
                                                        
                                                    </td>
                                                    <td class="table-borderless-td">
                                                        <!-- target="_blank"  -->
                                                        <div class="reponsive">
                                                            <a target="_blank" href="order_detail.php?id=<?=$r['id']?>" 
                                                            style="color:#bbb">In</a>
                                                        </div>
                                                    </td>
                                                    <td class="table-borderless-td" style="display:flex;justify-content: space-around;">
                                                        <a href="editOrder.php?sid=<?php echo $r['id'];?>" class="btn-info">Sửa</a>
                                                        <a onclick="return confirm('bạn có muốn xóa đơn hàng này không')"
                                                            href="removeOrder.php?sid=<?php echo $r['id'];?>" class="btn-danger">Xóa
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php    
                                            }
                                        ?>
                    
                                        </tbody>
                                    </table> 

                                    <table class="table table-borderless tab-pane">
                                        <thead class="table-borderless-thead">
                                        <tr>
                                            <th class="table-borderless-th" >STT</th>
                                           
                                            <th class="table-borderless-th" >Tên người nhận</th>
                                            <th class="table-borderless-th" >Ảnh</th>
                                            <th class="table-borderless-th" >Tổng tiền</th>
                                            <th class="table-borderless-th" >Ghi chú</th>
                                            <th class="table-borderless-th" >Tình trạng</th>
                                            <th class="table-borderless-th" >Ngày đặt</th>
                                            <th class="table-borderless-th" >In hóa đơn</th>
                                            <th class="table-borderless-th" >Thao tác</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                    
                                        <?php
                                            require_once 'connect.php';
                                           
                                            $sql = mysqli_fetch_all($ordersDH, MYSQLI_ASSOC);
                                            $num=1;
                                            foreach($sql as $r){
                                               
                                                ?>
                                                
                                                <tr class="table-borderless-tr">
                                                    <td class="table-borderless-td">
                                                        <?php echo $num++?>
                                                    </td>
                                                    
                                                    <td class="table-borderless-td">
                                                        <div class="reponsive">
                                                            <?php echo $r['ten_dn'];?>
                                                        </div>
                                                    </td>
                                                    <td class="table-borderless-td">
                                                        <div class="reponsive">
                                                            <img class="table-borderless-td--img" src="./image/<?php echo $r['image']?>">
                                                        </div>
                                                        
                                                    
                                                    </td>
                                                    <td class="table-borderless-td">
                                                        <div class="reponsive">
                                                            <?php echo $r['tong_tien'];?> đ
                                                        </div>
                                                        
                                                    </td>

                                                    <td class="table-borderless-td">
                                                        <div class="detail">
                                                            <?php echo $r['ghi_chu'];?>
                                                        </div>
                                                        
                                                    </td>

                                                    <td class="table-borderless-td">
                                                        <div class="reponsive">
                                                            <?php echo $r['tinh_trang'];?>
                                                        </div>
                                                        
                                                    </td>
                                                   
                                                    <td class="table-borderless-td">
                                                        <div class="reponsive">
                                                            <?=date('d/m/Y', $r['created_time'])?>
                                                        </div>
                                                        
                                                    </td>
                                                    <td class="table-borderless-td">
                                                        <!-- target="_blank"  -->
                                                        <div class="reponsive">
                                                            <a target="_blank" href="order_detail.php?id=<?=$r['id']?>" 
                                                            style="color:#bbb">In</a>
                                                        </div>
                                                    </td>
                                                    <td class="table-borderless-td" style="display:flex;justify-content: space-around;">
                                                        <a href="editOrder.php?sid=<?php echo $r['id'];?>" class="btn-info">Sửa</a>
                                                        <a onclick="return confirm('bạn có muốn xóa đơn hàng này không')"
                                                            href="removeOrder.php?sid=<?php echo $r['id'];?>" class="btn-danger">Xóa
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php    
                                            }
                                        ?>
                    
                                        </tbody>
                                    </table> 
                                    <?php
                                    include '../pagination.php';
                                    ?>
                                    <div class="totalRecords"style="color: var(--primary-color);
                                                                            text-align: end;
                                                                            ">
                                        <?php
                                            if(isset($_SESSION['order_filter'])){
                                                if(empty($value)){
                                                    ?>
                                                     <span style='color:red'> Bạn chưa nhập từ khóa!!!</span>
                                                    <?php 
                                                }
                                                else{
                                                    ?>
                                                    <span><?=$totalRecords?> <span>kết quả trả về cho từ khóa </span><strong><?=$value?></strong> trên <span><?=$totalPages?></span> trang</span>
                                                <?php
                                                }
                                                
                                            }
                                            else {
                                                ?>
                                                <span>Có tất cả <strong><?=$totalRecords?></strong> đơn hàng trên <strong><?=$totalPages?></strong> trang</span>
                                                <?php
                                            }
                                        ?>
                                        
                                    </div>     
                            </div>
                           
                        </div>
                    </div>  
                </div>
            </div> 
        </div> 


    </div>
    <script src="./js/main.js"></script>
    <script>
    const $ = document.querySelector.bind(document);
    const $$ = document.querySelectorAll.bind(document);

    const tabs = $$(".tab-item");
    const panes = $$(".tab-pane");

    const tabActive = $(".tab-item.active");
    const line = $(".tabs .line");


    requestIdleCallback(function () {
    line.style.left = tabActive.offsetLeft + "px";
    line.style.width = tabActive.offsetWidth + "px";
    });

    tabs.forEach((tab, index) => {
    const pane = panes[index];

    tab.onclick = function () {
        $(".tab-item.active").classList.remove("active");
        $(".tab-pane.active").classList.remove("active");

        line.style.left = this.offsetLeft + "px";
        line.style.width = this.offsetWidth + "px";

        this.classList.add("active");
        pane.classList.add("active");
    };
    });
    </script>
</body>
</html>
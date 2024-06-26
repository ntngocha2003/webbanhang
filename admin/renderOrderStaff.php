<?php
   session_start();
   ob_start();
    require_once 'connect.php';
    if(isset($_SESSION['nameAdmin'])){
        $row=$_SESSION['nameAdmin'];
        $render_sql= "SELECT account.ten_dn, account.mat_khau,account.quen, staffs.* FROM `staffs` join `account` on staffs.id_acc=account.id
        where ten_dn='$row'";
        $result=mysqli_query($conn,$render_sql);
        $r_nv=mysqli_fetch_assoc($result);
        $nv=$r_nv['id'];
        
       ?> 
       <?php
       }
       
        if(!empty($_GET['action']) && $_GET['action'] == 'search' && !empty($_POST)){
            $_SESSION['orderStaff_filter'] = $_POST;
            header('Location: renderOrderStaff.php');
        }

       
        if(!empty($_GET['action']) && $_GET['action'] == 'return' && !empty($_POST)){
            unset($_SESSION['orderStaff_filter']);
            header('Location: renderOrderStaff.php');
        }
        
        if(!empty($_SESSION['orderStaff_filter'])){
            $where = "";
            foreach ($_SESSION['orderStaff_filter'] as $field => $value) {
                
                if(!empty($field)){
                    switch ($field) {
                        case'ten_dn':
                            $where .= (!empty($where))?" AND ". "`".$field."` LIKE '%".$value."%'" : "`".$field."` LIKE '%".$value."%'";
                            break;
                            
                    }
                }
            }
                extract($_SESSION['orderStaff_filter']);
        }
        
        $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 4;
        $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
           
        $offset = ($current_page - 1) * $item_per_page;

        if(!empty($where)){
                $totalRecords = mysqli_query($conn, "SELECT account.ten_dn,customers.image,orders.*
                FROM customers
                inner join account on account.id=customers.id_acc

                INNER JOIN orders ON customers.id = orders.id_client
                where (".$where.") and id_staff=$nv ");
               
        }
        
        else{
            $totalRecords = mysqli_query($conn, "SELECT account.ten_dn,customers.image, orders.*
            FROM customers
            inner join account on account.id=customers.id_acc
            INNER JOIN orders ON customers.id = orders.id_client where id_staff=$nv");
        }
        
        if(!empty($where)){
            $orders = mysqli_query($conn, "SELECT account.ten_dn,customers.image, orders.*
            FROM customers
            inner join account on account.id=customers.id_acc
            INNER JOIN orders ON customers.id = orders.id_client where (".$where.")and id_staff=$nv ORDER BY `id` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
        }
        else if(!empty($_GET['action']) && $_GET['action'] == 'searchWait' && !empty($_POST)){
            $orders = mysqli_query($conn, "SELECT account.ten_dn,customers.image, orders.*
            FROM customers
            inner join account on account.id=customers.id_acc
            INNER JOIN orders ON customers.id = orders.id_client where orders.tinh_trang like '%Đang chờ hàng%' and id_staff=$nv");
            $totalRecords = mysqli_query($conn, "SELECT account.ten_dn,customers.image, orders.*
            FROM customers
            inner join account on account.id=customers.id_acc
            INNER JOIN orders ON customers.id = orders.id_client where orders.tinh_trang like '%Đang chờ hàng%'and id_staff=$nv");
            unset($_SESSION['orderStaff_filter']);
          
        }
        else if(!empty($_GET['action']) && $_GET['action'] == 'searchShip' && !empty($_POST)){
            $orders = mysqli_query($conn, "SELECT account.ten_dn,customers.image, orders.*
            FROM customers
            inner join account on account.id=customers.id_acc
            INNER JOIN orders ON customers.id = orders.id_client where orders.tinh_trang like '%Đang giao hàng%'and id_staff=$nv");
            $totalRecords = mysqli_query($conn, "SELECT account.ten_dn,customers.image, orders.*
            FROM customers
            inner join account on account.id=customers.id_acc
            INNER JOIN orders ON customers.id = orders.id_client where orders.tinh_trang like '%Đang giao hàng%'and id_staff=$nv");
            unset($_SESSION['orderStaff_filter']);
        }
        else if(!empty($_GET['action']) && $_GET['action'] == 'searchSuccess' && !empty($_POST)){
            $orders = mysqli_query($conn, "SELECT account.ten_dn,customers.image, orders.*
            FROM customers
            inner join account on account.id=customers.id_acc
            INNER JOIN orders ON customers.id = orders.id_client where orders.tinh_trang like '%Đã giao hàng%'and id_staff=$nv");
            $totalRecords = mysqli_query($conn, "SELECT account.ten_dn,customers.image, orders.*
            FROM customers
            inner join account on account.id=customers.id_acc
            INNER JOIN orders ON customers.id = orders.id_client where orders.tinh_trang like '%Đã giao hàng%'and id_staff=$nv");
            unset($_SESSION['orderStaff_filter']);
        }
        else if(!empty($_GET['action']) && $_GET['action'] == 'searchCancel' && !empty($_POST)){
            $orders = mysqli_query($conn, "SELECT account.ten_dn,customers.image, orders.*
            FROM customers
            inner join account on account.id=customers.id_acc
            INNER JOIN orders ON customers.id = orders.id_client where orders.tinh_trang like '%Đã hủy%'and id_staff=$nv");
            $totalRecords = mysqli_query($conn, "SELECT account.ten_dn,customers.image, orders.*
            FROM customers
            inner join account on account.id=customers.id_acc
            INNER JOIN orders ON customers.id = orders.id_client where orders.tinh_trang like '%Đã hủy%'and id_staff=$nv");
            unset($_SESSION['orderStaff_filter']);
        }
        else{
           
            $orders = mysqli_query($conn, "SELECT account.ten_dn,customers.image, orders.*
            FROM customers
            inner join account on account.id=customers.id_acc
            INNER JOIN orders ON customers.id = orders.id_client where id_staff=$nv ORDER BY `id` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);

        }

        $totalRecords = $totalRecords->num_rows;
        $totalPages = ceil($totalRecords / $item_per_page);
     
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
                                   
                                    <form class="control_link-item" style="margin-right: 0;"action="renderOrderStaff.php?action=search" method="POST">
                                       
                                        <input type="submit" name="btnSearch" value="Tìm kiếm" 
                                            style="font-weight: bold;
                                                font-size: 1.4rem;
                                                color: var(--primary-color);
                                                border: 0;
                                                background-color: #fff;
                                                cursor: pointer;">
                                            
                                        <input type="text" class="control_link-item--inpaccount"name="ten_dn" value="<?=!empty($value)?$value:""?>">
                                    </form>

                                    <?php
                                
                                        if(!empty($_GET['action']) && $_GET['action'] == 'searchShip' && !empty($_POST)){
                                            echo'<form class="control_link-item" style="margin-right: 0;"action="renderOrderStaff.php?action=searchShip" method="POST">
                                      
                                                    <input type="submit" class="control_link-item--input2" name="order_wait"value="Đang giao hàng">
                                                </form>';
                                        }
                                        else{
                                            echo'
                                                <form class="control_link-item" style="margin-right: 0;"action="renderOrderStaff.php?action=searchShip" method="POST">
                                        
                                                    <input type="submit" class="control_link-item--input" name="order_wait"value="Đang giao hàng">
                                                </form>
                                            
                                            ';
                                        }
                                    ?>
                                    
                                    <?php
                                
                                        if(!empty($_GET['action']) && $_GET['action'] == 'searchSuccess' && !empty($_POST)){
                                            echo'<form class="control_link-item" style="margin-right: 0;"action="renderOrderStaff.php?action=searchSuccess" method="POST">
                                       
                                                    <input type="submit" class="control_link-item--input2" name="order_wait"value="Đã giao hàng">
                                                </form>';
                                        }
                                        else{
                                            echo'
                                                <form class="control_link-item" style="margin-right: 0;"action="renderOrderStaff.php?action=searchSuccess" method="POST">
                                        
                                                    <input type="submit" class="control_link-item--input" name="order_wait"value="Đã giao hàng">
                                                </form>
                                            
                                            ';
                                        }
                                    ?>
                                    
                                    <form class="control_link-item" style="margin-right: 0;"action="renderOrderStaff.php?action=return" method="POST">
                                      
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
                    
                                </div>
                                    <table class="table table-borderless tab-pane active">
                                        <thead class="table-borderless-thead">
                                        <tr>
                                            <th class="table-borderless-th" >STT</th>
                                           
                                            <th class="table-borderless-th" >Tên người nhận</th>
                                            <th class="table-borderless-th" >Ảnh</th>
                                            <th class="table-borderless-th" >Tổng tiền</th>                          
                                            <th class="table-borderless-th" >Tình trạng</th>
                                            <th class="table-borderless-th" >Ngày đặt</th>
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
                                                            <?php
                                                                if(strlen($r['image'])==14){
                                                                    
                                                                    ?>
                                                                        <img src="./image/avatar.png" alt="" class="table-borderless-td--img">
                                                                    <?php
                                                                }
                                                                else{
                                                                   
                                                                    ?>
                                                                        <img class="table-borderless-td--img" src="./image/<?php echo $r['image']?>">
                                                                    <?php
                                                                }
                                                            ?>
                                                        </div>
                                                    
                                                    </td>
                                                    <td class="table-borderless-td">
                                                        <div class="reponsive">
                                                            <?php echo $r['tong_tien'];?> đ
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
                                                    
                                                    <td class="table-borderless-td" style="display:flex;justify-content: space-around;">
                                                    <?php
                                                            if(!($r['tinh_trang']=='Đã hủy')&& !($r['tinh_trang']=='Đã giao hàng')){
                                                                ?>

                                                                    <a href="editOrderStaff.php?sid=<?php echo $r['id'];?>" class="btn-info">Sửa</a>
                                                                <?php
                                                            }else{
                                                                ?>
                                                                    <a class="btn-info" style="background-color:#ccc">Sửa</a>
                                                                <?php
                                                            }
                                                        ?>
                                                        
                                                        <?php
                                                            if(!($r['tinh_trang']=='Đang giao hàng')){
                                                                ?>

                                                                    <a onclick="return confirm('bạn có muốn xóa đơn hàng này không')"
                                                                        href="removeOrderStaff.php?sid=<?php echo $r['id'];?>" class="btn-danger">Xóa
                                                                    </a>
                                                                <?php
                                                            }
                                                            else{
                                                                ?>
                                                                    <a class="btn-info" style="background-color:#ccc">Xóa</a>
                                                                <?php
                                                            }
                                                        ?>
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
                                            if(isset($_SESSION['orderStaff_filter'])){
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
    
</body>
</html>
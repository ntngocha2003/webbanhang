
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
    <link rel="stylesheet" href="./admin/css/renderStaff.css"> 
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
        <?php
            $id_acc=$r['id'];
            require_once './admin/connect.php';
                if(!empty($_GET['action']) && $_GET['action'] == 'search' && !empty($_POST)){
                    $_SESSION['order'] = $_POST;
                    header('Location: bill.php');
      }

     
      if(!empty($_GET['action']) && $_GET['action'] == 'return' && !empty($_POST)){
          unset($_SESSION['order']);
          header('Location: bill.php');
      }   
      
      if(!empty($_SESSION['order'])){
          $where = "";
          foreach ($_SESSION['order'] as $field => $value) {
              
              if(!empty($field)){
                  switch ($field) {
                      case 'ten_sp':
                          $where .= (!empty($where))?" AND ". "`".$field."` LIKE '%".$value."%'" : "`".$field."` LIKE '%".$value."%'";
                          break;
                          
                  }
              }
          }
              extract($_SESSION['order']);
      }
      
      $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 4;
      $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
      $offset = ($current_page - 1) * $item_per_page;

      if(!empty($where)){
        $totalRecords = mysqli_query($conn, "SELECT DISTINCT orders.*,order_detail.so_luong,product.ten_sp
                        FROM order_detail
                        INNER JOIN product on order_detail.id_product=product.id
                        INNER JOIN orders ON orders.id = order_detail.id_order
                        INNER JOIN customers ON customers.id = orders.id_client
                        WHERE customers.id ='$id_acc' and  (".$where.") ");
       
        }
        else{
            $totalRecords = mysqli_query($conn, "SELECT DISTINCT orders.*,order_detail.so_luong
                            FROM order_detail
                            INNER JOIN orders ON orders.id = order_detail.id_order
                            INNER JOIN customers ON customers.id = orders.id_client
                            WHERE customers.id ='$id_acc'");
        }
      
      if(!empty($where)){
          $order_detail = mysqli_query($conn, "SELECT DISTINCT orders.*,order_detail.so_luong,product.ten_sp
          FROM order_detail
          INNER JOIN orders ON orders.id = order_detail.id_order
          INNER JOIN product on order_detail.id_product=product.id
          INNER JOIN customers ON customers.id = orders.id_client
          WHERE customers.id ='$id_acc' and (".$where.")ORDER BY `id` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
             
      } 
      else if(!empty($_GET['action']) && $_GET['action'] == 'searchWait' && !empty($_POST)){
        $order_detail = mysqli_query($conn, "SELECT DISTINCT orders.*,order_detail.so_luong
                        FROM order_detail
                        INNER JOIN orders ON orders.id = order_detail.id_order
                        INNER JOIN customers ON customers.id = orders.id_client
                        WHERE customers.id ='$id_acc' and orders.tinh_trang like '%Đang chờ hàng%'");

        $totalRecords = mysqli_query($conn, "SELECT DISTINCT orders.*,order_detail.so_luong
        FROM order_detail
        INNER JOIN orders ON orders.id = order_detail.id_order       
        INNER JOIN customers ON customers.id = orders.id_client
        WHERE customers.id ='$id_acc' and orders.tinh_trang like '%Đang chờ hàng%' ");
      
    }
    else if(!empty($_GET['action']) && $_GET['action'] == 'searchShip' && !empty($_POST)){
        $order_detail = mysqli_query($conn, "SELECT DISTINCT orders.*,order_detail.so_luong
                        FROM order_detail
                        INNER JOIN orders ON orders.id = order_detail.id_order        
                        INNER JOIN customers ON customers.id = orders.id_client
                        WHERE customers.id ='$id_acc' and orders.tinh_trang like '%Đang giao hàng%' ");
        $totalRecords = mysqli_query($conn, "SELECT DISTINCT orders.*,order_detail.so_luong
                        FROM order_detail
                        INNER JOIN orders ON orders.id = order_detail.id_order          
                        INNER JOIN customers ON customers.id = orders.id_client
                        WHERE customers.id ='$id_acc' and orders.tinh_trang like '%Đang giao hàng%'");
    }
    else if(!empty($_GET['action']) && $_GET['action'] == 'searchSuccess' && !empty($_POST)){
        $order_detail = mysqli_query($conn, "SELECT DISTINCT orders.*,order_detail.so_luong
                        FROM order_detail
                        INNER JOIN orders ON orders.id = order_detail.id_order   
                        INNER JOIN customers ON customers.id = orders.id_client
                        WHERE customers.id ='$id_acc' and orders.tinh_trang like '%Đã giao hàng%'");
        $totalRecords = mysqli_query($conn, "SELECT DISTINCT orders.*,order_detail.so_luong
                        FROM order_detail
                        INNER JOIN orders ON orders.id = order_detail.id_order  
                        INNER JOIN customers ON customers.id = orders.id_client
                        WHERE customers.id ='$id_acc' and orders.tinh_trang like '%Đã giao hàng%'");
    }
    else if(!empty($_GET['action']) && $_GET['action'] == 'searchCancel' && !empty($_POST)){
        $order_detail = mysqli_query($conn, "SELECT DISTINCT orders.*,order_detail.so_luong
                        FROM order_detail
                        INNER JOIN orders ON orders.id = order_detail.id_order     
                        INNER JOIN customers ON customers.id = orders.id_client
                        WHERE customers.id ='$id_acc' and orders.tinh_trang like '%Đã hủy%'");
        $totalRecords = mysqli_query($conn, "SELECT DISTINCT orders.*,order_detail.so_luong
                        FROM order_detail
                        INNER JOIN orders ON orders.id = order_detail.id_order  
                        INNER JOIN customers ON customers.id = orders.id_client
                        WHERE customers.id ='$id_acc' and orders.tinh_trang like '%Đã hủy%'");
    }
      else{
        $order_detail = mysqli_query($conn, "SELECT DISTINCT orders.*,order_detail.so_luong
                        FROM order_detail
                        INNER JOIN orders ON orders.id = order_detail.id_order    
                        INNER JOIN customers ON customers.id = orders.id_client
                        WHERE customers.id ='$id_acc' ORDER BY `id` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
      }    
      $totalRecords = $totalRecords->num_rows;
      $totalPages = ceil($totalRecords / $item_per_page);
  ?>
        <!-- phần nội dung -->
        <div class="app__container app_bill">
            <div class="grid wide">

                <div class="app_heading">
                    <h2>Đơn hàng của tôi</h2>
                </div>

                <div class="row sm-gutter">
                    

                    <div class="col l-12 m-12 c-12">

                        <div class="info-bill">
                            <div class="row sm-gutter tabs">

                                <?php
                                    
                                    if(!empty($_GET['action']) &&(($_GET['action'] == 'searchWait') || ($_GET['action'] == 'searchShip')|| ($_GET['action'] == 'searchSuccess')||($_GET['action'] == 'searchCancel')) && !empty($_POST)){
                                        echo' <form class="col l-2-4 m-2-4 c-2-4 tab-item " style="margin-right: 0;"action="bill.php?action=returnBill" method="POST">
                                        
                                                <input type="submit" class="search-bill" name="order_wait"value="Tất cả đơn hàng">
                                            </form>';
                                    }
                                    else{
                                        echo'
                                            <form class="col l-2-4 m-2-4 c-2-4 tab-item2 " style="margin-right: 0;"action="bill.php?action=returnBill" method="POST">
                                            
                                                <input type="submit" class="search-bill2" name="order_wait"value="Tất cả đơn hàng">
                                            </form>
                                        
                                        ';
                                    }
                                ?>
                               
                                <?php
                                
                                    if(!empty($_GET['action']) && $_GET['action'] == 'searchWait' && !empty($_POST)){
                                        echo'<form class="col l-2-4 m-2-4 c-2-4 tab-item2 " style="margin-right: 0;"action="bill.php?action=searchWait" method="POST">
                                      
                                                <input type="submit" class="search-bill2" name="order_wait"value="Đang chờ hàng">
                                            </form>';
                                    }
                                    else{
                                        echo'
                                            <form class="col l-2-4 m-2-4 c-2-4 tab-item " style="margin-right: 0;"action="bill.php?action=searchWait" method="POST">
                                                
                                                <input type="submit" class="search-bill" name="order_wait"value="Đang chờ hàng">
                                            </form>
                                        
                                        ';
                                    }
                                ?>


                                <?php
                                    
                                    if(!empty($_GET['action']) && $_GET['action'] == 'searchShip' && !empty($_POST)){
                                        echo'<form class="col l-2-4 m-2-4 c-2-4 tab-item2" style="margin-right: 0;"action="bill.php?action=searchShip" method="POST">
                                      
                                                <input type="submit" class="search-bill2" name="order_wait"value="Đang giao hàng">
                                            </form>';
                                    }
                                    else{
                                        echo'
                                            <form class="col l-2-4 m-2-4 c-2-4 tab-item " style="margin-right: 0;"action="bill.php?action=searchShip" method="POST">
                                                
                                                <input type="submit" class="search-bill" name="order_wait"value="Đang giao hàng">
                                            </form>
                                        
                                        ';
                                    }
                                ?>
                                
                                
                                <?php
                                    
                                    if(!empty($_GET['action']) && $_GET['action'] == 'searchSuccess' && !empty($_POST)){
                                        echo'<form class="col l-2-4 m-2-4 c-2-4 tab-item2" style="margin-right: 0;"action="bill.php?action=searchSuccess" method="POST">
                                       
                                                <input type="submit" class="search-bill2" name="order_wait"value="Đã giao hàng">
                                            </form>';
                                    }
                                    else{
                                        echo'
                                            <form class="col l-2-4 m-2-4 c-2-4 tab-item" style="margin-right: 0;"action="bill.php?action=searchSuccess" method="POST">
                                        
                                                <input type="submit" class="search-bill" name="order_wait"value="Đã giao hàng">
                                            </form>
                                        
                                        ';
                                    }
                                ?>
                                

                                <?php
                                    
                                    if(!empty($_GET['action']) && $_GET['action'] == 'searchCancel' && !empty($_POST)){
                                        echo'<form class="col l-2-4 m-2-4 c-2-4 tab-item2" style="margin-right: 0;"action="bill.php?action=searchCancel" method="POST">
                                      
                                                <input type="submit" class="search-bill2" name="order_wait"value="Đã hủy">
                                            </form>';
                                    }
                                    else{
                                        echo'<form class="col l-2-4 m-2-4 c-2-4 tab-item" style="margin-right: 0;"action="bill.php?action=searchCancel" method="POST">
                                      
                                                <input type="submit" class="search-bill" name="order_wait"value="Đã hủy">
                                            </form>';
                                    }
                                ?>
                                

                               

                                <div class="line" style="top: 45px;
                                                        background-color: var(--primary-color);"></div>

                            </div>
                        </div>
                    </div>  
                </div>
                <form class="control_link-item" style="margin-top: -9px;margin-right: 0;"action="bill.php?action=search" method="POST">
                                       
                    <input type="submit" name="btnSearch" value="Tìm kiếm" 
                                            style="font-weight: bold;
                                                    font-size: 1.4rem;
                                                    color: var(--primary-color);
                                                    border: 0;
                                                    background-color: #fff;
                                                    cursor: pointer;
                                                    padding: 7px 9px;
                                                    position: relative;
                                                    top: 31px;
                                                    right: -85%;">
                                            
                    <input type="text" class="header__search-input"style="border: 1px solid var(--primary-color);padding: 8px 16px;border-radius: 3px;"
                                        placeholder="Tìm kiếm theo tên sản phẩm" name="ten_sp"value="<?=!empty($value)?$value:""?>">
                </form>
                <form class="control_link-item" style="margin-right: 0;height: 0;"action="bill.php?action=return" method="POST">
                                      
                    <input type="submit" name="btnSearch" value="Trở lại" 
                                          style="font-weight: bold;
                                                  font-size: 1.4rem;
                                                  color: var(--primary-color);
                                                  border: 0;
                                                  background-color: #fff;
                                                  cursor: pointer;
                                                  padding: 7px 9px;
                                                  position: relative;
                                                  top: -48px;
                                                  right: -93%;
                                                  border-left: 2px solid;">
                                          
                </form>
                <div style="margin-top: 30px;
                            background-color: #f5f5f5;">
                        <?php
                            require_once './admin/connect.php';
                            $num=1;
                            $sql = mysqli_fetch_all($order_detail, MYSQLI_ASSOC);
                            
                            if(!empty($sql)){
                               
                                ?>

                                        <?php
                                            foreach ($sql as $row) {
                                                ?>  
                                                <div class="gide wide bill-wrap">                                
                                                    <div class=" row sm-gutter">
                                                        <div class="col l-12 m-12 c-12">
                                                            <div class=" row sm-gutter">
                                                                <div class=" col c-3 l-3 m-3">
                                                                        <?php
                                                                            $details = mysqli_query($conn, "SELECT order_detail.so_luong,product.mota,product.image
                                                                            FROM order_detail
                                                                            INNER JOIN orders ON orders.id = order_detail.id_order
                                                                            INNER JOIN product ON product.id = order_detail.id_product
                                                                            INNER JOIN customers ON customers.id = orders.id_client
                                                                                        WHERE id_order ='".$row["id"]."'");
                                                                        
                                                                            $sql1 = mysqli_fetch_all($details, MYSQLI_ASSOC);
                                                                            $details = $details->num_rows;
                                                                           
                                                                            ?>
                                                                            <div style="display: flex;margin-bottom: 25px;">
                                                                                
                                                                                <div style="display: flex;">
                                                                                    
                                                                                    <img class="img-cart img-bill" src="./image/orders.jpg">
                                                                                    <p class="quantity-bill">x<?=$details?></p>                                                  
                                                                                </div>
                                                                            
                                                                            </div>
                                                                                                         
                                                                </div>
                                                                <div class="col c-3 l-3 m-3">
                                                                    <span class="total-bill">Tổng tiền: <?=$row['tong_tien']?>đ</span>
                                                                    <br/>
                                                                    <a  href="order_detail-user.php?id=<?=$row['id']?>"class="code-link bill-detail">Xem chi tiết</a>
                                                                </div>
                                                                <?php
                                                                        $n=date('d/m/Y', $row['created_time']);
                                                                        $ngaygiao = DateTime::createFromFormat('d/m/yy', $n);
                                                                        $ngaygiao->add(new DateInterval('P3D'));

                                                                        
                                                                            
                                                                        ?>
                                                                <div class="col c-3 l-3 m-3">
                                                               
                                                                    <?php
                                                                        if($row['tinh_trang']=='Đang chờ hàng'){
                                                                            ?>
                                                                                <div class="status-bill">
                                                                                    <i class="fas fa-hourglass-start"></i>
                                                                                    <p class="status">Đang chờ lấy hàng</p>
                                                                                    
                                                                                </div>
                                                                                <p class="time-bill">Ngày đặt đơn: <?=date('d/m/Y', $row['created_time'])?></p>
                                                                                <p class="time-bill">Ngày dự kiến giao: <?php echo $ngaygiao->format('d/m/Y')?> </p>
                                                                            <?php
                                                                        }
                                                                        
                                                                        else if($row['tinh_trang']=='Đang giao hàng'){
                                                                            ?>
                                                                                <div class="status-bill">
                                                                                    <i class="fas fa-caravan"></i>
                                                                                    <p class="status">Đang vận chuyển</p>
                                                                                </div>
                                                                                <p class="time-bill">Ngày bắt đầu giao: <?=date('d/m/Y', $row['last_updated'])?></p>
                                                                                <p class="time-bill">Ngày dự kiến giao: <?php echo $ngaygiao->format('d/m/Y')?> </p>
                                                                            <?php
                                                                        }
                                                                        else if($row['tinh_trang']=='Đã giao hàng'){
                                                                            ?>
                                                                            <div class="status-bill">
                                                                                <i class="fas fa-caravan"></i>
                                                                                <p class="status">Giao hàng thành công</p>
                                                                            </div>
                                                                            <p class="time-bill">Ngày đặt đơn: <?=date('d/m/Y', $row['created_time'])?></p>
                                                                            <p class="time-bill">Ngày giao: <?= date ('d/m/Y',$row['last_updated'])?> </p>
                                                                           <?php
                                                                        }
                                                                        else if($row['tinh_trang']=='Đã hủy'){
                                                                            ?>
                                                                            <div class="status-bill">
                                                                                <i class="fas fa-ban"></i>
                                                                                <p class="status">Đã hủy</p>
                                                                            </div>
                                                                            <p class="time-bill">Ngày đặt đơn: <?=date('d/m/Y', $row['created_time'])?></p>
                                                                            <p class="time-bill">Ngày hủy: <?= date ('d/m/Y',$row['last_updated'])?> </p>
                                                                            <?php
                                                                        }
                                                                    ?>
                                                                    
                                                                    
                                                                </div>
                                                                <div class="col c-3 l-3 m-3" >
                                                                    
                                                                    <?php
                                                                        if($row['tinh_trang']=='Đang chờ hàng'){
                                                                            ?>
                                                                            <form method="POST" action="updateBill.php" class=""style="margin-top: 40px;" enctype="multipart/form-data">
                                                                                <input type="hidden" id="" name="id" value="<?=$row['id']?>"/>
                                                                                <a onclick="return confirm('bạn có muốn hủy đơn hàng này không')" href="" class="btn-remove">                                             
                                                                                    <input type="submit" name="confirm" class="btn-confirm"style="padding: 6px;width: 80%;margin-left: -17px;" value="Hủy đơn"/>
                                                                                </a>
                                                                            </form>
                                                                            <?php
                                                                        }
                                                                        else if($row['tinh_trang']=='Đang giao hàng'){
                                                                            ?>
                                                                            <form method="POST" action="updateBill2.php" class=""style="margin-top: 40px;" enctype="multipart/form-data">
                                                                                <input type="hidden" id="" name="id" value="<?=$row['id']?>"/>
                                                                                <a onclick="return confirm('Cảm ơn bạn đã xác nhận!')" href="" class="btn-remove">
                                                                                    
                                                                                    <input type="submit" name="confirm" class="btn-confirm"style="padding: 6px;width: 80%;margin-left: -17px;" value="Xác nhận lấy hàng"/>
                                                                                </a>
                                                                            </form>
                                                                            <?php
                                                                        }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php
                                    }
                                    ?>
                                <?php
                            }
                            else{
                                ?>
                                    <div style="text-align: center;">

                                        <img src="./image/no-order.png" style="width:200px;height:200px;background-color: #ccc;border-radius: 50%;animation: modalFadeInBill .4s;"/>
                                        <p style="font-size: 1.8rem;color: #bbb;">Chưa có đơn hàng</p>
                                    </div>
                                <?php
                            }
                            ?>
                    

                   
                    <div class="btn-action btn-action1">

                        <a href="./home.php" class="btn-back">
                            <i class="fas fa-arrow-left"></i>
                            <span>Back to Shopping</span>
                        </a>
                        
                    </div>

                    
                </div>  
                
                <?php
                    include './pagination.php';
                ?>
                <div class="totalRecords"style="color: var(--primary-color);text-align: end;">
                    <?php
                        if(isset($_SESSION['order'])){
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
        
    <!-- phần cuối -->
        <?php
            require_once 'footer.php';
        ?>
    </div>

</body>

</html>
<?php 
  session_start();
  ob_start();
  require_once './admin/connect.php';
    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thẻ tín dụng/ghi nợ</title>
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./gird/GirdSystem/gird.css">
    <link rel="stylesheet" href="./css/reponsive.css">
    <link rel="stylesheet" href="./css/cart.css">
    <link rel="stylesheet" href="./css/bill.css">
    <link rel="stylesheet" href="./toast/toast.css">
    
    <link rel="stylesheet" href="./css/login_register.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>
        <?php
            require_once './admin/connect.php';
           
            if (!empty($_GET['action']) && $_GET['action'] == 'submit' && !empty($_POST)) {
           
                    // if(isset($_POST['order_click'])) { 
                         if (!empty($_POST['get'])) { //Xử lý lưu giỏ hàng vào db
                           
                            $products = mysqli_query($conn, "SELECT * FROM `product` WHERE `id` IN (" . implode(",", array_keys($_POST['get'])) . ")");
                            
                            $total = 0;
                            $quantity;
                            $orderProducts = array();
                            while ($rowp = mysqli_fetch_array($products)) {
                                $orderProducts[] = $rowp;
                                $total += ($rowp['gia_goc']-($rowp['gia_goc']*$rowp['sale']/100)) * $_POST['get'][$rowp['id']];
                               
                            }
                                $insertOrder = mysqli_query($conn, "INSERT INTO `orders` (`id`, `id_client`, `ghi_chu`, `tong_tien`,`tinh_trang`, `created_time`, `last_updated`) 
                                VALUES (NULL,'". $r['id'] ."', '" . $_POST['note'] . "', '" . $total . "','Đang chờ hàng', '" . time() . "', '" . time() . "');");
                           
                            $clientID = $conn->insert_id;
                            $insertString = "";
                            foreach ($orderProducts as $key => $product) {
                                $insertString .= "(NULL, '" . $clientID . "', '" . $product['id'] . "','".($product['gia_goc']-($product['gia_goc']*$product['sale']/100))."', '" . $_POST['get'][$product['id']] . "', '" . time() . "', '" . time() . "')";
                                $quantity=$product['so_luong']-$_POST['get'][$product['id']];
                                $whereProduct=$product['id'];
                                $updateProduct= mysqli_query($conn, "UPDATE `product` set `so_luong`='$quantity' where id=$whereProduct");
                                if ($key != count($orderProducts) - 1) {
                                    $insertString .= ",";
                                    $whereProduct .=",";
                                }
                            }
                            $insertOrder = mysqli_query($conn, "INSERT INTO `order_detail` (`id`, `id_order`, `id_product`, `gia_tien`, `so_luong`,`created_time`, `last_updated`) VALUES " . $insertString . ";");
   
                            unset($_SESSION['cart']);
                            
                         }
                        header('Location: ./bill.php');
                     } 
                    // break;   
            // }
            // }
            if (!empty($_SESSION["cart"])) {
                $products = mysqli_query($conn, "SELECT * FROM `product` WHERE `id` IN (".implode(",", array_keys($_SESSION["cart"])).")");
                
            }
        ?>
       
              
                <div class="auth-form__container" style="margin: 100px 300px;
                                                        background-color: #eee;
                                                        width: 500px;
                                                        padding: 30px;">
                      <div class="auth-form__header">
                          <h3 class="auth-form__heading"style="margin-bottom: 24px;">Thẻ tín dụng/ghi nợ</h3>
                      </div>
      
                        <div class="row sm-gutter" style="font-size: 1.4rem;
                                                        margin-bottom: 20px;
                                                        background-color: #fff;
                                                        color: #6ea1ce;
                                                        padding: 4px 0;
                                                        margin-left: 0px;">
                            <?php
                                if (!empty($products)){
                                    $total = 0;
                                    while ($row = mysqli_fetch_array($products)) { 
                                        $total += ($row['gia_goc']-($row['gia_goc']*$row['sale']/100)) * $_SESSION["cart"][$row['id']];
                                        
                                            }
                                        }
                                        ?>
                                        <div class="col l-6 c-6 m-6">
                                            <p class="title">Tổng thanh toán: </p>
                                            <p class="title">Phương thức thanh toán: </p>
                                        </div>
                                        <div class="col l-6 c-6 m-6">
                                            <p><?=$total?> đ</p>
                                            <p>Thanh toán bằng thẻ tín dụng</p>
                                        </div>
                        </div>
                        
                                                        
      
                      <div class="auth-form__controls">
                          <a href="pay.php" class="btn auth-form__controls-back btn--normal" 
                            style="background-color: #aaa;font-size:1.4rem;
                            display: flex;">Trở lại</a>
                          <a href="accuracyPay.php"class="btn auth-form__controls-back btn--normal" style="background-color: var(--primary-color);
                                                                                                            font-size: 1.4rem;
                                                                                                            display: flex;
                                                                                                            color: #fff;">Thanh toán</a>
                      </div>
      
                </div>    
</body>
</html>
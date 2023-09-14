<?php 
  
//   session_start();
//    ob_start();
   
    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }

    ?>
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
        <?php
            require_once './admin/connect.php';
            
            $error = false;
            $success = false;
                if (isset($_GET['action'])) {
                    function update_cart($add = false) {
                        // var_dump($add);exit;
                        foreach ($_POST['get'] as $id => $get) {
                            if ($get == 0) {
                                unset($_SESSION["cart"][$id]);
                            } else {
                                if ($add) {
                                    $_SESSION["cart"][$id] += $get;
                                } else {
                                    $_SESSION["cart"][$id] = $get;
                                }
                            }
                        }
                    }
                   
                switch ($_GET['action']) {
                    case "add":
                        // foreach ($_POST['get'] as $id => $get) {
                        //     $_SESSION["cart"][$id] = $get;
                        // }
                        update_cart(true);
                        header('Location: ./cart.php');
                        break;
                    case "delete":
                        if(isset($_GET['id'])){
                            unset($_SESSION["cart"][$_GET['id']]);
                        }
                        header("location:cart.php");
                        break;
                    case "submit":
                        if (isset($_POST['update_click'])) { //Cập nhật số lượng sản phẩm
                            update_cart();
                            header('Location: ./cart.php');
                        }
                        else if(isset($_POST['order_click'])) { //Đặt hàng sản phẩm
                            // function function_alert($message) {   
                               
                            //        echo "<script type ='text/JavaScript'>";  
                            //        echo "alert('$message')";  
                            //        echo "</script>";   
                            //    }
                            // if (empty($_POST['name'])) {
                            //     function_alert(" Bạn chưa nhập tên  "); 
                            // } else if (empty($_POST['email'])) {
                            //     function_alert("Bạn chưa nhập email");
                            // } else if (empty($_POST['phone'])) {
                            //     function_alert("Bạn chưa nhập số điện thoại");
                            // } else if (empty($_POST['date'])) {
                            //     function_alert("Bạn chưa nhập ngày sinh");
                            // }else if (empty($_POST['gioiTinh'])) {
                            //     function_alert("Bạn chưa nhập giới tính");
                            // }else if (empty($_POST['CCCD'])) {
                            //     function_alert("Bạn chưa nhập ngày sinh");
                            // }else if (empty($_POST['address'])) {
                            //     function_alert("Bạn chưa nhập địa chỉ");
                            // }else if (empty($_POST['quantity'])) {
                            //     $error = "Giỏ hàng rỗng";
                            // }
                            if ($error == false && !empty($_POST['get'])) { //Xử lý lưu giỏ hàng vào db

                            
                                $products = mysqli_query($conn, "SELECT * FROM `product` WHERE `id` IN (" . implode(",", array_keys($_POST['get'])) . ")");
                                $total = 0;
                                $orderProducts = array();
                                while ($row = mysqli_fetch_array($products)) {
                                    $orderProducts[] = $row;
                                    $total += $row['gia_moi'] * $_POST['get'][$row['id']];
                                }
                                $accountID = $conn->insert_id;
                                $insertOrder = mysqli_query($conn, "INSERT INTO `client` (`id`, `id_account`, `ten_kh`, `email`, `sdt`, `dia_chi`, `ngay_sinh`, `cccd`,`gioi_tinh`) 
                                VALUES (NULL,'71', '" . $_POST['name'] . "', '', '" . $_POST['phone'] . "', '" . $_POST['address'] . "', '" . $_POST['date']. "', '" . $_POST['CCCD']. "', '" . $_POST['gender']."');");
                                
                                $clientID = $conn->insert_id;
                                $insertString = "";
                                foreach ($orderProducts as $key => $product) {
                                    $insertString .= "(NULL, '" . $clientID . "', '" . $product['id'] . "', '" . $_POST['get'][$product['id']] . "', '" . $product['gia_moi'] . "','Đang chờ hàng')";
                                    if ($key != count($orderProducts) - 1) {
                                        $insertString .= ",";
                                    }
                                }
                                $insertOrder = mysqli_query($conn, "INSERT INTO `orders` (`id`, `id_client`, `id_product`, `so_luong`, `tong_tien`,`tinh_trang`) VALUES " . $insertString . ";");
                                $success = "Đặt hàng thành công";
                                unset($_SESSION['cart']);
                            }
                        } 
                        break;   
                }
            }
            if (!empty($_SESSION["cart"])) {
                $products = mysqli_query($conn, "SELECT * FROM `product` WHERE `id` IN (".implode(",", array_keys($_SESSION["cart"])).")");
            }
        ?>

        <div class="app__container app_cart">
            <div class="grid wide">
                
                <div class="app_heading">
                    <h2> Danh sách sản phẩm đã thêm</h2>
                </div>

                <div class="grid wide">
                    
                        
                            <form class="cart"id="cart-form" action="cart.php?action=submit" method="POST">
                                <table class="tableListProduct">
                                    <thead>
                                        <tr>
                                            <th class="col-name">
                                                Product Name
                                            </th>
                                            <th class="col-name">
                                                Quantity
                                            </th>
                                            <th class="col-name">
                                                Subtotal
                                            </th>
                                            <th class="col-name">Total</th>
                                            <th class="col-name">Clear Cart</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list-items">
                                        <?php
                                            if (!empty($products)){
                                                $total = 0;
                                                $num = 1;
                                                while ($row = mysqli_fetch_array($products)) { 
                                                ?>
                                                <tr class="item-row" id="">
                                                    <td class="cart-item">
                                                        <img src="./admin/image/<?=$row['image']?>"
                                                            style="width: 80px;
                                                            height: 80px;" alt="" >
                                                        <div class="product">
                                                            <h2 class="product-name" style="font-size: 1.3rem;">
                                                                <?=$row['mota']?>
                                                            </h2>
                                                            <p class="product-quantity">Số lượng đang bán: <?=$row['so_luong']?></p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="select-quantity">                                      
                                                            <input class="select-quantity-screen" type="number" min="0" max="100" value="<?= $_SESSION["cart"][$row['id']] ?>"
                                                            name="get[<?= $row['id'] ?>]" />
                                                        </div>
                                                    </td>
                                                    <td class="subtotal">
                                                        <?=number_format($row['gia_moi'], 0, ",", ".")?>đ
                                                    </td>
                                                    <td class="total">
                                                        <?=number_format($row['gia_moi'] * $_SESSION["cart"][$row['id']], 0, ",", ".")?>đ
                                                    </td>
                                                    <td class="clear-cart">
                                                        <a onclick="return confirm('bạn có muốn xóa sản phẩm này không')" href="cart.php?action=delete&id=<?= $row['id'] ?>" class="btn-remove">
                                                            <i class="fas fa-trash" title="Remove item"></i>
                                                        </a>
                                                       
                                                    </td>
                                                </tr>
                                                <?php
                                                    $total += $row['gia_moi'] * $_SESSION["cart"][$row['id']];
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                        
                                <div class="total-price">
                                    <h2>Tổng tiền: </h2>
                                    
                                    <?php
                                        if(!empty($_SESSION["cart"])){
                                            echo '<h2 class="total-prices">'. $total .'</h2>';
                                            
                                        }
                                        else{
                                            ?>
                                            <h2 class="total-prices">0</h2>;
                                        <?php
                                        }
                                        
                                        ?>
                                        
                                    
                                    <h2>đ</h2>
                                </div>
                                <div class="btn-action">
            
                                    <a href="./home.php" class="btn-back">
                                        <i class="fas fa-arrow-left"></i>
                                        <span>Back to Shopping</span>
                                    </a>
                                    <input class="btn-buy btn-buyCart" type="submit" name="update_click" value="Cập nhật" />
                                </div>

                                <!-- <section class="contact-form"> -->
                                    <h2 class="text-heading">Thông tin người mua</h2>
                                    
                                    <div class="grid wide">
                                        <div class="row sm-gutter">
                                            <div class="col l-6 c-6 m-6">
        
                                                <div class="block">
                                                    <p class="text-inner">Họ và tên<span class="asterisk">*</span></p>
                                                    
                                                        <input type="text" name="name" placeholder=" Name" value="" class="name email input">
                                                    
                                                </div>
                                                <div class="block">
                                                    <p class="text-inner">Email<span class="asterisk">*</span></p>
                                                    <input type="email" name="email" placeholder=" Email" value="" class="email input">
                                                </div>
                                                <div class="block">
                                                    <p class="text-inner">Số điện thoại<span class="asterisk">*</span></p>
                                                    <input type="number" name="phone" placeholder=" Số điện thoại" class="phone-number input"></input>
                                                </div>
                                                <div class="block">
                                                    <p class="text-inner">Ngày sinh<span class="asterisk">*</span></p>
                                                    <input type="date" name="date" class="phone-number input" style="color: #757575;"></input>
                                                </div>
                                            </div>
                                            <div class="col l-6 c-6 m-6">
                                                <div class="block">
                                                    <p class="text-inner">Gioi tính<span class="asterisk">*</span></p>
                                                    
                                                    <select class="input" name="gender"class="form-control" id="exampleSelect2" required
                                                    style="width: 100%;
                                                        color: #757575;">
                                                          <option>-- Chọn giới tính --</option>
                                                          <option>Nam</option>
                                                          <option>Nữ</option>
                                                    </select>
                                                               
                                                </div>
        
                                                <div class="block">
                                                    <p class="text-inner">CCCD<span class="asterisk">*</span></p>
                                                    <input type="number" name="CCCD" class="phone-number input"></input>
                                                </div>
        
                                                <div class="block">
                                                    <p class="text-inner">Địa chỉ chi tiết<span class="asterisk">*</span></p>
                                                    <input type="text" name="address" placeholder=" Số nhà..." class="address input"></input>
                                                </div>
                                            </div>
                                        
        
                                        </div>    
                                    </div>
                                    <div class="contact-footer">
                                        <button class="btn-cancel"type="submit">Hủy</button>
                                        <input class="btn-confirm" type="submit" name="order_click"value="Đặt hàng" />
                                    </div>
                                <!-- </section> -->
                            </form>                                       
                       
                    </div>
                
            </div> 
        </div> 
        
        <!-- phần cuối -->
        <?php
            require_once 'footer.php';
        ?>
    </div>
    
    <!-- <script src="./js/cart.js"></script> -->

</body>

</html>
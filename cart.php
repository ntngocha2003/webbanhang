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
            
            
                if (isset($_GET['action'])) {
                    function update_cart($add = false) {
                        
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
                                update_cart(true);
                                header('Location: ./cart.php');
                                var_dump(($_SESSION["cart"][$id]));exit;
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
                        else if(isset($_POST['order_click'])) { 
                            if (!empty($_POST['get'])) { //Xử lý lưu giỏ hàng vào db
                                
                                $products = mysqli_query($conn, "SELECT * FROM `product` WHERE `id` IN (" . implode(",", array_keys($_POST['get'])) . ")");
                                
                                $total = 0;
                                $quantity;
                                $orderProducts = array();
                                while ($rowp = mysqli_fetch_array($products)) {
                                    $orderProducts[] = $rowp;
                                    $total += $rowp['gia_moi'] * $_POST['get'][$rowp['id']];
                                    
                                    // var_dump($quantity);exit;
                                }
                                    $insertOrder = mysqli_query($conn, "INSERT INTO `client_order` (`id`, `id_account`, `ghi_chu`, `tong_tien`,`tinh_trang`, `created_time`, `last_updated`) 
                                    VALUES (NULL,'". $r['id'] ."', '" . $_POST['note'] . "', '" . $total . "','Đang chờ hàng', '" . time() . "', '" . time() . "');");
                               
                                $clientID = $conn->insert_id;
                                $insertString = "";
                                foreach ($orderProducts as $key => $product) {
                                    $insertString .= "(NULL, '" . $clientID . "', '" . $product['id'] . "','" . $product['gia_moi'] . "', '" . $_POST['get'][$product['id']] . "', '" . time() . "', '" . time() . "')";
                                    $quantity=$product['so_luong']-$_POST['get'][$product['id']];
                                    $whereProduct=$product['id'];
                                    $updateProduct= mysqli_query($conn, "UPDATE `product` set `so_luong`='$quantity' where id=$whereProduct");
                                    if ($key != count($orderProducts) - 1) {
                                        $insertString .= ",";
                                        $whereProduct .=",";
                                    }
                                }
                                $insertOrder = mysqli_query($conn, "INSERT INTO `orders` (`id`, `id_client`, `id_product`, `gia_tien`, `so_luong`,`created_time`, `last_updated`) VALUES " . $insertString . ";");

                               
                                
                                unset($_SESSION['cart']);
                            }
                            header('Location: ./bill.php');
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
                                                Thông tin sản phẩm
                                            </th>
                                            <th class="col-name">
                                                Số lượng mua
                                            </th>
                                            <th class="col-name">
                                                Đơn giá
                                            </th>
                                            <th class="col-name">Tổng đơn giá</th>
                                            <th class="col-name">Xóa bỏ</th>
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
                                                            <input class="select-quantity-screen" type="number" min="0" max="<?=$row['so_luong']?>" value="<?= $_SESSION["cart"][$row['id']] ?>"
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

                                
                                    <h2 class="text-heading">Thông tin người mua</h2>
                                    
                                    <div class="grid wide">
                                        
                                            <div class="">
                                                <p class="text-inner">Họ và tên: <?php echo $r['ten_dn']?></p>
                                            </div>
                                            
                                            <div class="">
                                                <p class="text-inner">Số điện thoại: <?php echo $r['sdt']?></p>
                                            </div>
                                            
                                            <div class="">
                                                <p class="text-inner">Địa chỉ chi tiết: <?php echo $r['dia_chi']?></p>
                                            </div>
                                          
                                    </div>
                                    <div>
                                        <label class="text-inner">Ghi chú: </label>
                                        <textarea class="text-inner" name="note" cols="50" rows="7" ></textarea>
                                    </div>
                                    <div class="contact-footer">
                                        <a href="account.php?id=<?php echo $r['id'];?>" style="color: #6fcef7;
                                                                    font-size: 1.4rem;
                                                                   ">Thay đổi</a>
                                        <input class="btn-confirm" type="submit" name="order_click"value="Đặt hàng" />
                                    </div>
                                
                            </form>                                       
                       
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
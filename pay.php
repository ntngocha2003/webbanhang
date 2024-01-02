<?php 
  
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
    <link rel="stylesheet" href="./toast/toast.css">
    <link rel="stylesheet" href="./gird/GirdSystem/gird.css">
    <link rel="stylesheet" href="./css/reponsive.css">
    <link rel="stylesheet" href="./css/cart.css">
    <link rel="stylesheet" href="./css/bill.css">
    <link rel="stylesheet" href="./css/product.css">
    <link rel="stylesheet" href="./css/acc.css"><link rel="stylesheet" href="./css/login_register.css">
    <link rel="stylesheet" href="./admin/css/addStaff.css">
    <link rel="stylesheet" href="./admin/css/addProduct.css">
    <link rel="stylesheet" href="./font/themify-icons/themify-icons.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400, 500, 700display=swapsubset=vietnamese" rel="stylesheet">
</head>
<body>
    <div class="app">

        <?php
            
            require_once 'header.php';
        ?>
    <!-- phần nội dung -->

    <?php
            require_once './admin/connect.php';
           
            if (!empty($_GET['action']) && $_GET['action'] == 'submit' && !empty($_POST)) {
           
                         if (!empty($_POST['get'])) { //Xử lý lưu giỏ hàng vào db
                           
                            $products = mysqli_query($conn, "SELECT * FROM `product` WHERE `id` IN (" . implode(",", array_keys($_POST['get'])) . ")");
                           
                            $total = 0;
                            $quantity;
                            $orderProducts = array();
                            while ($rowp = mysqli_fetch_array($products)) {
                                
                                $orderProducts[] = $rowp;
                                $total += ($rowp['gia_goc']-($rowp['gia_goc']*$rowp['sale']/100)) * $_POST['get'][$rowp['id']];
                               
                            }
                                $insertOrder = mysqli_query($conn, "INSERT INTO `orders` (`id`, `id_staff`,`id_client`, `ghi_chu`, `tong_tien`,`tinh_trang`, `created_time`, `last_updated`) 
                                VALUES (NULL,Null,'". $r['id'] ."' ,'', '" . $total . "','Đang chờ hàng', '" . time() . "', '" . time() . "');");
                           
                            $clientID = $conn->insert_id;
                            $insertOrder = mysqli_query($conn, "INSERT INTO `payment` (`id`, `id_client`, `id_order`, `phuong_thuc`,`trang_thai`,`tong_tien`, `created_time`) 
                                VALUES (NULL,'". $r['id'] ."', '" . $clientID .  "','Thanh toán bằng tiền mặt' ,'Chưa thanh toán','" . $total . "', '" . time() . "');");
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
                         header('Location: ./paySuccess.php');
                     } 
                   
            if (!empty($_SESSION["cart"])) {
                $products = mysqli_query($conn, "SELECT * FROM `product` WHERE `id` IN (".implode(",", array_keys($_SESSION["cart"])).")");
                
            }
        ?>

    
        <div class="app__container"style="margin-top: 160px;">
            <div class="grid wide">
                <div class="row sm-gutter">
                    <div class="col l-12 m-12 c-12">

                        <div class="home-product">
                                    <h1 class="info-user" style="background-color: #fff;
                                                                height: 50px;
                                                                line-height: 50px;
                                                                padding-left: 20px;">
                                    Trang thanh toán</h1>
                                        
                                    <form class="contact-content" action="pay.php?action=submit" method="POST">
                                        
                                            <div class="row sm-gutter product-item product-block" style="padding: 10px;background-color: #f5f5f5;">
                                                <div class="col l-8 m-8 c-8">
                                                    <div class="col l-12 m-12 c-12" style="background-color: #fff;
                                                                                            padding: 15px;
                                                                                            margin-bottom: 20px;
                                                                                            border-radius: 5px;">
                                                        <div class="product-img">
                                                                <h2 class="title-user">Chọn hình thức giao hàng</h2>
                                                                <input type="hidden" id="" name="id" value="<?php echo $r['id']?>">
                                                                <div class="ad-user" style="margin-bottom:30px">
                                                                    <div>
                                                                        <input type="radio" checked=true class="form-check-input" name="radio">
                                                                        <label class="form-check-label"> Giao tiết kiệm
                                                                    </div>
                                                                </div>
                                                
                                                                <div style="margin-top: 20px;
                                                                            padding: 5px;
                                                                            border: 1px solid #ddd;
                                                                            border-radius: 5px;
                                                                            color: #bbb;
                                                                            position: relative;
                                                                            ">
                                                                    <div style="display: flex;
                                                                                -webkit-box-align: center;
                                                                                align-items: center;
                                                                                font-size: 14px;
                                                                                line-height: 20px;
                                                                                color: var(--primary-color);
                                                                                padding: 0px 4px;
                                                                                background-color: rgb(255, 255, 255);
                                                                                position: absolute;
                                                                                top: 0px;
                                                                                left: 12px;
                                                                                transform: translateY(-50%);
                                                                            ">
                                                                        <p>Shop dự kiến giao trước 19h ; trong ngày: </p>
                                                                        <?php
                                                                            $n=date('d/m/Y', time());
                                                                            $ngaygiao = DateTime::createFromFormat('d/m/yy', $n);
                                                                            $ngaygiao->add(new DateInterval('P3D'));

                                                                            echo $ngaygiao->format('d/m/Y'); 
                                                                            
                                                                        ?>
                                                                    </div>
                                                                    
                                                                    <?php
                                                                        if (!empty($products)){
                                                                            $total = 0;
                                                                            $num = 1;
                                                                            while ($row = mysqli_fetch_array($products)) { 
                                                                                $total += ($row['gia_goc']-($row['gia_goc']*$row['sale']/100)) * $_SESSION["cart"][$row['id']];
                                                                            ?>
                                                                            <div class="item-row" id="" style="margin-top: 20px;">
                                                                                <div class="cart-item">
                                                                                    <img src="./admin/image/<?=$row['image']?>"
                                                                                        style="width: 80px;
                                                                                        height: 80px;" alt="" >
                                                                                    <div class="product">
                                                                                        <h2 class="product-name" style="font-size: 1.3rem;color:#bbb">
                                                                                            <?=$row['mota']?>
                                                                                        </h2>
                                                                                        <p style="font-size:1.3rem">Số lượng: x<?= $_SESSION["cart"][$row['id']] ?></p>
                                                                                        <input class="select-quantity-screen" type="hidden" min="0" max="<?=$row['so_luong']?>" value="<?= $_SESSION["cart"][$row['id']] ?>"
                                                                                            name="get[<?= $row['id'] ?>]" />
                                                                                    </div>

                                                                                    
                                                                                </div>
                                                                                
                                                                                <div style="margin-left: 85px;
                                                                                            font-size: 1.4rem;
                                                                                            color: #7eb7e9;
                                                                                            font-weight: 600;"> 
                                                                                    <p>Đơn giá: <?=number_format(($row['gia_goc']-($row['gia_goc']*$row['sale']/100)) * $_SESSION["cart"][$row['id']], 0, ",", ".")?></p>
                                                                                </div>
                                                                            </div>
                                                                            <?php
                                                                            
                                                                            }
                                                                        }
                                                                    ?>
                                                                </div>
                                                                <div class="form-check-inline" style="background-color: #f5f5f5;
                                                                                                color: #aaa;
                                                                                                text-align: center;
                                                                                                margin-top: 20px;
                                                                                                display: flex;">
                                                                    <i class="fas fa-caravan" style="display: block;
                                                                                                    margin-top: 15px;
                                                                                                    margin-left: 10px;
                                                                                                    margin-right: 4px;"></i>
                                                                    <p >Được giao bởi NgocHa_shop</p>
                                                                </div>
                                                                
                                                        </div>
                                                    </div>
                                                    <div class="col l-12 m-12 c-12"style="background-color: #fff;
                                                                                            padding: 15px;
                                                                                            margin-bottom: 10px;
                                                                                            border-radius: 5px;">
                                                        <h2 class="title-user">Chọn hình thức thanh toán</h2>
                                                        <div class="ad-user" style="margin-bottom: 10px;">
                                                            <div>
                                                                <input type="radio" id="pay"class="form-check-input" name="radio_pay">
                                                                <img src="./image/pay_cart.png" style="width: 10%;
                                                                                                        height: 10%;" alt="icon">
                                                                <label class="form-check-label"> Thanh toán bằng tiền mặt sau khi nhận hàng
                                                                <input type="button" class="form-check-input jsCheckRadio"style="background-color: var(--primary-color);
                                                                                                                                    border: 1px solid var(--primary-color);
                                                                                                                                    border-radius: 3px;
                                                                                                                                    color: #fff;
                                                                                                                                    cursor: pointer;" value='Chọn'>
                                                            </div>
                                                            
                                                        </div>
                                                        

                                                        <div class="ad-user" style="margin-bottom: 10px;">
                                                            <div>
                                                                <input type="radio"id="pay2" class="form-check-input" name="radio_pay">
                                                                <img src="./image/visa.png" style="width: 10%;
                                                                                                        height: 10%;" alt="icon">
                                                                <label class="form-check-label"> Thanh toán thẻ tín dụng/ghi nợ
                                                                <input type="button" class="form-check-input jsCheckRadio2"style="background-color: var(--primary-color);
                                                                                                                                    border: 1px solid var(--primary-color);
                                                                                                                                    border-radius: 3px;
                                                                                                                                    color: #fff;
                                                                                                                                    cursor: pointer;" value='Chọn'>
                                                                <?php
                                                                    $payments="select distinct *from payment where payment.id_client='".$r['id']."' and payment.phuong_thuc ='Thanh toán bằng thẻ tín dụng'";
                                                                    $result=mysqli_query($conn,$payments); 
                                                                    $sql = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                                                
                                                                    ?>
                                                                    <div class="show-card">
                                                                        <img src="./image/visa_pay.png" style="width: 10%;height: 10%;margin-right: 10px;" alt="icon">
                                                                        <p>MILYTARY COMMERCIAL JSB...</p>
                                                                    </div>
                                                                    <?php
                                                                  
                                                                    foreach ($sql as $row) {
                                                                       
                                                                       
                                                                    }
                                                                    if( (isset($row['id_client']))&& ($row['phuong_thuc']=='Thanh toán bằng thẻ tín dụng')){
                                                                        echo'
                                                                            <div class="show-card"style="display:flex">
                                                                                <img src="./image/visa_pay.png" style="width: 10%;height: 10%;margin-right: 10px;" alt="icon">
                                                                                <p>MILYTARY COMMERCIAL JSB...</p>
                                                                            </div>
                                                                        
                                                                        ';
                                                                    }
                                                                    else{
                                                                        echo'
                                                                        <button type="button" class="btn-payvisa">+ Thêm thẻ mới</button>';
                                                                    }
                                                                ?>
                                                            </div>
                                                        </div>

                                                        

                                                    </div>
                                                </div>
                                                <div class="col l-4 m-4 c-4">
                                                    <div style="background-color: #fff;
                                                                                            padding: 15px;
                                                                                            margin-bottom: 20px;
                                                                                            border-radius: 5px;">
                                                        <h2 class="title-user">Giao tới</h2>
                                                        <div class="">
                                                            <p class="text-inner"style="color:#000"><?php echo $r['ten_dn']?> 
                                                                <span style="color: #000;
                                                                            border-left: 2px solid #757575;
                                                                            padding-left: 4px;">0<?php echo $r['sdt']?></span>
                                                            </p>
                                                            
                                                            <p class="text-inner"><?php echo $r['dia_chi']?></p>
                                                            
                                                        </div>
                                                        <div class="ad-user" style="margin-bottom: 10px;">
                                                            <div>
                                                                <a href="account.php" style="color: var(--primary-color);">Thay đổi</a>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>

                                                    <div style="background-color: #fff;color: var(--primary-color);
                                                                                            padding: 15px;
                                                                                            margin-bottom: 20px;
                                                                                            border-radius: 5px;">
                                                          
                                                        <div style="display: flex;
                                                                    justify-content: space-between;
                                                                    border-bottom: 1px solid var(--primary-color);">

                                                            <h2>Đơn hàng</h2>
                                                            <a href="cart.php?id=<?php echo $r['id']; ?>" style="color: #6fcef7;
                                                                                                                font-size: 1.4rem;
                                                                                                                text-align: center;
                                                                                                                line-height: 2.5;
                                                                   ">Thay đổi</a>
                                                                   
                                                        </div>
                                                        <div class="row sm-gutter" style="font-size: 1.4rem;">
                                                            <div class="col l-6 c-6 m-6">
                                                                <p class="title">Tạm tính: </p>
                                                                <p class="title">Phí vận chuyển: </p>
                                                                <p class="title">Tổng tiền: </p>
                                                                
                                                            </div>
                                                            <div class="col l-6 c-6 m-6">
                                                                <p><?=$total?> đ</p>
                                                                <p>0 đ</p>
                                                                <p><?=$total?> đ</p>
                                                            </div>
                                                        </div>
                                                        
                                                            
                                                    </div>

                                                        <div class="contact-footer" style="float: right;
                                                                                            padding-top: 20px;
                                                                                            width:100%">
                                                            
                                                            
                                                            <input class="btn btn-add--order btn-order"style="font-size:1.4rem;width:100%" type="submit" name="order_click"value="Đặt hàng" />
                                                            <a href="payCard.php" class="btn btn-add--order btn-payCard--order" 
                                                                                        style="font-size:1.4rem;width:100%;text-align: center;
                                                                                        display: none;
                                                                                        ">Đặt hàng</a>
                                                        </div>
                                                        <div class="auth-form__aside">
                                                            <p class="auth-form__policy-text">
                                                                Nhấn vào "Đặt hàng" đồng nghĩa với việc bạn đã đồng ý với 
                                                                Ngọc Hà_shop về
                                                                <a href="" class="auth-form__text-link">Điều khoản dịch vụ</a>&
                                                                <a href="" class="auth-form__text-link">Chính sách bảo mật</a>
                                                            </p>
                                                        </div>
                                                </div>

                                            </div>
                                            
                                    </form>

                               

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
    <div id="toast"></div>

    <div class="modal js-modal">
            <div class="modal-container js-modal-container">
                <header class="modal-header">
                <h2 class="text-heading">
                    <i class='bx bxs-shopping-bags'></i>
                    Thêm thẻ tín dụng/ghi nợ quốc tế
                </h2>
                </header>
                <div class="modal-body">
                    <div class="grid wide">
                        <div class="row sm-gutter">
                            <div class="col l-12 m-12 c-12">
                                <div class="row sm-gutter product-item product-block" style="padding: 15px;background-color: #f5f5f5;">
                                    <div class="col l-6 m-6 c-6">
                                        <div class="group group-card">

                                            <label for="sothe">Số thẻ:</label>
                                            <input type="text" id="numberCard" class=" form-control-card" name="sothe" placeholder="VD: 1234 4567 4321 3456">
                                            <span class="message messageNumber">
                                                
                                            </span>
                                        </div> 

                                        <div class="group group-card">

                                            <label for="tenthe">Tên chủ thẻ:</label>
                                            <input type="text" id="nameCard" class=" form-control-card" name="tenthe" placeholder="VD: Bùi Trung Duy">
                                            <span class="message messageName">
                                               
                                            </span>
                                        </div> 

                                        <div class="group group-card">

                                            <label for="ngaythe">Ngày hết hạn</label>
                                            <input type="text" id="dateCard" class="form-control-card" name="ngaythe" placeholder="MM/YY">
                                            <span class="message messageDate">
                                                
                                            </span>
                                        </div> 

                                        <div class="group group-card">

                                            <label for="mathe">Mã CVV</label>
                                            <input type="text"id="codeCard" class="form-control-card" name="mathe" placeholder="VD: 123">
                                            <span class="message messageCode">
                                                
                                            </span>
                                        </div> 
                                        
                                        
                                    </div>
                                    <div class="col l-6 m-6 c-6">
                                                            
                                        <div class="background-card">

                                            <div>
                                                <img src="./image/qr_card2.jpg" style="width: 15%;height: 15%;margin-top: 20px;margin-left: 20px;border-radius: 3px;" alt="icon">
                                            </div>
                                            <div style="display: flex;margin: 15px 0 25px 0;">
                                                <span class="number-card">.... .... .... ....</span>
                                                <!-- <span class="number-card">....</span>
                                                <span class="number-card">....</span>
                                                <span class="number-card">....</span> -->

                                            </div>

                                            <div class="date-card">
                                                <p class="myCard">TÊN CHỦ THẺ</p>
                                                <div style="display:flex">
                                                    <p>Hiệu lực đến:</p>
                                                    <p class="myCardDate">../..</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                <div class="modal-footer">
                    <p class="drection-card">NgocHa_Shop không trực tiếp lưu thẻ của bạn. Để đảm bảo an toàn, thông tin thẻ của bạn chỉ được lưu bởi CyberSource, 
                        công ty quản lý thanh toán lớn nhất thế giới (thuộc tổ chức VISA)</p>
                    <div class="btn-card">
                        <button class="btn btn--normal btn-payclose" style="background-color: #aaa;margin-right:10px
                            ">Trở lại</button>
                        <button class="btn btn--primary btn-paycard">Xác nhận</button>
                    </div>
                </div>
            </div>
    </div>

    

    <script src="./js/toast.js"></script>
    <script src="./js/bill.js"></script>
    <script>
        var checkbox = document.querySelector('.jsCheckRadio');
        var radio = document.getElementById("pay");
        function checkRadio(){

            radio.checked = true
            btnOrder.style.display='block'
            btnPayCardOrder.style.display='none'
        }

        checkbox.addEventListener('click',checkRadio)
// 
        var checkbox2 = document.querySelector('.jsCheckRadio2');
        var radio2 = document.getElementById("pay2");
        function checkRadio2(){

            radio2.checked = true
            btnOrder.style.display='none'
            btnPayCardOrder.style.display='block'
        }

        checkbox2.addEventListener('click',checkRadio2)
    </script>
</body>
</html>
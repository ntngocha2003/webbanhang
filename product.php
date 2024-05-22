
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
    <link rel="stylesheet" href="./css/product.css">

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
                 $result = mysqli_query($conn, "SELECT * FROM `product` WHERE `id` = ".$_GET['id']);
                 $product = mysqli_fetch_assoc($result);

              
        ?>

        <div class="app__container"style="margin-top: 160px;">
            <div class="grid wide">
                <div class="row sm-gutter app__content">
                    <div class="col l-12 m-12 c-12">

                        <div class="home-product">
                            <div class="row sm-gutter product-item product-block">
                                <div class="col l-5 m-12 c-12">
                                    <div class="product-img">
                                        <img class="img-link" src="./admin/image/<?=$product['image']?>">
                                    </div>
                                </div>

                                <div class="col l-7 m-12 c-12">
                                    <h1 class="product-heading"><?=$product['mota']?></h1>
                                    <p class="quantity-sold">Số lượng hàng: <span class="quantity"><?=$product['so_luong']?></span></p>

                                    <form class="product-btn" id="add-to-cart-form" action="cart.php?action=add&id=<?= $product['id'] ?>" method="POST">
                                    
                                        <div class="product-item-price-wrap">
                                            <p class="product-item-price">Gía bán: <span class="price"><?=$product['gia_goc']-($product['gia_goc']*$product['sale']/100)?></span>đ</p>
                                            <p class="number">số lượng: </p>
                                            <input class="product-item-number" type="number" min="1" max="<?=$product['so_luong']?>" value="1"name="get[<?=$product['id']?>]">
                                            
                                        </div>
                                        <div class="product-item-size">
                                            <p class="size">Size:</p>
                                            <button class="product-variation" aria-label="M">FREESIZE</button>
                                            
                                        </div>

                                        <div class="product-transport">
                                            <p class="transport">Vận chuyển: </p>
                                            <div class="product-transport--free">
                                                <img class="img-free" src="./image/freeship.png">
                                                <p class="">Miễn phí vẫn chuyển</p>
                                            </div>
                                        </div>
                                        <?php
                                            if(isset($_SESSION['name'])){
                                                if($product['so_luong']>0){
                                                    
                                                   ?>
                                                    <input onclick="return confirm('Sản phẩm đã thêm thành công vào giỏ hàng')" type="submit" class="btn btn-add btn-add--cart" value="Thêm vào giỏ hàng" name="buyCart">
                                                  <?php
                                                   
                                                }
                                                else{
                                                    ?>
                                                        <h2 style="margin: 20px 0;
                                                                color: red;">
                                                                <i class="fas fa-exclamation-circle"></i>
                                                                    Sản phẩm này hiện đã hết hàng
                                                                <h2>
                                                    <?php
                                                }
                                                
                                            }
                                            else{
                                                ?>
                                                    <h2 style="margin: 20px 0;
                                                                color: #FFCC00;">
                                                                <i class="fas fa-exclamation-circle"></i>
                                                                Bạn cần thực hiện đăng ký hoặc đăng nhập tài khoản để mua hàng
                                                                <h2>
                                                    <a href="./registerClient.php" class="btn" style="background-color:#ccc; margin-right: 20px;">Đăng ký</a>
                       
                                                    <a href="./loginClient.php" class="btn btn--primary btn-login">Đăng nhập</a>
                                            <?php
                                            }
                                        ?>
                                    </form>
                                    
                                    <div class="product-ensure">
                                        <p class="product-item-ensure">NgọcHà_shop đảm bảo</p>
                                        <p class="product-item-time">3 ngày trả hàng / hoàn tiền</p>
                                    </div>
                                </div>

                            </div>
                            <div class="btn-action btn-action1">

                                <a href="./home.php" class="btn-back">
                                    <i class="fas fa-arrow-left"></i>
                                    <span>Back to Shopping</span>
                                </a>
                                
                            </div>
                            

                            <h2 class="product-description--heading">Chi tiết sản phẩm</h2>
                            <div class="row sm-gutter product-description">
                                <div class="col l-2 c-2 m-2">
                                    <p class="title">Đến từ: </p>
                                    <p class="title">Hàng chính hãng: </p>
                                    <p class="title">Công dụng: </p>
                                    <p class="title">Chi tiết: </p>
                                </div>
                                <div class="col l-10 c-10 m-10">
                                    <p>Việt Nam</p>
                                    <p>Có</p>
                                    <p>Tạo cho bạn cảm giác thoải mái nhất bất cứ lúc nào, khi sợ hữu những bộ quần của chúng tôi</p>
                                    <p>Sản phẩm được sản xuất và kiểm duyệt vô cùng nghiêm ngặt, khiến bạn yên tâm khi sử dụng</p>
                                </div>

                            </div>

                            <!-- <div class="gird wide">
                                <div class="app_heading">
                                    <h2>Sản phẩm liên quan</h2>
                                </div>
                                <div class="row sm-gutter app__content">

                                    <div class="col l-12 m-12 c-12">

                                        <div class="home-product">
                                            <div class="row sm-gutter product-item">
                                                <?php
                                                    $like=$product['ten_sp'];
                                                  
                                                    $id=$product['id'];

                                                    $result2 = mysqli_query($conn, "SELECT product.*,category.ten_dm
                                                    FROM `product`
                                                    INNER JOIN category ON category.id = product.id_dm
                                                    where ten_sp='$like'
                                                    ");
                                                    $row2 = mysqli_fetch_array($result2);
                                                    var_dump($row2['ten_dm']);

                                                    $result1 = mysqli_query($conn, "SELECT product.*,category.ten_dm
                                                                FROM `product`
                                                                INNER JOIN category ON category.id = product.id_dm
                                                                where ten_dm='".$row2['ten_dm']."'
                                                                ");
                                                    
                                                    while ($row = mysqli_fetch_array($result1)) { 
                                                       
                                                        ?>
                                                        <div class="col l-2 m-4 c-6">
                                                            <a class="home-product-item" href="product.php?id=<?= $row['id'] ?>">
                                                                <div>
                                                                    <img src="./admin/image/<?php echo $row['image']?>" class="home-product-item__img">
                                                                </div>
                                                                <h4 class="home-product-item__name"> <?php echo $row['mota'];?></h4>
                                                                <div class="home-product-item__price">
                                                                    <span class="home-product-item__price-old"> <?php echo $row['gia_goc'];?>đ</span>
                                                                    <span class="home-product-item__price-current"> <?php echo $row['gia_goc']-($row['gia_goc']*$row['sale']/100)?>đ</span>
                                                                </div>
                                                                <div class="home-product-item__action">
                                                                                                
                                                                <?php
                                                                    if($row['so_luong']>0){
                                                                        ?>
                                                                            <span class="home-product-item__sold">Còn hàng</span>
                                                                            <div class="home-product-item--add">
                                                                                <i class="home-product-item--icon fas fa-cart-plus" id=""></i>
                                                                            </div>
                                                                        <?php
                                                                    }
                                                                    else{
                                                                        ?>
                                                                            <span class="home-product-item__sold"style="color:red;">Hết hàng</span>
                                                                        <?php
                                                                    }
                                                                ?> 
                                                                </div>
                                                                <?php
                                                                    if($row['ten_dm']=="Yêu thích"){
                                                                        ?>
                                                                        <div class="div home-product-item__favourite">
                                                                            <i class="fas fa-check"></i>
                                                                            <span>Yêu thích</span>
                                                                        </div>
                                                                        <div class="home-product-item__sale-off">
                                                                            <span class="home-product-item__sale-off-percent"> <?php echo $row['sale'];?>%</span>
                                                                            <span class="home-product-item__sale-off-label">GIẢM</span>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                ?>
                                                                

                                                            </a>
                                                        </div>
                                                        
                                                        <?php    
                                                    }
                                                    ?>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div> -->
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
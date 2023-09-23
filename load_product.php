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
    <link rel="stylesheet" href="./toast/toast.css">
    
    <link rel="stylesheet" href="./css/login_register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="./font/themify-icons/themify-icons.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400, 500, 700display=swapsubset=vietnamese" rel="stylesheet">

    
</head>
<body>

   
    <div class="app">
        <!-- phần đầu -->
        <?php
            require_once 'header.php';
        ?>
        

        <!-- note -->
        <div class="grid wide">

            <div class="header-note">
                <p>Giao hàng tận nơi, an tâm mọi nhà, thoải mái mua sắm, không lo về giá</p>
            </div>
        </div>
       
        <!-- phần nội dung -->
        <div class="app__container">
            <div class="grid wide">
                <div class="app_heading">
                    <h2>Danh sách các loại quần áo nam</h2>
                </div>
                
                        <div class="row sm-gutter app__content">
                            

                        <div class="col l-12 m-12 c-12">

                            <div class="home-product">
                                <div class="row sm-gutter product-item">
                                    <?php
                                       
                                        require_once './admin/connect.php';
                                        $id=$_GET['id'];
                
                                        $query = "select * from product where ten_dm='$id' and ten_dm !='29'";

                                        $sql = mysqli_query($conn,$query);
                                        
                                        while($r=mysqli_fetch_assoc($sql)){
                                    ?>
                                    <div class="col l-2 m-4 c-6">
                                        <a class="home-product-item" href="product.php?id=<?= $r['id'] ?>">
                                            <div>
                                                <img src="./admin/image/<?php echo $r['image']?>" class="home-product-item__img">
                                            </div>
                                            <h4 class="home-product-item__name"> <?php echo $r['mota'];?></h4>
                                            <div class="home-product-item__price">
                                                
                                                <span class="home-product-item__price-current">Gía bán: <?php echo $r['gia_moi'];?>đ</span>
                                            </div>
                                            <div class="home-product-item__action">
                                                <?php
                                                    if($r['so_luong']>0){
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
                                            
                                            
                                        </a>
                                    </div>

                                    <?php
                                    
                                        }
                                        ?>
                                </div>
                               
                            </div>
                            
                        </div>  
    
            </div> 
        </div> 
        <!-- <?php
                include 'pagination.php';
                ?> -->
    <!-- phần cuối -->
        
        <?php
            require_once 'footer.php';
        ?>
        
    </div>
    <!-- modal đăng nhập , đăng ký -->
    
        

        <!-- toast message -->
        <div id="toast"></div>

        <script src="./js/cart.js"></script>
        <!-- <script src="./js/login_register.js"></script>
        <script src="./js/toast.js"></script> -->
        <script src="./js/section.js"></script>

</body>

</html>
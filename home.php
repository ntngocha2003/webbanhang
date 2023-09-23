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
        <!-- slider -->

        <div class="grid wide">

            <div class="row sm-gutter" style="background-color: #f5f5f5">
     
                <div class="col c-8 l-8 m-8 slideshow-container">
                    <div class="mySlider fade">
                        <img src="./image/aodep.jpeg" style="width:100%" />
                        <div class="text">Caption one</div>
                    </div>
                    <div class="mySlider fade">
                        <img src="./image/qanam4.jpg" style="width:100%" />
                        <div class="text">Caption Two</div>
                    </div>
                    <div class="mySlider fade">
                        <img src="./image/qate.jpg" style="width:100%" />
                        <div class="text">Caption Three</div>
                    </div>
                    <div>
                        <a class="prev" onclick="plusSlider(-1)">❮</a>
                        <a class="next" onclick="plusSlider(1)">❯</a>
                    </div>
                    <div style="margin: 10px 0 0 46%">
                        <span class="dot" onclick="currentSlider(1)"></span>
                        <span class="dot" onclick="currentSlider(2)"></span>
                        <span class="dot" onclick="currentSlider(3)"></span>
                    </div>
                  
                </div>
     
                <div class="col l-4 c-4 m-4 slider-fixed">
                 <div class="slider-position">
                     <img src="./image/boqanam.jpg" />
                 </div>
                 <div class="slider-position">
                     <img src="./image/vay.webp"/>
                 </div>
                </div>
            </div>
        </div>


        <!-- phần nội dung -->
        <div class="app__container">
            <div class="grid wide">
                <div class="app_heading">
                    <h2>Gợi ý hôm nay</h2>
                </div>
                <!-- tìm kiếm -->
                <?php
                        
                    if(isset($_REQUEST['btnSearch'])){
                        $search = addslashes($_GET['search']);
                        if($search==""){
                            echo "<p style='color:red';>Bạn chưa nhập từ khóa!!!</p>";
                                            
                        }
                        else{
                            require_once './admin/connect.php';
                            $query = "select * from product where ten_sp like '%$search%'";
                            $sql = mysqli_query($conn,$query);
                            $num = mysqli_num_rows($sql);

                            if($num<=0){
                                echo "<p style='color:red;'>Không có ket qua tra ve voi tu khoa <b>$search</b></p>";
                            }
                                            
                            else if ($num > 0 && $search != "")
                            {
                                // Dùng $num để đếm số dòng trả về.
                                echo "<p style='color:var(--primary-color);'>$num ket qua tra ve voi tu khoa <b>$search</b></p>";
                                ?>
                                    <div class="row sm-gutter app__content">
                    

                                        <div class="col l-12 m-12 c-12">

                                            <div class="home-product">
                                                <div class="row sm-gutter product-item"> 

                                                    <?php
                                                        require_once './admin/connect.php';
                                                        
                                                        $query = "select * from product where ten_sp like '%$search%'";
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
                                                                            <span class="home-product-item__price-old"> <?php echo $r['gia_goc'];?>đ</span>
                                                                            <span class="home-product-item__price-current"> <?php echo $r['gia_moi'];?>đ</span>
                                                                        </div>
                                                                        <div class="home-product-item__action">
                                                                                                        
                                                                            <span class="home-product-item__sold">Quanttity: <?php echo $r['so_luong'];?></span>
                                                                            <div class="home-product-item--add">
                                                                                <i class="home-product-item--icon fas fa-cart-plus" id=""></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="div home-product-item__favourite">
                                                                            <i class="fas fa-check"></i>
                                                                            <span>Yêu thích</span>
                                                                        </div>
                                                                        <div class="home-product-item__sale-off">
                                                                            <span class="home-product-item__sale-off-percent"> <?php echo $r['sale'];?>%</span>
                                                                            <span class="home-product-item__sale-off-label">GIẢM</span>
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
                                                    

                            <?php           
                                                            
                            }           
                        }
                    }
                    else{
                        require_once 'contentHome.php';
                    }
                        
                ?>  
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
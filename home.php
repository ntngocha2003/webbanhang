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
    <link rel="stylesheet" href="./admin/css/renderStaff.css">    
    <link rel="stylesheet" href="./css/login_register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="./font/themify-icons/themify-icons.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400, 500, 700display=swapsubset=vietnamese" rel="stylesheet">

    
</head>
<body>

   
    <div class="app">
        <!-- phần đầu -->
        <?php
        $param = "";
       
            require_once 'header.php';
            var_dump($_SESSION['pass']);
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
               
                
                    //Tìm kiếm
                    $search = isset($_POST['search']) ? $_POST['search'] : "";
                    if ($search) {
                        $where = "WHERE `ten_sp` LIKE '%" . $search . "%'";
                        $param .= "search=".$search."&";                  
                    }
                
                    include './admin/connect.php';
                    $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 12;
                    $current_page = !empty($_GET['page']) ? $_GET['page'] : 1; //Trang hiện tại
                    $offset = ($current_page - 1) * $item_per_page;
                    
                    if ($search) {
                        $products = mysqli_query($conn, "SELECT category.ten_dm, product.*
                        FROM category
                        INNER JOIN product ON category.id = product.id_dm
                        WHERE `ten_sp` LIKE '%" . $search . "%'   LIMIT " . $item_per_page . " OFFSET " . $offset);
                        $totalRecords = mysqli_query($conn, "SELECT * FROM `product` WHERE `ten_sp` LIKE '%" . $search . "%'");
                        $totalRecords = $totalRecords->num_rows;
                        $totalPages = ceil($totalRecords / $item_per_page);

                        ?>
                        
                                <div class="totalRecords"style="color: #bbb;text-align: start; margin-top:5px">
                                        <?php
                                            if($param){
                                                
                                                    ?>
                                                    <span><?=$totalRecords?> <span>kết quả trả về cho từ khóa </span><span style="color: var(--primary-color);font-size:1.4rem"> '<?=$search?>' </span>trên <span><?=$totalPages?></span> trang</span>
                                                <?php
                                                }
                                            
                                            
                                        ?>
                                </div>
                        
                        <div class="row sm-gutter app__content">
        

                            <div class="col l-12 m-12 c-12">

                                <div class="home-product">
                                    <div class="row sm-gutter product-item"> 

                                        <?php
                                            require_once './admin/connect.php';
                                            
                                            while($r = mysqli_fetch_array($products)){
                                        ?>
                                                                
                                                    <div class="col l-2 m-4 c-6">
                                                        <a class="home-product-item" href="product.php?id=<?= $r['id'] ?>">
                                                            <div>
                                                                <img src="./admin/image/<?php echo $r['image']?>" class="home-product-item__img">
                                                            </div>
                                                            <h4 class="home-product-item__name"> <?php echo $r['mota'];?></h4>
                                                            <div class="home-product-item__price">
                                                                <span class="home-product-item__price-old"> <?php echo $r['gia_goc'];?>đ</span>
                                                                <span class="home-product-item__price-current"> <?php echo $r['gia_goc']-($r['gia_goc']*$r['sale']/100)?>đ</span>
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
                                                            <?php
                                                                if($r['ten_dm']=="Yêu thích"){
                                                                    ?>
                                                                    <div class="div home-product-item__favourite">
                                                                        <i class="fas fa-check"></i>
                                                                        <span>Yêu thích</span>
                                                                    </div>
                                                                    <div class="home-product-item__sale-off">
                                                                        <span class="home-product-item__sale-off-percent"> <?php echo $r['sale'];?>%</span>
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
                                        

                        <?php  
                        include './paginationclient.php';
                        
                        } else{
                                require_once 'contentHome.php';
                                }
                   
                ?>  
            </div> 
           
        </div> 
        
    <!-- phần cuối -->
        
        <?php
            require_once 'footer.php';
        ?>

        
        
    </div>

    <?php
         if(!(isset($_SESSION['name'])) && !(isset($_GET['search']))){
            echo'
            <div class="modalHome js-modalHome">
                    <div class="modal-containerHome js-modal-containerHome">
                        <div class="modalHome-close">
                            <i class="ti-close iHome-close"></i>
                        </div>
                        
                        
                        <div class="modal-bodyHome">
                            <img src="./image/sale.png" style="width: 60px;position: absolute;height: 60px;border-radius: 3px">
                            <img src="./image/sale2.jpg" style="width: 74px;position: absolute;height: 60px;top: 80%;right: 2%;border-radius: 3px;">
                            <div class="form-handle" style="padding: 96px;position: absolute;">
                               
                                <div>
                                    <i class="ti-bell"style="font-size: 2.4rem;color: #F44336;font-weight: 900;position: absolute;top: 38%;left: 24%;"></i>
                                    <i class="ti-bell"style="font-size: 2.4rem;color: #F44336;font-weight: 900;position: absolute;top: 38%;right: 24%;"></i>
                                </div>
                                <div class="auth-form__header"style="text-align: center;">
                                    <h3 class="auth-form__heading"style="margin-bottom: 24px;
                                                                        padding: 5px;
                                                                        background-color: aliceblue;
                                                                        color: cornflowerblue;">Mừng xuân 2024</h3>
                                </div>
                                <p style="color: #F44336;
                                        font-size: 1.1rem;
                                        background-color: #fff;
                                        margin: 0 -82px;
                                        padding: 2px 4px;">NgocHa_Shop thực hiện chiến dịch khuyến mại cho các sản phẩm mới hiện đang bày bán. Nhanh tay mua sắm cùng NgocHa_Shop thôi nào</p>
                            
                                
                            </div>
                            <img src="./image/hoadao.jpg" style="width:400px">
                        </div>
                    </div>
            </div>

            ';
         }
    ?>

   
        <!-- toast message -->
    <div id="toast"></div>

    <script src="./js/toast.js"></script>
    <script src="./js/section.js"></script>
    <script src="./js/home.js"></script>

</body>

</html>
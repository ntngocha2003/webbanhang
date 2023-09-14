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
    <link rel="stylesheet" href="./cart.html">
    <link rel="stylesheet" href="./bill.html">
    <link rel="stylesheet" href="./css/qunam.css">
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
        <!-- phần nội dung -->
        <div class="app__container--boy">
            <div class="grid wide">
                <div class="row home-container">
                    
                    <div class="col l-2 m-0 c-0">
                        <div class="home-category--boy">

                            
                            <div class="category-boy">
                                <i class="fas fa-bars icon-boy"></i>
                                <h3>Danh mục</h3>

                            </div>
                            <div class="home-product home-boy">
                                <div class="row sm-gutter catalog-management">
                                    <ul class="list-catalog">
                                        <li class="list-catalog--item">
                                            <a href="#summer" class="catalog-item">
                                                <i class="fas fa-caret-right"></i>
                                                Mùa hè
                                            </a>
                                            <div class="">
                                                <a href="#T-shirt" class="item">Áo phông</a>
                                                <a href="#shirt" class="item">Áo sơ mi</a>
                                                <a href="#pants-boy" class="item">Quần nam</a>
                                            </div>
                                        </li>
                                        <li class="list-catalog--item">
                                            <a href="#winter" class="catalog-item">
                                                <i class="fas fa-caret-right"></i>
                                                Mùa đông 
                                            </a>
                                            <div class="">
    
                                                <a href="#coat" class="item">Áo khoác</a>
                                                <a href="#hoodie" class="item">Áo hoodie</a>
                                            </div>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>  
                
                    <div class="col l-10 m-12 c-12">

                        <div id="summer" class="home-product home-product--boy">
                            <div  class="header-boy">
                                <h2>Danh sách quần áo mùa hè</h2>
                            </div>

                            

                            <div id="T-shirt" class="home-product">
                                <div  class="header-boy">
                                    <h2>Áo phông</h2>
                                </div>
    
                                <div class="row sm-gutter catalog-item">
                                    <div class="col l-2-4 m-4 c-6">
                                        <a class="home-product-item" href="#">
                                            <div>
                                                <img src="./image/apn1.jpg" class="home-product-item__img">
                                            </div>
                                            <h4 class="home-product-item__name">Áo phông nam đang hót cho các chàng trong mùa hè oi bức</h4>
                                            <div class="home-product-item__price">
                                                <p class="price">Price: </p>
                                                <span class="home-product-item__price-boy">100000đ</span>
                                            </div>
                                            <div class="home-product-item__action">
                                                
                                                <span class="home-product-item__sold">Quanttity:20</span>
                                                <div class="home-product-item--add">
                                                    <i class="home-product-item--icon fas fa-cart-plus" id=""></i>
                                                </div>
                                            </div>
                                           
                                        </a>
                                    </div>

                                    <div class="col l-2-4 m-4 c-6">
                                        <a class="home-product-item" href="#">
                                            <div>
                                                <img src="./image/apn2.jpg" class="home-product-item__img">
                                            </div>
                                            <h4 class="home-product-item__name">Áo phông nam mới nhất cho mùa hè này</h4>
                                            <div class="home-product-item__price">
                                                <p class="price">Price: </p>
                                                <span class="home-product-item__price-boy">120000đ</span>
                                            </div>
                                            <div class="home-product-item__action">
                                                
                                                <span class="home-product-item__sold">Quanttity:28</span>
                                                <div class="home-product-item--add">
                                                    <i class="home-product-item--icon fas fa-cart-plus" id=""></i>
                                                </div>
                                            </div>
                                           
                                        </a>
                                    </div>
    
                                    <div class="col l-2-4 m-4 c-6">
                                        <a class="home-product-item" href="#">
                                            <div>
                                                <img src="./image/apn3.jpg" class="home-product-item__img">
                                            </div>
                                            <h4 class="home-product-item__name">Áo phông nam đang hót cho các chàng trong mùa hè oi bức</h4>
                                            <div class="home-product-item__price">
                                                <p class="price">Price: </p>
                                                <span class="home-product-item__price-boy">100000đ</span>
                                            </div>
                                            <div class="home-product-item__action">
                                                
                                                <span class="home-product-item__sold">Quanttity:20</span>
                                                <div class="home-product-item--add">
                                                    <i class="home-product-item--icon fas fa-cart-plus" id=""></i>
                                                </div>
                                            </div>
                                           
                                        </a>
                                    </div>

                                    <div class="col l-2-4 m-4 c-6">
                                        <a class="home-product-item" href="#">
                                            <div>
                                                <img src="./image/ao5.jpg" class="home-product-item__img">
                                            </div>
                                            <h4 class="home-product-item__name">Áo phông nam đang hót cho các chàng trong mùa hè oi bức</h4>
                                            <div class="home-product-item__price">
                                                <p class="price">Price: </p>
                                                <span class="home-product-item__price-boy">130000đ</span>
                                            </div>
                                            <div class="home-product-item__action">
                                                
                                                <span class="home-product-item__sold">Quanttity:50</span>
                                                <div class="home-product-item--add">
                                                    <i class="home-product-item--icon fas fa-cart-plus" id=""></i>
                                                </div>
                                            </div>
                                           
                                        </a>
                                    </div>

                                    <div class="col l-2-4 m-4 c-6">
                                        <a class="home-product-item" href="#">
                                            <div>
                                                <img src="./image/apn5.jpg" class="home-product-item__img">
                                            </div>
                                            <h4 class="home-product-item__name">Áo phông nam đang hót cho các chàng trong mùa hè oi bức</h4>
                                            <div class="home-product-item__price">
                                                <p class="price">Price: </p>
                                                <span class="home-product-item__price-boy">100000đ</span>
                                            </div>
                                            <div class="home-product-item__action">
                                                
                                                <span class="home-product-item__sold">Quanttity:20</span>
                                                <div class="home-product-item--add">
                                                    <i class="home-product-item--icon fas fa-cart-plus" id=""></i>
                                                </div>
                                            </div>
                                           
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div id="shirt" class="home-product">
                                <div  class="header-boy">
                                    <h2>Áo sơ mi</h2>
                                </div>
    
                                <div class="row sm-gutter catalog-item">
                                    <div class="col l-2-4 m-4 c-6">
                                        <a class="home-product-item" href="#">
                                            <div>
                                                <img src="./image/somin1.jpg" class="home-product-item__img">
                                            </div>
                                            <h4 class="home-product-item__name">Áo sơ mi nam đang hót cho các chàng trong mùa hè oi bức</h4>
                                            <div class="home-product-item__price">
                                                <p class="price">Price: </p>
                                                <span class="home-product-item__price-boy">100000đ</span>
                                            </div>
                                            <div class="home-product-item__action">
                                                
                                                <span class="home-product-item__sold">Quanttity:20</span>
                                                <div class="home-product-item--add">
                                                    <i class="home-product-item--icon fas fa-cart-plus" id=""></i>
                                                </div>
                                            </div>
                                           
                                        </a>
                                    </div>

                                    <div class="col l-2-4 m-4 c-6">
                                        <a class="home-product-item" href="#">
                                            <div>
                                                <img src="./image/somin2.jpg" class="home-product-item__img">
                                            </div>
                                            <h4 class="home-product-item__name">Áo sơ mi nam đang hót cho các chàng trong mùa hè oi bức</h4>
                                            <div class="home-product-item__price">
                                                <p class="price">Price: </p>
                                                <span class="home-product-item__price-boy">120000đ</span>
                                            </div>
                                            <div class="home-product-item__action">
                                                
                                                <span class="home-product-item__sold">Quanttity:28</span>
                                                <div class="home-product-item--add">
                                                    <i class="home-product-item--icon fas fa-cart-plus" id=""></i>
                                                </div>
                                            </div>
                                           
                                        </a>
                                    </div>

                                    <div class="col l-2-4 m-4 c-6">
                                        <a class="home-product-item" href="#">
                                            <div>
                                                <img src="./image/somin3.jpg" class="home-product-item__img">
                                            </div>
                                            <h4 class="home-product-item__name">Áo sơ mi nam đang hót cho các chàng trong mùa hè oi bức</h4>
                                            <div class="home-product-item__price">
                                                <p class="price">Price: </p>
                                                <span class="home-product-item__price-boy">105000đ</span>
                                            </div>
                                            <div class="home-product-item__action">
                                                
                                                <span class="home-product-item__sold">Quanttity:60</span>
                                                <div class="home-product-item--add">
                                                    <i class="home-product-item--icon fas fa-cart-plus" id=""></i>
                                                </div>
                                            </div>
                                           
                                        </a>
                                    </div>

                                    <div class="col l-2-4 m-4 c-6">
                                        <a class="home-product-item" href="#">
                                            <div>
                                                <img src="./image/somin4.jpg" class="home-product-item__img">
                                            </div>
                                            <h4 class="home-product-item__name">Áo sơ mi nam đang hót cho các chàng trong mùa hè oi bức</h4>
                                            <div class="home-product-item__price">
                                                <p class="price">Price: </p>
                                                <span class="home-product-item__price-boy">100000đ</span>
                                            </div>
                                            <div class="home-product-item__action">
                                                
                                                <span class="home-product-item__sold">Quanttity:20</span>
                                                <div class="home-product-item--add">
                                                    <i class="home-product-item--icon fas fa-cart-plus" id=""></i>
                                                </div>
                                            </div>
                                           
                                        </a>
                                    </div>

                                    <div class="col l-2-4 m-4 c-6">
                                        <a class="home-product-item" href="#">
                                            <div>
                                                <img src="./image/somin5.jpg" class="home-product-item__img">
                                            </div>
                                            <h4 class="home-product-item__name">Áo sơ mi nam đang hót cho các chàng trong mùa hè oi bức</h4>
                                            <div class="home-product-item__price">
                                                <p class="price">Price: </p>
                                                <span class="home-product-item__price-boy">100000đ</span>
                                            </div>
                                            <div class="home-product-item__action">
                                                
                                                <span class="home-product-item__sold">Quanttity:20</span>
                                                <div class="home-product-item--add">
                                                    <i class="home-product-item--icon fas fa-cart-plus" id=""></i>
                                                </div>
                                            </div>
                                           
                                        </a>
                                    </div>
    
                                </div>
                                
                            </div>

                            <div id="pants-boy" class="home-product">
                                <div  class="header-boy">
                                    <h2>Quần nam</h2>
                                </div>
    
                                <div class="row sm-gutter catalog-item">
                                    <div class="col l-2-4 m-4 c-6">
                                        <a class="home-product-item" href="#">
                                            <div>
                                                <img src="./image/qn1.webp" class="home-product-item__img">
                                            </div>
                                            <h4 class="home-product-item__name">Quần nam đẹp cho các chàng thoải mái hoạt động</h4>
                                            <div class="home-product-item__price">
                                                <p class="price">Price: </p>
                                                <span class="home-product-item__price-boy">100000đ</span>
                                            </div>
                                            <div class="home-product-item__action">
                                                
                                                <span class="home-product-item__sold">Quanttity:20</span>
                                                <div class="home-product-item--add">
                                                    <i class="home-product-item--icon fas fa-cart-plus" id=""></i>
                                                </div>
                                            </div>
                                           
                                        </a>
                                    </div>

                                    <div class="col l-2-4 m-4 c-6">
                                        <a class="home-product-item" href="#">
                                            <div>
                                                <img src="./image/qn2.jpg" class="home-product-item__img">
                                            </div>
                                            <h4 class="home-product-item__name">Quần nam đẹp cho các chàng thoải mái hoạt động</h4>
                                            <div class="home-product-item__price">
                                                <p class="price">Price: </p>
                                                <span class="home-product-item__price-boy">120000đ</span>
                                            </div>
                                            <div class="home-product-item__action">
                                                
                                                <span class="home-product-item__sold">Quanttity:30</span>
                                                <div class="home-product-item--add">
                                                    <i class="home-product-item--icon fas fa-cart-plus" id=""></i>
                                                </div>
                                            </div>
                                           
                                        </a>
                                    </div>

                                    <div class="col l-2-4 m-4 c-6">
                                        <a class="home-product-item" href="#">
                                            <div>
                                                <img src="./image/qn3.jpg" class="home-product-item__img">
                                            </div>
                                            <h4 class="home-product-item__name">Quần nam đẹp cho các chàng thoải mái hoạt động</h4>
                                            <div class="home-product-item__price">
                                                <p class="price">Price: </p>
                                                <span class="home-product-item__price-boy">100000đ</span>
                                            </div>
                                            <div class="home-product-item__action">
                                                
                                                <span class="home-product-item__sold">Quanttity:20</span>
                                                <div class="home-product-item--add">
                                                    <i class="home-product-item--icon fas fa-cart-plus" id=""></i>
                                                </div>
                                            </div>
                                           
                                        </a>
                                    </div>

                                    <div class="col l-2-4 m-4 c-6">
                                        <a class="home-product-item" href="#">
                                            <div>
                                                <img src="./image/qn4.jpg" class="home-product-item__img">
                                            </div>
                                            <h4 class="home-product-item__name">Quần nam đẹp cho các chàng thoải mái hoạt động</h4>
                                            <div class="home-product-item__price">
                                                <p class="price">Price: </p>
                                                <span class="home-product-item__price-boy">130000đ</span>
                                            </div>
                                            <div class="home-product-item__action">
                                                
                                                <span class="home-product-item__sold">Quanttity:20</span>
                                                <div class="home-product-item--add">
                                                    <i class="home-product-item--icon fas fa-cart-plus" id=""></i>
                                                </div>
                                            </div>
                                           
                                        </a>
                                    </div>

                                    <div class="col l-2-4 m-4 c-6">
                                        <a class="home-product-item" href="#">
                                            <div>
                                                <img src="./image/qn5.jpg" class="home-product-item__img">
                                            </div>
                                            <h4 class="home-product-item__name">Quần nam đẹp cho các chàng thoải mái hoạt động</h4>
                                            <div class="home-product-item__price">
                                                <p class="price">Price: </p>
                                                <span class="home-product-item__price-boy">100000đ</span>
                                            </div>
                                            <div class="home-product-item__action">
                                                
                                                <span class="home-product-item__sold">Quanttity:20</span>
                                                <div class="home-product-item--add">
                                                    <i class="home-product-item--icon fas fa-cart-plus" id=""></i>
                                                </div>
                                            </div>
                                           
                                        </a>
                                    </div>
    
                                </div>
                                
                            </div>
                        </div>
                        

                        <div id="winter" class="home-product home-product--boy">
                            <div class="header-boy">
                                <h2>Danh sách quần áo mùa đông</h2>
                            </div>
                            

                            <div id="coat" class="home-product ">
                                <div  class="header-boy">
                                    <h2>Áo khoác</h2>
                                </div>
    
                                <div class="row sm-gutter catalog-item">
                                    <div class="col l-2-4 m-4 c-6">
                                        <a class="home-product-item" href="#">
                                            <div>
                                                <img src="./image/boqanam.jpg" class="home-product-item__img">
                                            </div>
                                            <h4 class="home-product-item__name">Áo khoác nam sẵn sàng làm ấm cơ thể cho mùa đông năm nay</h4>
                                            <div class="home-product-item__price">
                                                <p class="price">Price: </p>
                                                <span class="home-product-item__price-boy">100000đ</span>
                                            </div>
                                            <div class="home-product-item__action">
                                                
                                                <span class="home-product-item__sold">Quanttity:20</span>
                                                <div class="home-product-item--add">
                                                    <i class="home-product-item--icon fas fa-cart-plus" id=""></i>
                                                </div>
                                            </div>
                                           
                                        </a>
                                    </div>

                                    <div class="col l-2-4 m-4 c-6">
                                        <a class="home-product-item" href="#">
                                            <div>
                                                <img src="./image/akn2.jpg" class="home-product-item__img">
                                            </div>
                                            <h4 class="home-product-item__name">Áo khoác nam sẵn sàng làm ấm cơ thể cho mùa đông năm nay</h4>
                                            <div class="home-product-item__price">
                                                <p class="price">Price: </p>
                                                <span class="home-product-item__price-boy">105000đ</span>
                                            </div>
                                            <div class="home-product-item__action">
                                                
                                                <span class="home-product-item__sold">Quanttity:25</span>
                                                <div class="home-product-item--add">
                                                    <i class="home-product-item--icon fas fa-cart-plus" id=""></i>
                                                </div>
                                            </div>
                                           
                                        </a>
                                    </div>

                                    <div class="col l-2-4 m-4 c-6">
                                        <a class="home-product-item" href="#">
                                            <div>
                                                <img src="./image/aokhoacnam1.jpg" class="home-product-item__img">
                                            </div>
                                            <h4 class="home-product-item__name">Áo khoác nam sẵn sàng làm ấm cơ thể cho mùa đông năm nay</h4>
                                            <div class="home-product-item__price">
                                                <p class="price">Price: </p>
                                                <span class="home-product-item__price-boy">100000đ</span>
                                            </div>
                                            <div class="home-product-item__action">
                                                
                                                <span class="home-product-item__sold">Quanttity:20</span>
                                                <div class="home-product-item--add">
                                                    <i class="home-product-item--icon fas fa-cart-plus" id=""></i>
                                                </div>
                                            </div>
                                           
                                        </a>
                                    </div>

                                    <div class="col l-2-4 m-4 c-6">
                                        <a class="home-product-item" href="#">
                                            <div>
                                                <img src="./image/akn4.jpg" class="home-product-item__img">
                                            </div>
                                            <h4 class="home-product-item__name">Áo khoác nam sẵn sàng làm ấm cơ thể cho mùa đông năm nay</h4>
                                            <div class="home-product-item__price">
                                                <p class="price">Price: </p>
                                                <span class="home-product-item__price-boy">100000đ</span>
                                            </div>
                                            <div class="home-product-item__action">
                                                
                                                <span class="home-product-item__sold">Quanttity:20</span>
                                                <div class="home-product-item--add">
                                                    <i class="home-product-item--icon fas fa-cart-plus" id=""></i>
                                                </div>
                                            </div>
                                           
                                        </a>
                                    </div>

                                    <div class="col l-2-4 m-4 c-6">
                                        <a class="home-product-item" href="#">
                                            <div>
                                                <img src="./image/akn5.jpg" class="home-product-item__img">
                                            </div>
                                            <h4 class="home-product-item__name">Áo khoác nam sẵn sàng làm ấm cơ thể cho mùa đông năm nay</h4>
                                            <div class="home-product-item__price">
                                                <p class="price">Price: </p>
                                                <span class="home-product-item__price-boy">100000đ</span>
                                            </div>
                                            <div class="home-product-item__action">
                                                
                                                <span class="home-product-item__sold">Quanttity:20</span>
                                                <div class="home-product-item--add">
                                                    <i class="home-product-item--icon fas fa-cart-plus" id=""></i>
                                                </div>
                                            </div>
                                           
                                        </a>
                                    </div>
    
                                </div>
                            </div>

                            <div id="hoodie" class="home-product">
                                <div  class="header-boy">
                                    <h2>Áo hoodie</h2>
                                </div>
    
                                <div class="row sm-gutter catalog-item">
                                    <div class="col l-2-4 m-4 c-6">
                                        <a class="home-product-item" href="#">
                                            <div>
                                                <img src="./image/hdn1.jpg" class="home-product-item__img">
                                            </div>
                                            <h4 class="home-product-item__name">Áo hoocdie nam đang hót mùa đông năm nay</h4>
                                            <div class="home-product-item__price">
                                                <p class="price">Price: </p>
                                                <span class="home-product-item__price-boy">100000đ</span>
                                            </div>
                                            <div class="home-product-item__action">
                                                
                                                <span class="home-product-item__sold">Quanttity:20</span>
                                                <div class="home-product-item--add">
                                                    <i class="home-product-item--icon fas fa-cart-plus" id=""></i>
                                                </div>
                                            </div>
                                           
                                        </a>
                                    </div>

                                    <div class="col l-2-4 m-4 c-6">
                                        <a class="home-product-item" href="#">
                                            <div>
                                                <img src="./image/hdn2.jpg" class="home-product-item__img">
                                            </div>
                                            <h4 class="home-product-item__name">Áo hoocdie nam đang hót mùa đông năm nay</h4>
                                            <div class="home-product-item__price">
                                                <p class="price">Price: </p>
                                                <span class="home-product-item__price-boy">100000đ</span>
                                            </div>
                                            <div class="home-product-item__action">
                                                
                                                <span class="home-product-item__sold">Quanttity:30</span>
                                                <div class="home-product-item--add">
                                                    <i class="home-product-item--icon fas fa-cart-plus" id=""></i>
                                                </div>
                                            </div>
                                           
                                        </a>
                                    </div>

                                    <div class="col l-2-4 m-4 c-6">
                                        <a class="home-product-item" href="#">
                                            <div>
                                                <img src="./image/ahn3.jpg" class="home-product-item__img">
                                            </div>
                                            <h4 class="home-product-item__name">Áo hoocdie nam đang hót mùa đông năm nay</h4>
                                            <div class="home-product-item__price">
                                                <p class="price">Price: </p>
                                                <span class="home-product-item__price-boy">120000đ</span>
                                            </div>
                                            <div class="home-product-item__action">
                                                
                                                <span class="home-product-item__sold">Quanttity:28</span>
                                                <div class="home-product-item--add">
                                                    <i class="home-product-item--icon fas fa-cart-plus" id=""></i>
                                                </div>
                                            </div>
                                           
                                        </a>
                                    </div>

                                    <div class="col l-2-4 m-4 c-6">
                                        <a class="home-product-item" href="#">
                                            <div>
                                                <img src="./image/hdn4.jpg" class="home-product-item__img">
                                            </div>
                                            <h4 class="home-product-item__name">Áo hoocdie nam đang hót mùa đông năm nay</h4>
                                            <div class="home-product-item__price">
                                                <p class="price">Price: </p>
                                                <span class="home-product-item__price-boy">100000đ</span>
                                            </div>
                                            <div class="home-product-item__action">
                                                
                                                <span class="home-product-item__sold">Quanttity:20</span>
                                                <div class="home-product-item--add">
                                                    <i class="home-product-item--icon fas fa-cart-plus" id=""></i>
                                                </div>
                                            </div>
                                           
                                        </a>
                                    </div>
    
                                    <div class="col l-2-4 m-4 c-6">
                                        <a class="home-product-item" href="#">
                                            <div>
                                                <img src="./image/hdn5.jpg" class="home-product-item__img">
                                            </div>
                                            <h4 class="home-product-item__name">Áo hoocdie nam đang hót mùa đông năm nay</h4>
                                            <div class="home-product-item__price">
                                                <p class="price">Price: </p>
                                                <span class="home-product-item__price-boy">100000đ</span>
                                            </div>
                                            <div class="home-product-item__action">
                                                
                                                <span class="home-product-item__sold">Quanttity:20</span>
                                                <div class="home-product-item--add">
                                                    <i class="home-product-item--icon fas fa-cart-plus" id=""></i>
                                                </div>
                                            </div>
                                           
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <footer class="footer">
                            <div class="grid wide footer__content">
                                <div class="row">
                                    <div class="col l-2-4 c-6" style="margin-left: 44px;">
                                        <h3 class="footer__heading">Chăm sóc khách hàng</h3>
                                        <ul class="footer-list">
                                            <li class="footer-item">
                                                <a href="" class="footer-item__link">Trung tâm trợ giúp</a>                               
                                            </li>
                                            <li class="footer-item">
                                                <a href="" class="footer-item__link">Ngọc Hà_shop</a>
                                            </li>
                                        </ul>
                                    </div>
                
                                    <div class="col l-2-4 c-6">
                                        <h3 class="footer__heading">Giới thiệu</h3>
                                        <ul class="footer-list">
                                            <li class="footer-item">
                                                <a href="" class="footer-item__link">Giới thiệu</a>
                                            </li>    
                                            
                                            <li class="footer-item"> 
                                                <a href="" class="footer-item__link">Điều khoản</a>
                                            </li>
                                        </ul>
                                    </div>
                
                                    <div class="col l-2-4 c-6">
                                        <h3 class="footer__heading">Danh mục</h3>
                                        <ul class="footer-list">
                
                                            <li class="footer-item">
                                                <a href="" class="footer-item__link">Nam</a>                               
                                            </li>
                                            <li class="footer-item">
                                                <a href="" class="footer-item__link">Nữ</a>
                                            </li>
                                            <li class="footer-item">
                                                <a href="" class="footer-item__link">Trẻ em</a>
                                            </li>
                                        </ul>
                                    </div>
                
                                    <div class="col l-2-4 c-6"> 
                                        <h3 class="footer__heading">Theo dõi</h3>
                                        <ul class="footer-list">
                                            <li class="footer-item">
                                                <a href="" class="footer-item__link">
                                                    <i class="footer-item-icon fab fa-facebook"></i>  
                                                <span class="footer-item-follow-content">Facebook</span>                                        
                                                </a>
                                            </li>    
                                        </ul>
                                    </div>
                
                                </div>                   
                            </div>
                
                            <div class="footer__bottom">
                                <div class="grid">
                                    <p class="footer__name">NgọcHà_Shop</p>
                                    <p class="footer__address">Địa chỉ:Phú Thọ; Tổng đài CSKH:0563280382 - Email:hant@gmail.com</p>
                                    <p class="footer__text">© 2023 Bản quyền thuộc về NgọcHà_Shop</p>
                                    
                                </div>
                            </div>
                        </footer>
                    </div>  
                </div>

            </div> 
        </div> 
      
    </div>
    <!-- modal đăng nhập , đăng ký -->
    
        
        <!-- toast message -->
        <div id="toast"></div>


<script src="./js/home.js"></script>
<script src="./js/cart.js"></script>
<!-- <script src="./js/login_register.js"></script>
<script src="./js/toast.js"></script> -->
<script src="./js/section.js"></script>

<script>
    const categoryBoy=document.querySelector('.category-boy');
    const homeBoy=document.querySelector('.home-boy');
  
  
    function showCategory(){
      homeBoy.classList.add('open')
  }
  
  categoryBoy.addEventListener('click',showCategory)
</script>
</body>

</html>
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
                                                <a href="#pants-boy" class="item">Quần, váy</a>
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
                                                <img src="./image/pn1.jpg" class="home-product-item__img">
                                            </div>
                                            <h4 class="home-product-item__name">Áo phông nữ đang hót cho các nàng trong mùa hè oi bức</h4>
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
                                                <img src="./image/pn2.jpg" class="home-product-item__img">
                                            </div>
                                            <h4 class="home-product-item__name">Áo phông nữ đang hót cho các nàng trong mùa hè oi bức</h4>
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
                                                <img src="./image/pn3.jpg" class="home-product-item__img">
                                            </div>
                                            <h4 class="home-product-item__name">Áo phông nữ đang hót cho các nàng trong mùa hè oi bức</h4>
                                            <div class="home-product-item__price">
                                                <p class="price">Price: </p>
                                                <span class="home-product-item__price-boy">200000đ</span>
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
                                                <img src="./image/pn4.jpg" class="home-product-item__img">
                                            </div>
                                            <h4 class="home-product-item__name">Áo phông nữ đang hót cho các nàng trong mùa hè oi bức</h4>
                                            <div class="home-product-item__price">
                                                <p class="price">Price: </p>
                                                <span class="home-product-item__price-boy">104000đ</span>
                                            </div>
                                            <div class="home-product-item__action">
                                                
                                                <span class="home-product-item__sold">Quanttity:24</span>
                                                <div class="home-product-item--add">
                                                    <i class="home-product-item--icon fas fa-cart-plus" id=""></i>
                                                </div>
                                            </div>
                                           
                                        </a>
                                    </div>

                                    <div class="col l-2-4 m-4 c-6">
                                        <a class="home-product-item" href="#">
                                            <div>
                                                <img src="./image/pn5.jpg" class="home-product-item__img">
                                            </div>
                                            <h4 class="home-product-item__name">Áo phông nữ đang hót cho các nàng trong mùa hè oi bức</h4>
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
                                                <img src="./image/smn1.jpg" class="home-product-item__img">
                                            </div>
                                            <h4 class="home-product-item__name">Áo sơ mi nữ đang bán chạy, giúp các nàng thoải mái mỗi khi sở hữu</h4>
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
                                                <img src="./image/smn2.jpg" class="home-product-item__img">
                                            </div>
                                            <h4 class="home-product-item__name">Áo sơ mi nữ đang bán chạy, giúp các nàng thoải mái mỗi khi sở hữu</h4>
                                            <div class="home-product-item__price">
                                                <p class="price">Price: </p>
                                                <span class="home-product-item__price-boy">111000đ</span>
                                            </div>
                                            <div class="home-product-item__action">
                                                
                                                <span class="home-product-item__sold">Quanttity:21</span>
                                                <div class="home-product-item--add">
                                                    <i class="home-product-item--icon fas fa-cart-plus" id=""></i>
                                                </div>
                                            </div>
                                           
                                        </a>
                                    </div>

                                    <div class="col l-2-4 m-4 c-6">
                                        <a class="home-product-item" href="#">
                                            <div>
                                                <img src="./image/smn3.webp" class="home-product-item__img">
                                            </div>
                                            <h4 class="home-product-item__name">Áo sơ mi nữ đang bán chạy, giúp các nàng thoải mái mỗi khi sở hữu</h4>
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
                                                <img src="./image/smn4.jpg" class="home-product-item__img">
                                            </div>
                                            <h4 class="home-product-item__name">Áo sơ mi nữ đang bán chạy, giúp các nàng thoải mái mỗi khi sở hữu</h4>
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
                                                <img src="./image/smn5.jpg" class="home-product-item__img">
                                            </div>
                                            <h4 class="home-product-item__name">Áo sơ mi nữ đang bán chạy, giúp các nàng thoải mái mỗi khi sở hữu</h4>
                                            <div class="home-product-item__price">
                                                <p class="price">Price: </p>
                                                <span class="home-product-item__price-boy">109000đ</span>
                                            </div>
                                            <div class="home-product-item__action">
                                                
                                                <span class="home-product-item__sold">Quanttity:27</span>
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
                                    <h2>Quần, váy</h2>
                                </div>
    
                                <div class="row sm-gutter catalog-item">
                                    <div class="col l-2-4 m-4 c-6">
                                        <a class="home-product-item" href="#">
                                            <div>
                                                <img src="./image/vay1.jpg" class="home-product-item__img">
                                            </div>
                                            <h4 class="home-product-item__name">Váy xinh hết nấc cho các tình iu, ghé qua và sắm ngay cho mình 1 em nào</h4>
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
                                                <img src="./image/vay2.jpg" class="home-product-item__img">
                                            </div>
                                            <h4 class="home-product-item__name">Váy xinh hết nấc cho các tình iu, ghé qua và sắm ngay cho mình 1 em nào</h4>
                                            <div class="home-product-item__price">
                                                <p class="price">Price: </p>
                                                <span class="home-product-item__price-boy">130000đ</span>
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
                                                <img src="./image/vay3.jpg" class="home-product-item__img">
                                            </div>
                                            <h4 class="home-product-item__name">Váy xinh hết nấc cho các tình iu, ghé qua và sắm ngay cho mình 1 em nào</h4>
                                            <div class="home-product-item__price">
                                                <p class="price">Price: </p>
                                                <span class="home-product-item__price-boy">103000đ</span>
                                            </div>
                                            <div class="home-product-item__action">
                                                
                                                <span class="home-product-item__sold">Quanttity:23</span>
                                                <div class="home-product-item--add">
                                                    <i class="home-product-item--icon fas fa-cart-plus" id=""></i>
                                                </div>
                                            </div>
                                           
                                        </a>
                                    </div>

                                    <div class="col l-2-4 m-4 c-6">
                                        <a class="home-product-item" href="#">
                                            <div>
                                                <img src="./image/vay4.jpg" class="home-product-item__img">
                                            </div>
                                            <h4 class="home-product-item__name">Mẫu quần xinh hết nấc cho các tình iu, ghé qua và sắm ngay cho mình 1 em nào</h4>
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
                                                <img src="./image/vay5.png" class="home-product-item__img">
                                            </div>
                                            <h4 class="home-product-item__name">Mẫu quần xinh hết nấc cho các tình iu, ghé qua và sắm ngay cho mình 1 em nào</h4>
                                            <div class="home-product-item__price">
                                                <p class="price">Price: </p>
                                                <span class="home-product-item__price-boy">105000đ</span>
                                            </div>
                                            <div class="home-product-item__action">
                                                
                                                <span class="home-product-item__sold">Quanttity:50</span>
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
                                                <img src="./image/aknu1.jpg" class="home-product-item__img">
                                            </div>
                                            <h4 class="home-product-item__name">Áo khoác nữ mới nhất cho các nàng trong mùa đông năm nay</h4>
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
                                                <img src="./image/anknu2.jpg" class="home-product-item__img">
                                            </div>
                                            <h4 class="home-product-item__name">Áo khoác nữ mới nhất cho các nàng trong mùa đông năm nay</h4>
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
                                                <img src="./image/aknu3.jpg" class="home-product-item__img">
                                            </div>
                                            <h4 class="home-product-item__name">Áo khoác nữ mới nhất cho các nàng trong mùa đông năm nay</h4>
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
                                                <img src="./image/aknu4.jpg" class="home-product-item__img">
                                            </div>
                                            <h4 class="home-product-item__name">Áo khoác nữ mới nhất cho các nàng trong mùa đông năm nay</h4>
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
                                                <img src="./image/aknu5.jpg" class="home-product-item__img">
                                            </div>
                                            <h4 class="home-product-item__name">Áo khoác nữ mới nhất cho các nàng trong mùa đông năm nay</h4>
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
                                                <img src="./image/hdnu1.jpg" class="home-product-item__img">
                                            </div>
                                            <h4 class="home-product-item__name">Áo hoodie nữ form rộng cực kỳ cute cho các nàng đây</h4>
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
                                                <img src="./image/hdnu2.png" class="home-product-item__img">
                                            </div>
                                            <h4 class="home-product-item__name">Áo hoodie nữ form rộng cực kỳ cute cho các nàng đây</h4>
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
                                                <img src="./image/hdnu3.jpg" class="home-product-item__img">
                                            </div>
                                            <h4 class="home-product-item__name">Áo hoodie nữ form rộng cực kỳ cute cho các nàng đây</h4>
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
                                                <img src="./image/hdnu4.jpg" class="home-product-item__img">
                                            </div>
                                            <h4 class="home-product-item__name">Áo hoodie nữ form rộng cực kỳ cute cho các nàng đây</h4>
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
                                                <img src="./image/hdnu5.jpg" class="home-product-item__img">
                                            </div>
                                            <h4 class="home-product-item__name">Áo hoodie nữ form rộng cực kỳ cute cho các nàng đây</h4>
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
                                    <div class="col l-2-4 c-6"style="margin-left: 44px;">
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
        
    <!-- phần cuối -->

        
    </div>
    <!-- modal đăng nhập , đăng ký -->
    
        <div class="modal modal_register">
            <div class="modal__overlay"></div>

            <div class="modal__body modal__container--register">

                <!-- Register form -->
                <div class="auth-form register-form">
                    <div class="auth-form__container">
                        <div class="auth-form__icon auth-form__icon--register">
                            <i class="ti-close icon-close"></i>
                        </div>
                        <div class="auth-form__header">
                            <h3 class="auth-form__heading">Đăng ký</h3>
                        </div>
                        
                        <div class="auth-form__form">
                            <div class="auth-form__group">
                                <input type="number" class="auth-form__input" id="phoneRegister" placeholder="Sđt">
                            </div>
                            <span class="message messageNumber"></span>
                        </div>
                        <div class="auth-form__form">
                            <div class="auth-form__group">
                                <input type="text" class="auth-form__input" id="nameRegister" placeholder="Name">
                            </div>
                            <span class="message messageName"></span>
                        </div>
                        <div class="auth-form__form">
                            <div class="auth-form__group">
                                <input type="password" class="auth-form__input" id="passwordRegister" placeholder="Mật khẩu">
                            </div>
                            <span class="message messagePass"></span>
                        </div>
                        <div class="auth-form__form">
                            <div class="auth-form__group">
                                <input type="password" class="auth-form__input" id="passwordRegisterAgain" placeholder="Nhập lại mật khẩu">
                            </div>
                            <span class="message messagePassAgain"></span>
                        </div>

                        <div class="auth-form__aside">
                            <p class="auth-form__policy-text">
                                Bằng việc đăng kí ,bạn đã đồng ý với Ngọc Hà_shop về
                                <a href="" class="auth-form__text-link">Điều khoản dịch vụ</a>&
                                <a href="" class="auth-form__text-link">Chính sách bảo mật</a>
                            </p>
                        </div>
    
                        <div class="auth-form__controls">
                            <button class="btn auth-form__controls-back btn--normal">TRỞ LẠI</button>
                            <button class="btn btn--primary btn-register">ĐĂNG KÝ</button>
                        </div>

                        <p class="question">
                            Bạn đã có tài khoản?
                            <a class="link-login" href="#">Đăng nhập</a>
                        </p>
    
                    </div>
                    
                </div>
            
            </div>
        </div> 
        
        <!-- Login form -->
        <div class="modal modal_login">
            <div class="modal__overlay"></div>

            <div class="modal__body modal__container--login">

                <div class="auth-form login-form">
                    <div class="auth-form__container">
                        <div class="auth-form__icon auth-form__icon--login">
                            <i class="ti-close icon-close"></i>
                        </div>
                        <div class="auth-form__header">
                            <h3 class="auth-form__heading">Đăng nhập</h3>
                        </div>
        
                        <div class="auth-form__form auth-form__form1">
                            <div class="auth-form__group">
                                <input type="text" class="auth-form__input" id="nameLogin" placeholder="Name">
                            </div>
                            <span class="message messageNameLogin"></span>
                        </div>
                        <div class="auth-form__form auth-form__form1">
                            <div class="auth-form__group">
                                <input type="password" class="auth-form__input" id="passwordLogin" placeholder="Mật khẩu">
                            </div>
                            <span class="message messagePassLogin"></span>
                        </div>
        
                        <div class="auth-form__aside">
                            <div class="auth-form__help">
                                <a href="" class="auth-form__help-link auth-form__help-forgot">Quên mật khẩu</a>
                                <span class="auth-form__help-separate"></span>
                                <a href="" class="auth-form__help-link">Cần trợ giúp?</a>
                            </div>
                        </div>
        
        
                        <div class="auth-form__controls">
                            <button class="btn auth-form__controls-back btn--normal">TRỞ LẠI</button>
                            <button class="btn btn--primary btn-login">ĐĂNG NHẬP</button>
                        </div>
        
                        <p class="question">
                            Bạn chưa có tài khoản?
                            <a class="link-register" href="#">Đăng ký</a>
                        </p>
                    </div>
                    
                </div>
            </div>
        </div>

        <!-- toast message -->
        <div id="toast"></div>

<script src="./js/localStorange.js"></script>
<script src="./js/listData.js"></script>
<script src="./js/home.js"></script>
<script src="./js/cart.js"></script>
<script src="./js/login_register.js"></script>
<script src="./js/toast.js"></script>
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
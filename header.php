<?php
    session_start();
    ob_start();
    require_once './admin/connect.php';
    
?>

<header class="header">
            <div class="grid wide">
                <nav class="header__navbar hide-on-mobile-tablet">
                   <ul class="header__navbar-list">
                       <li class="header__navbar-item header__navbar-item--has-qr header__navbar-item--separate">
                           <a href="home.php" class="header__navbar-icon-link">Home</a>
                        </li>

                       <li class="header__navbar-item">                           
                            <a href="" class="header__navbar-icon-link">
                                Kết nối
                                <i class="header__navbar-icon fab fa-facebook"></i>
                            </a>
                       </li>
                   </ul>
 
                   <ul class="header__navbar-list">
                       <li class=" header__navbar-item header__navbar-item--has-notify">
                            <a href="" class="header__navbar-item-link">
                                <i class="header__navbar-icon far fa-bell"></i>
                                Thông báo
                            </a>
                            
                            <div class="header__notify">
                                <header class="header__notify-header">
                                    <h3>Thông báo mới nhận</h3>
                                </header>
                                <div class="header__notify-list">
                                
                                    <p>Chào mừng bạn đến với NgọcHà_Shop</p>
    
                                </div>
                                <footer class="header__notify-footer">
                                    <a href="" class="header__notify-footer-btn">Xem tất cả</a>
                                </footer>
                            </div>
                       </li>
                      
                       <?php
                             
                             if(isset($_SESSION['name'])){
                                 $row=$_SESSION['name'];
                                 $render_sql= "SELECT * FROM `account`where ten_dn='$row'";
                                 $result=mysqli_query($conn,$render_sql);
                                 $r=mysqli_fetch_assoc($result);
                                
                                echo '
                                <div class="header__navbar-item header__navbar-user" id="header__navbar-user">
                                    <img src="./image/client.jpg" alt="" class="header__navbar-user-img">
                                    <span class="header__navbar-user-name">'.$_SESSION['name'].' </span>
         
                                    <div class="header__navbar-user-menu">
                                        <div class="header__navbar-user-item">
                                            <a href="./account.php?id= '.$r['id'].'">Tài khoản của tôi</a>
                                        </div>
                                        <div class="header__navbar-user-item">
                                            <a href="./bill.php">Đơn mua</a>
                                        </div>
            
                                        <div class=" header__navbar-user-item header__navbar-user-item--separate">
                                            <a href="./logout.php">Đăng xuất</a>
                                        </div>
                                    </div>
                                </div>';
                            
                            }
                            else{
                             ?>
                                <li><a href="./registerClient.php" class="header__navbar-item header__navbar-item--strong header__navbar-item--separate btn-start--register">Đăng ký</a></li>
                       
                                <li><a href="./loginClient.php" class="header__navbar-item header__navbar-item--strong btn-start--login">Đăng nhập</a></li>
                            <?php
                            }
                            ?>
                      
                   </ul>
                </nav>
           
                <!-- Header with search -->
                <div class="header-with-search">
                    <label for="mobile-search-checkbox" class="header__mobile-search">
                        <i class="header__mobile-search-icon fas fa-search"></i>
                    </label>
                    <div class="header__logo hide-on-tablet hide-on-mobile">
                        <a href="home.php"class="header__logo-link">
                            <i class="fas fa-heading header_logo-link--icon"></i>
                            _Ngọc Hà
                        </a>                                                        
                    </div>
                    <input type="checkbox" hidden id="mobile-search-checkbox" class="header__search-checkbox">
                    <div class="header__search">
                        <form action="home.php" method="GET" class="header__search-input-wrap">
                            
                            <input type="text"name="search" class="header__search-input" placeholder="Tìm kiếm sản phẩm">


                            <!-- Search-history
                            <div class="header__search-history">
                                <h3 class="header__search-history-heading">Lịch sử tìm kiếm</h3>
                                <ul class="header__search-history-list">
                                    <li class="header__search-history-item">
                                        <a href="">Aó phông nữ</a>
                                    </li>
                                    <li class="header__search-history-item">
                                        <a href="">Quần jean nam, nữ</a>
                                    </li>
                                </ul>
                            </div> -->
                            <button type="submit" name="btnSearch" class="header__search-btn">
                                <i class="header__search-btn-icon fas fa-search"></i>
                            </button>
                           
                        </form>
                        
                    </div>

                    <!-- Cart layout -->
                    <div class="header__cart">
                        <div class="header__cart-wrap">
                           <i class="header__cart-icon fas fa-cart-plus"></i>
                           <?php
                                    if(isset($_SESSION["cart"]) && isset($_SESSION['name'])){
                                        echo '<span class="header__cart-notice">'. count($_SESSION['cart']) .'</span>';
                                    }
                                    else{
                                        ?>
                                        <span class="header__cart-notice">0</span>;
                                    <?php
                                    }
                                ?>
                            

                            <!-- No cart: header__cart-list--no-cart -->
                            <div class="header__cart-list">
                                <?php
                                            if(!empty($_SESSION["cart"]) && isset($_SESSION['name'])){
                                                $products = mysqli_query($conn, "SELECT * FROM `product` WHERE `id` IN (".implode(",", array_keys($_SESSION["cart"])).")");
                                                echo'<h4 class="header__cart-heading">Sản phẩm đã thêm</h4>';
                                                
                                            }
                                            else{
                                                ?>
                                                <img src="./image/no-cart.webp" alt="" class="header__cart-no-cart-img">
                                                <span class="header__cart-list-no-cart-msg">
                                                    Chưa có sản phẩm
                                                </span>
                                            <?php
                                            }
                                   ?>
                                    <?php
                                            if (!empty($products)){
                                                while ($row = mysqli_fetch_array($products)) { 
                                                ?>
                                                <div class="header__cart-list-item">
                                                    <div class="header__cart-item">
                                                        <img class="img-cart" src="./admin/image/<?=$row['image']?>">
                                                        <div class="header__cart-item-info">
                                                            <div class="header__cart-item-head">
                                                                <h5 class="header__cart-item-name"><?=$row['mota']?></h5>
                                                                    <div class="header__cart-item-price-wrap">
                                                                        <span class="header__cart-item-price"><?=$row['gia_moi']?>đ</span>
                                                                        <span class="header__cart-item-multiply">x</span>
                                                                        <input type='text' class="header__card-item-qnt"value="<?= $_SESSION["cart"][$row['id']] ?>"
                                                                        name="get[<?= $row['id'] ?>]" style="width: 25px;
                                                                                                            height: 15px;
                                                                                                            border: 0;"/>
                                                                    </div>
                                                            </div>
                            
                                                            <div class="header__cart-item-body">
                                                                <span class="quantity-cart">Số lượng còn: <?=$row['so_luong']?></span>
                                                                <a onclick="return confirm('bạn có muốn xóa sản phẩm này không')" href="cart.php?action=delete&id=<?= $row['id'] ?>" class="header__cart-item-remove">Xóa</a>
                                                            </div>
                            
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <?php
                                                    
                                                }
                                            }
                                        ?>
                                    <a href="./cart.php" class="header__cart-view-cart btn btn--primary">Xem giỏ hàng</a>;
                            
                            </div>
                        </div>                           
                    </div>
                    <a href="./bill.html" class="header__navbar-icon-link header__bill">Bill</a>
                </div>

                <div class="footer_header">
                    <ul class="header__navbar-list">

                        <li class="header__navbar-item">
                            <a href="./qanam.php" class="header__navbar-icon-link" >Nam</a>
                         </li>
    
                         <li class="header__navbar-item">
                            <a href="./qanu.php" class="header__navbar-icon-link" >Nữ</a>
                        </li>
    
                        <li class="header__navbar-item">
                            <a href="./qatem.php" class="header__navbar-icon-link" >Trẻ em</a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
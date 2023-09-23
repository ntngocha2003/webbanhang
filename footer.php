<footer class="footer">
            <div class="grid wide footer__content">
                <div class="row">
                    <div class="col l-3 c-6">
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

                    <div class="col l-3 c-6">
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

                    <div class="col l-3 c-6">
                        <h3 class="footer__heading">Danh mục</h3>
                        <ul class="footer-list">
                        
                            
                            <?php
                        
                                require_once './admin/connect.php';

                                $sql="SELECT * FROM category where ten_dm !='Yêu thích'";

                                $resultcategory=mysqli_query($conn,$sql);

                                
                                while($category=mysqli_fetch_assoc($resultcategory)){
                                    
                                    ?>
                                        <li class="footer-item">
                                            <a href="./load_product.php?id=<?php echo $category['id'];?>" class="footer-item__link" ><?php echo $category['ten_dm']?></a>
                                        </li>
                                    <?php
                                }

                                
                            ?>
                        </ul>
                    </div>

                    <div class="col l-3 c-6"> 
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
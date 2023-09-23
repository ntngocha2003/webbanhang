
    
        <div class="row sm-gutter app__content">
                            

                            <div class="col l-12 m-12 c-12">

                                <div class="home-product">
                                    <div class="row sm-gutter product-item">
                                        <?php
                                           
                                            require_once './admin/connect.php';

                                            $query = "select * from product where ten_dm='29'";
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
<!-- <script src="./js/home.js"></script> -->
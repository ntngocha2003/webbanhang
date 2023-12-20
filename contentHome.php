 <?php
        include './admin/connect.php';
        $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:12;
        $current_page = !empty($_GET['page'])?$_GET['page']:1; //Trang hiện tại
        $offset = ($current_page - 1) * $item_per_page;
        $products = mysqli_query($conn, "SELECT category.ten_dm, product.*
        FROM category
        INNER JOIN product ON category.id = product.id_dm
        WHERE ten_dm='Yêu thích'
        ORDER BY `id` ASC  LIMIT " . $item_per_page . " OFFSET " . $offset);
        $totalRecords = mysqli_query($conn, "SELECT category.ten_dm, product.*
        FROM category
        INNER JOIN product ON category.id = product.id_dm
        WHERE ten_dm='Yêu thích'");
        $totalRecords = $totalRecords->num_rows;
        $totalPages = ceil($totalRecords / $item_per_page);
        ?>
    
        <div class="row sm-gutter app__content">
                            

                            <div class="col l-12 m-12 c-12">

                                <div class="home-product">
                                    <div class="row sm-gutter product-item">
                                        <?php
                                           
                                            require_once './admin/connect.php';
     
                                            while($r=mysqli_fetch_assoc($products)){
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
                include './pagination.php';
                ?>
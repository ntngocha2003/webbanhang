<header class="header header_admin">
            <div class="grid wide">
                <div class="content_header">

                    <div class="header__logo header__logo-admin hide-on-tablet">
                        <div href="#" class="header__logo-link">
                            <i class="fas fa-heading header_logo-link--icon"></i>
                            _Ngọc Hà
                        </div>                                                        
                    </div>
                    
                    <div class="log-out">
                        <?php
                             
                             if(isset($_SESSION['nameStaff'])){
                                 $row=$_SESSION['nameStaff'];
                                 $render_sql= "SELECT * FROM `account`where ten_dn='$row'";
                                 $result=mysqli_query($conn,$render_sql);
                                 $r=mysqli_fetch_assoc($result);
                                
                                echo '
                                <div class="header__navbar-item header__navbar-user" id="header__navbar-user">
                                    <img src="../admin/image/'.$r['image'].'" alt="" class="header__navbar-user-img">
                                    <span class="header__navbar-user-name">'.$_SESSION['nameStaff'].' </span>
         
                                    <div class="header__navbar-user-menu">
                                        <div class="header__navbar-user-item">
                                            <a href="./homeStaff.php?id= '.$r['id'].'">Tài khoản của tôi</a>
                                        </div>
                                        <div class="header__navbar-user-item">
                                            <a href="../admin/renderClient.php">Quản lý khách hàng</a>
                                        </div>

                                        <div class="header__navbar-user-item">
                                            <a href="../admin/renderCategory.php">Quản lý danh mục</a>
                                        </div>

                                        <div class="header__navbar-user-item">
                                            <a href="../admin/renderProduct.php">Quản lý sản phẩm</a>
                                        </div>

                                        <div class="header__navbar-user-item">
                                            <a href="../admin/renderProduct.php">Quản lý đơn hàng</a>
                                        </div>
            
                                        <div class=" header__navbar-user-item header__navbar-user-item--separate">
                                            <a href="./logOutStaff.php">Đăng xuất</a>
                                        </div>
                                        
                                    </div>
                                </div>';
                            
                            }
                            else{
                             ?>
                                
                            <?php
                            }
                            ?>
                       
                    </div>
                </div>
            </div>
        </header>
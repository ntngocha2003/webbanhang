

                    <div class="colum-1 col l-3 m-0 c-0">
                        <div class="admin_manager">
                            
                                <div class="admin_account">
                                <?php
                             
                                    if(isset($_SESSION['nameAdmin'])){
                                        $row=$_SESSION['nameAdmin'];
                                        $render_sql= "SELECT * FROM `account`where ten_dn='$row'";
                                        $result=mysqli_query($conn,$render_sql);
                                        $r=mysqli_fetch_assoc($result);
                                        
                                        echo '
                                            <div class="admin_close">
                                                <i class="ti-close admin_close-icon"></i>
                                            </div>
                                            <div class="admin_account-img">
                                                <img class="img-admin" src="./image/'.$r['image'].'">
                                            </div>

                                           
                                            <div class="admin_account-info">
                                                <h4 class="account-name">'.$_SESSION['nameAdmin'].'</h4>
                                            </div>'
                                    
                                    ?>
                                    <?php
                                    }
                                    ?>
                                    
                                </div>
                           
                            <div class="line"></div>
                            <div class="row sm-gutter admin_control"style="margin-left: 15px;">
                                <div class="list_contol">
                                <?php
                             
                                    if(($r['quen']=='admin')){
                                        
                                        echo '
                                            

                                            <div class="list_contol-item">
                                                <div class="list_acc"style="cursor: pointer;">
                                                    
                                                    <div class="icon-open">
                                                        <i class="fas fa-sort-down"style="margin-top: 5px;
                                                                                            margin-right: 5px;
                                                                                            font-size: 2.4rem;"></i>
                                                        <p>Quản lý tài khoản</p>
                                                    </div>

                                                    <div class="icon-right">
                                                   
                                                        <i class="fas fa-caret-right"style="margin-top: 5px;
                                                                                            margin-right: 5px;
                                                                                            font-size: 2.4rem;"></i>
                                                        <p>Quản lý tài khoản</p>
                                                    </div>

                                                </div>

                                                <div class="list_acc-items">
                                                    <div class="list_acc-item">
                                                        <a class="list_contol-item--link" href="./renderAccount.php">Tất cả tài khoản</a>
                                                       
                                                    </div>

                                                    <div class="list_acc-item">
                                                        <a class="list_contol-item--link" href="./renderStaff.php">Quản lý nhân viên</a>
                                                    </div>
                                                    
                                                    <div class="list_acc-item">
                                                        <a class="list_contol-item--link" href="./renderClient.php">Quản lý khách hàng</a>
                                                    </div>

                                                    <div class="list_acc-item">
                                                        <a class="list_contol-item--link" href="./homeAdmin.php">Hồ sơ cá nhân</a>
                                                    </div>

                                                </div>
                                                
                                                
                                            </div>


                                            <div class="list_contol-item list_contol-item1">
                                                <a class="list_contol-item--link" href="./renderSupplier.php">Quản lý cung cấp</a>
                                            </div>

                          
                                            <div class="list_contol-item list_contol-item2">
                                                <a class="list_contol-item--link" href="./renderCategory.php">Quản lý danh mục</a>
                                            </div>
                                            <div class="list_contol-item list_contol-item3">
                                                <a class="list_contol-item--link" href="./renderProduct.php">Quản lý sản phẩm</a>
                                            </div>
                                            <div class="list_contol-item list_contol-item4">
                                                <a class="list_contol-item--link" href="./renderOrder.php">Quản lý đơn hàng</a>
                                            </div>
                                            <div class="list_contol-item list_contol-item5">
                                                <a class="list_contol-item--link" href="./renderRevenue.php">Quản lý doanh thu</a>
                                            </div>
                                                '
                                    
                                    ?>
                                    
                                    <?php
                                    }
                                    else if(($r['quen'] == 'Nhân viên chăm sóc khách hàng')){
                                        echo'
                                            <li class="list_contol-item">
                                                <a class="list_contol-item--link" href="./homeAdmin.php">Hồ sơ cá nhân</a>
                                            </li>
                                            <li class="list_contol-item">
                                                <a class="list_contol-item--link" href="./renderClient.php">Quản lý khách hàng</a>
                                            </li>
                                        '
                                        ?>
                                        <?php
                                    }
                                    
                                    else if(($r['quen'] == 'Nhân viên quản lý kho')){
                                        echo'
                                            <li class="list_contol-item">
                                                <a class="list_contol-item--link" href="./homeAdmin.php">Hồ sơ cá nhân</a>
                                            </li>
                                            <div class="list_contol-item list_contol-item1">
                                                <a class="list_contol-item--link" href="./renderSupplier.php">Quản lý cung cấp</a>
                                            </div>
                                            <li class="list_contol-item">
                                                <a class="list_contol-item--link" href="./renderCategory.php">Quản lý danh mục</a>
                                            </li>
                                           
                                            <li class="list_contol-item">
                                                <a class="list_contol-item--link" href="./renderProduct.php">Quản lý sản phẩm</a>
                                            </li>

                                        '
                                        ?>
                                        <?php
                                    }

                                    else if(($r['quen'] == 'Nhân viên quản lý đơn hàng')){
                                        echo'
                                            <li class="list_contol-item">
                                                <a class="list_contol-item--link" href="./homeAdmin.php">Hồ sơ cá nhân</a>
                                            </li>
                                            <li class="list_contol-item">
                                                <a class="list_contol-item--link" href="./renderOrder.php">Quản lý đơn hàng</a>
                                            </li>

                                        '
                                        ?>
                                        <?php
                                    }
                                    
                                    ?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>  

                    <script src="./js/main.js"></script>   
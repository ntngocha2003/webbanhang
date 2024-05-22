<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Theo dõi đơn hàng</title>
        <link rel="stylesheet" href="./css/home.css">
        <link rel="stylesheet" href="./css/base.css">
        <link rel="stylesheet" href="./gird/GirdSystem/gird.css">
        <link rel="stylesheet" href="./css/reponsive.css">
        <link rel="stylesheet" href="./css/cart.css">
        <link rel="stylesheet" href="./css/bill.css">
        <link rel="stylesheet" href="./admin/css/renderStaff.css">
        <!-- Latest compiled and minified CSS -->
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"> -->

        <!-- jQuery library -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
        <link rel="stylesheet" href="../font/themify-icons/themify-icons.css">
        <link rel="stylesheet" href="../gird/GirdSystem/gird.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400, 500, 700display=swapsubset=vietnamese" rel="stylesheet">
    </head>
    <body>
    <div class="app">
        <!-- phần đầu -->
        
        <?php
            require_once 'header.php';
        ?>

        <!-- phần nội dung -->
        <div class="app__container app_bill">
            <div class="grid wide">

                
                <div>
                <?php
            
                    require_once './admin/connect.php';           
                    $bill_detail="SELECT  orders.*, account.ten_dn
                    FROM orders
                    inner join staffs on staffs.id=orders.id_staff
                    inner join account on staffs.id_acc=account.id
                    WHERE orders.id =". $_GET['id'];
                    $result=mysqli_query($conn,$bill_detail);
                    $sql_detail = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    ?>
                    <div class="app__container app_bill">
                        <div class="grid wide">

                            <div class="app_heading">
                                <h2>Theo dõi đơn hàng</h2>
                            </div>

                            
                            <div class="row sm-gutter">
                                
                                
                                <div class="col l-12 m-12 c-12">
                                    
                                    <div class="info">
                                        <div class="row sm-gutter ">
                                            
                                            <div class="col l-8 m-8 c-8">
                                                <div class="inner">
                                                    <div class="order-status-heading">
                                                        <?php
                                                            if($sql_detail[0]['tinh_trang']=='Đang chờ hàng'){
                                                                ?>
                                                                    <div class="status-bill">
                                                                        <i class="fas fa-hourglass-start"></i>
                                                                        <p class="status">Đang chờ lấy hàng</p>
                                                                        
                                                                    </div>
                                                                <?php
                                                            }
                        
                                                            else if($sql_detail[0]['tinh_trang']=='Đang giao hàng'){
                                                                ?>
                                                                    <div class="status-bill">
                                                                        <i class="fas fa-caravan"></i>
                                                                        <p class="status">Đang vận chuyển</p>
                                                                    </div>
                                                                
                                                                <?php
                                                            }
                                                            else if($sql_detail[0]['tinh_trang']=='Đã giao hàng'){
                                                                ?>
                                                                <div class="status-bill"style="color:rgb(89, 162, 56);">
                                                                    <i class="fas fa-caravan"></i>
                                                                    <p class="status">Giao hàng thành công</p>
                                                                </div>
                                                            
                                                            <?php
                                                            }
                                                            else if($sql_detail[0]['tinh_trang']=='Đã hủy'){
                                                                ?>
                                                                <div class="status-bill"style="color:red">
                                                                    <i class="fas fa-ban"></i>
                                                                    <p class="status">Đã hủy</p>
                                                                </div>
                                                                
                                                                <?php
                                                            }
                                                        ?>
                                                        
                                                        <div>
                                                            <?php
                                                                if($sql_detail[0]['tinh_trang']!='Đang chờ hàng'){
                                                                    ?>
                                                                    <label class="detail_user-item"style="color:#000">Được giao bởi nhân viên: </label>
                                                                    <span class="item-name"style="color:#000"> <?= $sql_detail[0]['ten_dn'] ?></span>
                                                                    <br/>
                                                                <?php
                                                                }
                                                                else{
                                                                    ?>
                                                                        <label class="detail_user-item"style="color:#000">Đơn hàng vẫn đang chờ </label>
                                                                        <br/>
                                                                    <?php
                                                                }
                                                            ?>
                                                        </div>
                                                    </div>
    

                                                    <div class="progress">
                                                        <div class="block-order">
                                                            <div class="step-bar">
                                                                <span class="step-bar__circle"style="background-color: green;opacity: 0.8;width: 18px;height: 18px;"></span>
                                                                <span class="step-bar__line"></span>
                                                            </div>

                                                            <div class="step-info">
                                                                <div class="step-info__status-text" style="color:#000">Giao hàng thành công</div>
                                                                <div class="step-info__substate-text"></div>
                                                                <div class="step-info__time"> .....</div>
                                                                <div class="step-info__divider"></div>
                                                            </div>
                                                        </div>

                                                        <div class="block-order">
                                                            <div class="step-bar">
                                                                <span class="step-bar__circle"></span>
                                                                <span class="step-bar__line"></span>
                                                            </div>

                                                            <div class="step-info">
                                                                <div class="step-info__status-text">Đang vận chuyển</div>
                                                                <div class="step-info__substate-text">Nhân viên vận chuyển lấy hàng thành công</div>
                                                                <div class="step-info__time"><?=date('d/m/Y - H:i', $sql_detail[0]['last_updated']+6*3600)?></div>
                                                                <div class="step-info__divider"></div>
                                                            </div>
                                                        </div>

                                                        <div class="block-order">
                                                            <div class="step-bar">
                                                                <span class="step-bar__circle"></span>
                                                                <span class="step-bar__line"></span>
                                                            </div>

                                                            <div class="step-info">
                                                                <div class="step-info__status-text">Đang vận chuyển</div>
                                                                <div class="step-info__substate-text">Bàn giao cho nhân viên vận chuyển</div>
                                                                <div class="step-info__time"><?=date('d/m/Y - H:i', $sql_detail[0]['last_updated']+6*3600)?></div>
                                                                <div class="step-info__divider"></div>
                                                            </div>
                                                        </div>

                                                        <div class="block-order">
                                                            <div class="step-bar">
                                                                <span class="step-bar__circle"></span>
                                                                <span class="step-bar__line"></span>
                                                            </div>

                                                            <div class="step-info">
                                                                <div class="step-info__status-text">Đang chờ hàng</div>
                                                                <div class="step-info__substate-text">Đang đóng gói</div>
                                                                <div class="step-info__time"></div>
                                                                <div class="step-info__divider"></div>
                                                            </div>
                                                        </div>

                                                        <div class="block-order">
                                                            <div class="step-bar">
                                                                <span class="step-bar__circle"></span>
                                                                <span class="step-bar__line"></span>
                                                            </div>

                                                            <div class="step-info">
                                                                <div class="step-info__status-text">Đang xác nhận</div>
                                                                <div class="step-info__substate-text">NgocHa_shop đã tiếp nhận đơn hàng của bạn </div>
                                                                <div class="step-info__time"><?=date('d/m/Y - H:i', $sql_detail[0]['created_time']+6*3600)?></div>
                                                                <div class="step-info__divider"></div>
                                                            </div>
                                                        </div>

                                                        <div class="block-order">
                                                            <div class="step-bar">
                                                                <span class="step-bar__circle"></span>
                                                                <span class="step-bar__line"></span>
                                                            </div>

                                                            <div class="step-info">
                                                                <div class="step-info__status-text">Đang xác nhận</div>
                                                                <div class="step-info__substate-text">Chờ shop xác nhận</div>
                                                                <div class="step-info__time">
                                                                    <?=date('d/m/Y - H:i', $sql_detail[0]['created_time']+6*3600)?>
                                                                </div>
                                                                <div class="step-info__divider" style="margin: 12px 0px;border-top: none;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>

                                            <div class="col l-4 m-4 c-4">
                                                
                                            </div>

                                        </div>
                                    </div>
                                </div>  
                            </div>
                                     
                        </div> 
                    </div> 
                </div>             
            </div> 
        </div> 
        
    <!-- phần cuối -->
        <?php
            require_once 'footer.php';
        ?>
    </div>
    
    </body>
</html>

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
    <link rel="stylesheet" href="./font/themify-icons/themify-icons.css">

    <link rel="stylesheet" href="./css/login_register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
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

                <div class="app_heading">
                    <h2>Đơn hàng của tôi</h2>
                </div>

                <div class="row sm-gutter">
                    

                    <div class="col l-12 m-12 c-12">

                        <div class="info-bill">
                            <div class="row sm-gutter tabs">
                                <div class="col l-2-4 m-2-4 c-2-4 tab-item active">
                                    <p class="info-heading">
                                        <span>Tất cả đơn hàng</span>
                                    </p>
                                </div>
                                <div class="col l-2-4 m-2-4 c-2-4 tab-item">
                                    <p  class="info-heading">
                                        <span>Đang chờ hàng</span>
                                    </p>
                                </div>

                                <div class="col l-2-4 m-2-4 c-2-4 tab-item">
                                    <p  class="info-heading">
                                        <span>Đang giao hàng</span>
                                    </p>
                                </div>

                                <div class="col l-2-4 m-2-4 c-2-4 tab-item">
                                    <p  class="info-heading">
                                        <span>Đã giao hàng</span>
                                    </p>
                                </div>

                                <div class="col l-2-4 m-2-4 c-2-4 tab-item">
                                    <p  class="info-heading">
                                        <span>Đã hủy</span>
                                    </p>
                                </div>

                                <div class="line" style="top: 45px;
                                                        background-color: var(--primary-color);"></div>

                            </div>
                        </div>
                    </div>  
                </div>
                <div style="margin-top: 30px;
                            background-color: #fff;">
                    <table class="tab-pane active" style="margin-top: 20px;">
                        <thead>
                            <tr>
                                <th class="col-name">STT</th>
                                <th class="col-name">Chi tiết</th>
                                <th class="col-name">Tổng tiền</th>
                                <th class="col-name">Ngày đặt</th>
                                <th class="col-name">Tình trạng</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        require_once './admin/connect.php';
                        $id_acc=$r['id'];
                        $num = 1;
                        $bill="SELECT account.ten_dn, client_order.*
                        FROM account
                        INNER JOIN client_order ON account.id = client_order.id_account
                        WHERE account.id ='$id_acc' ";
                        $result=mysqli_query($conn,$bill); 
                        $sql = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        
                        
                        ?>
                        <?php
                    
                        foreach ($sql as $row) {
                            ?>
                            <tr class="item-row">
                            <td class="stt">
                                <?php echo $num++; ?>
                                
                            </td>
                            <td class="code">
                                <a href="order_detail-user.php?id=<?=$row['id']?>"class="code-link">Chi tiết</a>
                                </td>
                            
                            <td class="total-prices">
                                <?php echo $row['tong_tien']?> đ
                            </td>
                            <td class="date">
                                <?=date('d/m/Y', $row['created_time'])?>
                            </td>
                            <td class="total-prices">
                                <?php echo $row['tinh_trang']?>
                            </td>
       
                        </tr>
                            <?php
                            
                        }
                        ?>
                            
                        </tbody>
                    </table>

                    <table class="tab-pane" style="margin-top: 20px;">
                        <thead>
                            <tr>
                                <th class="col-name">STT</th>
                                <th class="col-name">Chi tiết</th>
                                <th class="col-name">Tổng tiền</th>
                                <th class="col-name">Ngày đặt</th>
                                <th class="col-name">Tình trạng</th>
                                <th class="col-name">Hủy bỏ</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        require_once './admin/connect.php';
                        $id_acc=$r['id'];
                        $num = 1;
                        $bill="SELECT account.ten_dn, client_order.*
                        FROM account
                        INNER JOIN client_order ON account.id = client_order.id_account
                        WHERE account.id ='$id_acc' and client_order.tinh_trang like '%Đang chờ hàng%'";
                        $result=mysqli_query($conn,$bill); 
                        $sql = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        
                        
                        ?>
                        <?php
                    
                        foreach ($sql as $row) {
                            ?>
                            <tr class="item-row">
                            <td class="stt">
                                <?php echo $num++; ?>
                                
                            </td>
                            <td class="code">
                                <a href="order_detail-user.php?id=<?=$row['id']?>"class="code-link">Chi tiết</a>
                                </td>
                            
                            <td class="total-prices">
                                <?php echo $row['tong_tien']?> đ
                            </td>
                            <td class="date">
                                <?=date('d/m/Y', $row['created_time'])?>
                            </td>
                            <td class="total-prices">
                                <?php echo $row['tinh_trang']?>
                            </td>

                            <td class="clear-cart">
                                
                                <form method="POST" action="updateBill.php" class="" enctype="multipart/form-data">
                                    <input type="hidden" id="" name="id" value="<?php echo $row['id']?>">
                                    <a onclick="return confirm('bạn có muốn hủy đơn hàng này không')" href="" class="btn-remove">
                                        
                                        <input type="submit" name="confirm" class="btn-confirm" value="Hủy đơn"/>
                                    </a>
                                </form>
                            </td>
                            
                        </tr>
                            <?php
                            
                        }
                        ?>
                            
                        </tbody>
                    </table>

                    <table class="tab-pane" style="margin-top: 20px;">
                        <thead>
                            <tr>
                                <th class="col-name">STT</th>
                                <th class="col-name">Chi tiết</th>
                                <th class="col-name">Tổng tiền</th>
                                <th class="col-name">Ngày đặt</th>
                                <th class="col-name">Tình trạng</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        require_once './admin/connect.php';
                        $id_acc=$r['id'];
                        $num = 1;
                        $bill="SELECT account.ten_dn, client_order.*
                        FROM account
                        INNER JOIN client_order ON account.id = client_order.id_account
                        WHERE account.id ='$id_acc' and client_order.tinh_trang like '%Đang giao%'";
                        $result=mysqli_query($conn,$bill); 
                        $sql = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        
                        
                        ?>
                        <?php
                    
                        foreach ($sql as $row) {
                            ?>
                            <tr class="item-row">
                            <td class="stt">
                                <?php echo $num++; ?>
                                
                            </td>
                            <td class="code">
                                <a href="order_detail-user.php?id=<?=$row['id']?>"class="code-link">Chi tiết</a>
                                </td>
                            
                            <td class="total-prices">
                                <?php echo $row['tong_tien']?> đ
                            </td>
                            <td class="date">
                                <?=date('d/m/Y', $row['created_time'])?>
                            </td>
                            <td class="total-prices">
                                <?php echo $row['tinh_trang']?>
                            </td>

                            
                        </tr>
                            <?php
                            
                        }
                        ?>
                            
                        </tbody>
                    </table>

                    <table class="tab-pane" style="margin-top: 20px;">
                        <thead>
                            <tr>
                                <th class="col-name">STT</th>
                                <th class="col-name">Chi tiết</th>
                                <th class="col-name">Tổng tiền</th>
                                <th class="col-name">Ngày đặt</th>
                                <th class="col-name">Tình trạng</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        require_once './admin/connect.php';
                        $id_acc=$r['id'];
                        $num = 1;
                        $bill="SELECT account.ten_dn, client_order.*
                        FROM account
                        INNER JOIN client_order ON account.id = client_order.id_account
                        WHERE account.id ='$id_acc' and client_order.tinh_trang like '%Đã giao%'";
                        $result=mysqli_query($conn,$bill); 
                        $sql = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        
                        
                        ?>
                        <?php
                    
                        foreach ($sql as $row) {
                            ?>
                            <tr class="item-row">
                            <td class="stt">
                                <?php echo $num++; ?>
                                
                            </td>
                            <td class="code">
                                <a href="order_detail-user.php?id=<?=$row['id']?>"class="code-link">Chi tiết</a>
                                </td>
                            
                            <td class="total-prices">
                                <?php echo $row['tong_tien']?> đ
                            </td>
                            <td class="date">
                                <?=date('d/m/Y', $row['created_time'])?>
                            </td>
                            <td class="total-prices">
                                <?php echo $row['tinh_trang']?>
                            </td>

                        </tr>
                            <?php
                            
                        }
                        ?>
                            
                        </tbody>
                    </table>

                    <table class="tab-pane" style="margin-top: 20px;">
                        <thead>
                            <tr>
                                <th class="col-name">STT</th>
                                <th class="col-name">Chi tiết</th>
                                <th class="col-name">Tổng tiền</th>
                                <th class="col-name">Ngày đặt</th>
                                <th class="col-name">Tình trạng</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        require_once './admin/connect.php';
                        $id_acc=$r['id'];
                        $num = 1;
                        $bill="SELECT account.ten_dn, client_order.*
                        FROM account
                        INNER JOIN client_order ON account.id = client_order.id_account
                        WHERE account.id ='$id_acc' and client_order.tinh_trang like '%Đã hủy%'";
                        $result=mysqli_query($conn,$bill); 
                        $sql = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        
                        
                        ?>
                        <?php
                    
                        foreach ($sql as $row) {
                            ?>
                            <tr class="item-row">
                            <td class="stt">
                                <?php echo $num++; ?>
                                
                            </td>
                            <td class="code">
                                <a href="order_detail-user.php?id=<?=$row['id']?>"class="code-link">Chi tiết</a>
                                </td>
                            
                            <td class="total-prices">
                                <?php echo $row['tong_tien']?> đ
                            </td>
                            <td class="date">
                                <?=date('d/m/Y', $row['created_time'])?>
                            </td>
                            <td class="total-prices">
                                <?php echo $row['tinh_trang']?>
                            </td>

                           
                            
                        </tr>
                            <?php
                            
                        }
                        ?>
                            
                        </tbody>
                    </table>
            
                   
                    <div class="btn-action btn-action1">

                        <a href="./home.php" class="btn-back">
                            <i class="fas fa-arrow-left"></i>
                            <span>Back to Shopping</span>
                        </a>
                        
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
<script>
    const $ = document.querySelector.bind(document);
    const $$ = document.querySelectorAll.bind(document);

    const tabs = $$(".tab-item");
    const panes = $$(".tab-pane");

    const tabActive = $(".tab-item.active");
    const line = $(".tabs .line");


    requestIdleCallback(function () {
    line.style.left = tabActive.offsetLeft + "px";
    line.style.width = tabActive.offsetWidth + "px";
    });

    tabs.forEach((tab, index) => {
    const pane = panes[index];

    tab.onclick = function () {
        $(".tab-item.active").classList.remove("active");
        $(".tab-pane.active").classList.remove("active");

        line.style.left = this.offsetLeft + "px";
        line.style.width = this.offsetWidth + "px";

        this.classList.add("active");
        pane.classList.add("active");
    };
    });
</script>
</html>
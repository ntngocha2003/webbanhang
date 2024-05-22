
<?php
    session_start();
    ob_start();
    require_once 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa đơn hàng</title>
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="./css/addStaff.css">
    <link rel="stylesheet" href="./css/addProduct.css">
    <link rel="stylesheet" href="./css/reponsiver.css">
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
    <div class="admin">
    <?php
                        require 'header_admin.php';
                   ?> 

        <div class="admin_container">
            <div class="grid wide">
                <div class="row">
                    
                <?php
                        require 'admin_category.php';
                   ?>  
                
                    <div class="col l-9 m-12 c-12">
                        <div class="add_staff">

                            <div class="add-header">
                                <h3>Cập nhật trạng thái đơn hàng</h3>
                            </div>
                            <?php
                                $id=$_GET['sid'];
                                require_once 'connect.php';
                            ?>
                            <div class="add-content">
                                <form action="./updateOrder.php" method="post">
                                    <div class="block row">
                                    <input type="hidden" id="" name="sid" value="<?php echo $id?>">
                                        
                                        
                                        <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">
                                                <label class="control-label">Trạng thái</label>
                                               
                                                <select name="tinhTrang"class="form-control" id="exampleSelect2" required>
                                                    
                                                    <option>Đang chờ hàng</option>
                                                    <option>Đang giao hàng</option>
                                                    <option>Đã giao hàng</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">
                                                <?php
                                                $render_sql= "SELECT * FROM `orders` 
                                                where id='$id'";
                                                $result=mysqli_query($conn,$render_sql);
                                                $r=mysqli_fetch_assoc($result);
                                                
                                                if($r['tinh_trang']=='Đang chờ hàng')
                                                {
                                                    ?>
                                                        <label class="control-label">Chọn nhân viên giao</label>
                                                        <select name="idNV"class="form-control" id="exampleSelect2" required>
                                                            <option>--Chọn nhân viên--</option> 
                                                            <?php
                                                                
                                                                require_once 'connect.php';
                                                                $render_sql= "SELECT account.ten_dn,account.quen,staffs.* FROM `account` join `staffs` on account.id=staffs.id_acc where quen='Nhân viên giao hàng'";
                                                                $result=mysqli_query($conn,$render_sql);
                                                                $row= mysqli_fetch_all($result, MYSQLI_ASSOC);

                                                                foreach ($row as $r) {
                                                                    ?>
                                                                        <option value="<?php echo $r['id']?>"><?php echo $r['ten_dn']?></option> 
                                                                    <?php
                                                                }
                                                                
                                                            ?>
                                                        </select>
                                                   <?php
                                                }

                                                
                                            ?>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="block">
                                        <button type="submit" class="btn btn-primary btn-save">Lưu thông tin</button>
                                        <a onclick="return confirm('bạn có muốn hủy bỏ thao tác này không')" class="btn btn-cancel" href="./renderOrder.php">Hủy bỏ</a>
                                    </div>
                                  </form>
                            </div>
                        </div>
                    </div>  
                </div>
            </div> 
        </div> 


    </div>
    <script src="./js/main.js"></script>
</body>
</html>
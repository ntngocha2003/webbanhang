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
    <title>Sửa sản phẩm</title>
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
                                <h3>Sửa sản phẩm</h3>
                            </div>
                            <?php
                                $id=$_GET['sid'];

                                require_once 'connect.php';

                                $edit_sql="SELECT * FROM product where id=$id";

                                $result=mysqli_query($conn,$edit_sql);

                                $row= mysqli_fetch_assoc($result);

                            ?>

                            <div class="add-content">
                                <form action="./updateProduct.php" method="post" enctype="multipart/form-data">
                                    <div class="block row">
                                        <input type="hidden" id="" name="sid" value="<?php echo $id?>">
                                        
                                        <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">
                                                <label for="tenSP">Tên sản phẩm</label>
                                                <input type="text" class="form-control" name="tenSP"
                                                    value="<?php echo $row['ten_sp']?>">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label for="mota">Mô tả</label>
                                                <input type="text" class="form-control" name="moTa"
                                                value="<?php echo $row['mota']?>">
                                            </div>
                                        </div>

                                        <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label for="image">Ảnh 3 x 4</label>
                                                <img src="./image/<?php echo $row['image']?>" style="width:60px;height:60px;border-radius: 50%;"/>
                                                <!-- <input type="file" class="form-control" name="moTa"
                                                value="./image/<?php echo $row['image']?>"> -->
                                            </div>
                                            
                                          </div>

                                          <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label for="sale">Sale</label>
                                                <input type="number" class="form-control" name="sale"
                                                value="<?php echo $row['sale']?>">
                                            </div>
                                          </div>
                                          <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label for="giaGoc">Gía gốc</label>
                                                <input type="number" class="form-control" name="giaGoc"
                                                value="<?php echo $row['gia_goc']?>">
                                            </div>
                                          </div>
                                          
                                          <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label for="soLuong">Số lượng</label>
                                                <input type="number" class="form-control" name="soLuong"
                                                value="<?php echo $row['so_luong']?>">
                                            </div>
                                          </div>
                                          <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label class="control-label">Danh mục</label>
                                                <select name="danhMuc"class="form-control" id="exampleSelect2" required
                                                >
                                                <?php

                                                    require_once 'connect.php';

                                                    $category="SELECT * FROM category";

                                                    $result=mysqli_query($conn,$category);

                                                    $row_c= mysqli_fetch_all($result, MYSQLI_ASSOC);
                                                
                                                   
                                                    foreach ($row_c as $row_category) {
                                                        ?>
                                                            <option value="<?php echo $row_category['id']?>"><?php echo $row_category['ten_dm']?></option> 
                                                            <?php
                                                    }
                                                    ?>
                                                    </select>
                                            </div>
                                          </div>

                                          <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">
                                            <?php
                                                if(isset($_SESSION['nameAdmin'])){
                                                    require_once 'connect.php';
                                                    $row=$_SESSION['nameAdmin'];
                                                    $render_sql= "SELECT account.* FROM `account`where ten_dn='$row'";
                                                    $result=mysqli_query($conn,$render_sql);
                                                    $r=mysqli_fetch_assoc($result);
                                                }
                                            ?>
                                                <label class="control-label">Người thực hiện</label>
                                                <input type="hidden" name="idNV" value="<?php echo $r['id']?>"/>
                                                <p class="form-control" name="idNV"><?php echo $r['ten_dn']?></p>
                                            </div>
                                          </div>
                                          
                                    </div>
                                    <div class="block">
                                        <button type="submit" class="btn btn-primary btn-save">Lưu thông tin</button>
                                        <a onclick="return confirm('bạn có muốn hủy bỏ thao tác này không')" class="btn btn-cancel" href="./renderProduct.php">Hủy bỏ</a>
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
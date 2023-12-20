<?php
    session_start();
    ob_start();
    require_once 'connect.php';
?>
<?php
if(isset($_POST['addP'])){
    $tenNCC=$_POST['tenNCC'];
    $SDT=$_POST['SDT'];
    $Email=$_POST['Email'];
    $diaChi=$_POST['diaChi'];
   
    
    $err=[];

    if(empty($tenNCC)){
        $err['tenNCC']='Bạn chưa nhập tên nhà cung cấp';
    }
    if(empty($SDT)){
        $err['SDT']='Bạn chưa nhập số điện thoại';
    }
    
    if(empty($Email)){
        $err['Email']='Bạn chưa nhập email';
    }
    if(empty($diaChi)){
        $err['diaChi']='Bạn chưa nhập địa chỉ';
    }
    
        require_once 'connect.php';
        if(empty($err)){

            $addNcc="INSERT INTO `supplier`(`id`, `email`, `sdt`,`ten_ncc`, `dia_chi`) 
            VALUES (null,'$Email','$SDT','$tenNCC','$diaChi')";
    
            if(mysqli_query($conn,$addNcc)){
                echo "<h1>Thêm thành công</h1>";
                header("location: renderSupplier.php");
            }
        }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm nhà cung cấp</title>
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
                                <h3>Thêm nhà cung cấp</h3>
                            </div>
                            <div class="add-content">
                                <form action="./addSupplier.php" method="post" enctype="multipart/form-data">
                                    <div class="block row">
                                        <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label for="tenNCC">Tên nhà cung cấp</label>
                                                <input type="text" class="form-control" name="tenNCC">
                                                <span class="message">
                                                    <?php
                                                        echo (isset($err['tenNCC'])?($err['tenNCC']):'');
                                                    ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label for="Email">Email</label>
                                                <input type="text" class="form-control" name="Email">

                                                <span class="message">
                                                    <?php
                                                        echo (isset($err['Email'])?($err['Email']):'');
                                                    ?>
                                                </span>
                                            </div>
                                          </div>
                                          <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label for="SDT">Số điện thoại</label>
                                                <input type="number" class="form-control" name="SDT">
                                                <span class="message">
                                                    <?php
                                                        echo (isset($err['SDT'])?($err['SDT']):'');
                                                    ?>
                                                </span>
                                            </div>
                                            
                                          </div>

                                          <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label for="diaChi">Địa chỉ</label>
                                                <input type="text" class="form-control" name="diaChi">
                                                <span class="message">
                                                    <?php
                                                        echo (isset($err['diaChi'])?($err['diaChi']):'');
                                                    ?>
                                                </span>
                                            </div>
                                            
                                          </div>
                                          
                                    </div>
                                    <div class="block">
                                        <button type="submit" class="btn btn-primary btn-save" name="addP">Lưu thông tin</button>
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
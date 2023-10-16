<?php
if(isset($_POST['addP'])){
    $tenSP=$_POST['tenSP'];
    $moTa=$_POST['moTa'];
    $sale=$_POST['sale'];
    $giaGoc=$_POST['giaGoc'];
    $giaMoi=$_POST['giaMoi'];
    $tinhTrang=$_POST['tinhTrang'];
    $soLuong=$_POST['soLuong'];
    $danhMuc=$_POST['danhMuc'];


    $uploadDir_img_logo = "./image/";

    $file_tmp = isset($_FILES['image']['tmp_name']) ? $_FILES['image']['tmp_name'] : ""; 
    $file_name = isset($_FILES['image']['name']) ? $_FILES['image']['name'] : ""; 
    $file_type = isset($_FILES['image']['type']) ? $_FILES['image']['type'] : ""; 
    $file_size = isset($_FILES['image']['size']) ? $_FILES['image']['size'] : ""; 
    $file_error = isset($_FILES['image']['error']) ? $_FILES['image']['error'] : "";

    $dmyhis=date("Y").date("m").date("d").date("H").date("i").date("s");
    $image=$dmyhis.$file_name; 

    $err=[];

    if(!empty($file_name)){
        copy ( $file_tmp, $uploadDir_img_logo.$image);
    }
    else if(empty($file_name)){
        $err['image']='Bạn chưa chọn ảnh';
        // header("location: addProduct.php");
    }

    if(empty($tenSP)){
        $err['tenSP']='Bạn chưa nhập tên sản phẩm';
    }
    if(empty($moTa)){
        $err['moTa']='Bạn chưa nhập mô tả';
    }
    if(empty($sale)){
        $err['sale']='Bạn chưa nhập sale';
    }
    if(empty($giaGoc)){
        $err['giaGoc']='Bạn chưa nhập giá';
    }
    if(empty($giaMoi)){
        $err['giaMoi']='Bạn chưa nhập giá';
    }
    if(empty($soLuong)){
        $err['soLuong']='Bạn chưa nhập số lượng';
    }
   
        require_once 'connect.php';
        if(empty($err)){

            $addSp="INSERT INTO `product`(`id`, `ten_sp`, `mota`,`image`, `sale`, `gia_goc`, `gia_moi`,`tinh_trang`,`so_luong`,`id_dm`) 
            VALUES (null,'$tenSP','$moTa','$image','$sale','$giaGoc','$giaMoi','$tinhTrang','$soLuong','$danhMuc')";
    
            if(mysqli_query($conn,$addSp)){
                echo "<h1>Thêm thành công</h1>";
                header("location: renderProduct.php");
            }
        }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
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
                                <h3>Thêm sản phẩm</h3>
                            </div>
                            <div class="add-content">
                                <form action="./addProduct.php" method="post" enctype="multipart/form-data">
                                    <div class="block row">
                                        <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label for="tenSP">Tên sản phẩm</label>
                                                <input type="text" class="form-control" name="tenSP">
                                                <span class="message">
                                                    <?php
                                                        echo (isset($err['tenSP'])?($err['tenSP']):'');
                                                    ?>
                                                </span>
                                            </div>
                                        </div>
                                        
                                          <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label for="mota">Mô tả</label>
                                                <input type="text" class="form-control" name="moTa">
                                                <span class="message">
                                                    <?php
                                                        echo (isset($err['moTa'])?($err['moTa']):'');
                                                    ?>
                                                </span>
                                            </div>
                                            
                                          </div>

                                          <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label for="image">Ảnh 3 x 4</label>
                                                <input type="file" class="form-control" name="image">

                                                <span class="message">
                                                    <?php
                                                        echo (isset($err['image'])?($err['image']):'');
                                                    ?>
                                                </span>
                                            </div>
                                          </div>

                                          <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label for="sale">Sale</label>
                                                <input type="number" class="form-control" name="sale">
                                                <span class="message">
                                                    <?php
                                                        echo (isset($err['sale'])?($err['sale']):'');
                                                    ?>
                                                </span>
                                            </div>
                                            
                                          </div>
                                          <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label for="giaGoc">Gía gốc</label>
                                                <input type="number" class="form-control" name="giaGoc">
                                                <span class="message">
                                                    <?php
                                                        echo (isset($err['giaGoc'])?($err['giaGoc']):'');
                                                    ?>
                                                </span>
                                            </div>
                                          </div>
                                          <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label for="giaMoi">Giá mới</label>
                                                <input type="number" class="form-control" name="giaMoi">
                                                <span class="message">
                                                    <?php
                                                        echo (isset($err['giaMoi'])?($err['giaMoi']):'');
                                                    ?>
                                                </span>
                                            </div>
                                          </div>
                                          <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label for="tinhTrang">Tình trạng</label>
                                                <select class="form-control" name="tinhTrang">
                                                    
                                                    <option>Còn hàng</option>
                                                    <option>Hết hàng</option>
                                                    
                                                </select>
                                            </div>
                                          </div>
                                          <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label for="soLuong">Số lượng</label>
                                                <input type="number" class="form-control" name="soLuong">
                                                <span class="message">
                                                    <?php
                                                        echo (isset($err['soLuong'])?($err['soLuong']):'');
                                                    ?>
                                                </span>
                                            </div>
                                          </div>
                                          <div class="form-group l-6 c-6 m-6 col">
                                            <div class="group">

                                                <label class="control-label">Danh mục</label>
                                                <select name="danhMuc"class="form-control" id="exampleSelect2" required>
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
<?php
    session_start();
    ob_start();
    require_once 'connect.php';
        if(!empty($_GET['action']) && $_GET['action'] == 'search' && !empty($_POST)){
            $_SESSION['product_filter'] = $_POST;
            // var_dump($_SESSION['product_filter']);exit;
            header('Location: renderProduct.php');
        }
        if(!empty($_GET['action']) && $_GET['action'] == 'return' && !empty($_POST)){
            unset($_SESSION['product_filter']);
            header('Location: renderProduct.php');
        }
        
        if(!empty($_SESSION['product_filter'])){
            $where = "";
            foreach ($_SESSION['product_filter'] as $field => $value) {
                
                if(!empty($field)){
                
                    switch ($field) {
                        case 'ten_sp':
                            $where .= (!empty($where))?" AND ". "`".$field."` LIKE '%".$value."%'" : "`".$field."` LIKE '%".$value."%'";
                            break;
                            
                        }
                    }
                }
                extract($_SESSION['product_filter']);
            }
            $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 4;
            $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
            // var_dump($current_page);
            $offset = ($current_page - 1) * $item_per_page;
            if(!empty($where)){
                $totalRecords = mysqli_query($conn, "SELECT * FROM `product` where (".$where.")");
                // var_dump($where);exit;
        }else{
            $totalRecords = mysqli_query($conn, "SELECT * FROM `product`");
        }
        $totalRecords = $totalRecords->num_rows;
        $totalPages = ceil($totalRecords / $item_per_page);
        if(!empty($where)){
            $products = mysqli_query($conn, "SELECT category.ten_dm, product.*
                                            FROM category
                                            INNER JOIN product ON category.id = product.id_dm
                                            where (".$where.") ORDER BY `id` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
        }else{
            
            $products = mysqli_query($conn, "SELECT category.ten_dm, product.*
            FROM category
            INNER JOIN product ON category.id = product.id_dm ORDER BY `id` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
            // var_dump($products);exit;
        }
        
        mysqli_close($conn);
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="./css/addStaff.css">
    <link rel="stylesheet" href="./css/renderStaff.css">
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

                            <div class="container">
                                <div class="container_title">
                                    <h2 class="container_heading">Danh sách sản phẩm</h2>
                                </div>
                                <div class="control_link">

                                    <a class="control_link-item" href="addProduct.php">+ Thêm mới sản phẩm</a>
                                    
                                    <form class="control_link-item" style="margin-right: 0;"action="renderProduct.php?action=search" method="POST">
                                        <!-- <i class="ti-search"style="font-weight: 900;"></i> -->
                                        <input type="submit" name="btnSearch" value="Tìm kiếm" 
                                            style="font-weight: bold;
                                                font-size: 1.4rem;
                                                color: var(--primary-color);
                                                border: 0;
                                                background-color: #fff;
                                                cursor: pointer;">
                                            
                                        <input type="text" class="control_link-item--input" name="ten_sp"value="<?=!empty($name)?$name:""?>">
                                    </form>
                                    <form class="control_link-item" style="margin-right: 0;"action="renderProduct.php?action=return" method="POST">
                                        <!-- <i class="ti-search"style="font-weight: 900;"></i> -->
                                        <input type="submit" name="btnSearch" value="Trở lại" 
                                            style="font-weight: bold;
                                                font-size: 1.4rem;
                                                color: var(--primary-color);
                                                border: 0;
                                                background-color: #fff;
                                                cursor: pointer;">
                                            
                                    </form>
                                    
                                </div>
                                    <table class="table table-borderless">
                                        <thead class="table-borderless-thead">
                                        <tr>
                                            <th class="table-borderless-th" >STT</th>
                                            <th class="table-borderless-th" >Tên sản phẩm</th>
                                            <th class="table-borderless-th" >Mô tả</th>
                                            <th class="table-borderless-th" >Ảnh</th>
                                            <th class="table-borderless-th" >Sale</th>
                                            <th class="table-borderless-th" >Giá gốc</th>
                                            <th class="table-borderless-th" >Giá mới</th>
                                            <th class="table-borderless-th" >Tình trạng</th>
                                            <th class="table-borderless-th" >Số lượng</th>
                                            <th class="table-borderless-th" >Tên danh mục</th>
                                            <th class="table-borderless-th" >Thao tác</th>
                                        </tr>
                                        </thead>
                                        <tbody id="content">
                    
                                        <?php
                                            require_once 'connect.php';
                                            $num=1;
                                            
                                            while ($r = mysqli_fetch_array($products)){
                                                ?>
                                                <tr class="table-borderless-tr">
                                                    <td class="table-borderless-td">
                                                        <?php echo $num++;?>
                                                    </td>
                                                   
                                                    <td class="table-borderless-td">
                                                        <?php echo $r['ten_sp'];?>
                                                    </td>
                                                    <td class="table-borderless-td">
                                                        <div class="detail">

                                                            <?php echo $r['mota'];?>
                                                        </div>
                                                    </td>
                                                    <td class="table-borderless-td">
                                                        <img class="table-borderless-td--img" src="./image/<?php echo $r['image']?>">
                                                    
                                                    </td>
                                                    
                                                    <td class="table-borderless-td">
                                                        <?php echo $r['sale'];?>
                                                    </td>
                                                    <td class="table-borderless-td">
                                                        <?php echo $r['gia_goc'];?>
                                                    </td>
                                                    <td class="table-borderless-td">
                                                        <?php echo $r['gia_moi'];?>
                                                    </td>
                                                    <td class="table-borderless-td">
                                                        <?php echo $r['tinh_trang'];?>
                                                    </td>
                                                    <td class="table-borderless-td">
                                                        <?php echo $r['so_luong'];?>
                                                    </td>
                                                    <td class="table-borderless-td">
                                                        <?php echo $r['ten_dm'];?>
                                                    </td>
                                                    <td class="table-borderless-td" style="display:flex;justify-content: space-around;">
                                                        <a href="editProduct.php?sid=<?php echo $r['id'];?>" class="btn-info">Sửa</a>
                                                        <a onclick="return confirm('bạn có muốn xóa sản phẩm này không')"
                                                            href="removeProduct.php?sid=<?php echo $r['id'];?>" class="btn-danger">Xóa
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php    
                                            }
                                        ?>
                    
                                        </tbody>
                                    </table>    
                                    <?php
                                    include '../pagination.php';
                                    ?>
                                    
                                    <div class="totalRecords"style="color: var(--primary-color);
                                                                            text-align: end;
                                                                            ">
                                        <?php
                                            if(isset($_SESSION['product_filter'])){
                                                ?>
                                                    <strong><?=$totalRecords?> <span>kết quả trả về cho từ khóa </span><?=$value?> trên <span><?=$totalPages?></span> trang</strong>
                                                <?php
                                            }
                                            else {
                                                ?>
                                                <span>Có tất cả <strong><?=$totalRecords?></strong> sản phẩm trên <strong><?=$totalPages?></strong> trang</span>
                                                <?php
                                            }
                                        ?>
                                        
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
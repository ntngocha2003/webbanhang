<?php
    
    session_start();
    ob_start();
    
    require_once 'connect.php';
        if(!empty($_GET['action']) && $_GET['action'] == 'search' && !empty($_POST)){
            $_SESSION['staff_filter'] = $_POST;
            header('Location: renderStaff.php');
        }
        if(!empty($_GET['action']) && $_GET['action'] == 'return' && !empty($_POST)){
            unset($_SESSION['staff_filter']);
            header('Location: renderStaff.php');
        }
        
        if(!empty($_SESSION['staff_filter'])){
            $where = "";
            foreach ($_SESSION['staff_filter'] as $field => $value) {
                
                if(!empty($field)){
                    switch ($field) {
                        case 'ten_dn':
                            $where .= (!empty($where))?" AND ". "`".$field."` LIKE '%".$value."%'" : "`".$field."` LIKE '%".$value."%'";
                            break;
                            
                        }
                    }
                }
                extract($_SESSION['staff_filter']);
            }
            $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 5;
            $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
            $offset = ($current_page - 1) * $item_per_page;
            if(!empty($where)){
                $totalRecords = mysqli_query($conn, "SELECT * FROM `account` where quen LIKE '%Nhân viên%' and (".$where.") ");
                // var_dump($where);exit;
        }else{
            $totalRecords = mysqli_query($conn, "SELECT * FROM `account`where quen LIKE '%Nhân viên%'");
        }
        $totalRecords = $totalRecords->num_rows;
        $totalPages = ceil($totalRecords / $item_per_page);
        if(!empty($where)){
            $staffs = mysqli_query($conn, "SELECT * FROM `account` where quen LIKE '%Nhân viên%' and (".$where.") ORDER BY `id` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
        }else{
            
            $staffs = mysqli_query($conn, "SELECT * FROM `account` where quen LIKE '%Nhân viên%' ORDER BY `id` DESC LIMIT  " . $item_per_page . " OFFSET " . $offset);
            // var_dump( $totalRecords);exit;
        }
        
        // mysqli_close($conn);
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý nhân viên</title>
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
                                    <h2 class="container_heading">Danh sách nhân viên</h2>
                                </div>
                                <div class="control_link">
                                    
                                    <form class="control_link-item" style="margin-right: 0;"action="renderStaff.php?action=search" method="POST">
                                        <!-- <i class="ti-search"style="font-weight: 900;"></i> -->
                                        <input type="submit" name="btnSearch" value="Tìm kiếm" 
                                            style="font-weight: bold;
                                                font-size: 1.4rem;
                                                color: var(--primary-color);
                                                border: 0;
                                                background-color: #fff;
                                                cursor: pointer;">
                                            
                                        <input type="text" class="control_link-item--input" name="ten_dn"value="<?=!empty($value)?$value:""?>">
                                    </form>
                                    <form class="control_link-item" style="margin-right: 0;"action="renderStaff.php?action=return" method="POST">
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
                                            <th class="table-borderless-th" >Tên nhân viên</th>
                                            <th class="table-borderless-th" >Email</th>
                                            <th class="table-borderless-th" >Số điện thoại</th>
                                            <th class="table-borderless-th" >Địa chỉ</th>
                                            
                                            <th class="table-borderless-th" >Giới tính</th>
                                            <th class="table-borderless-th" >Chức vụ</th>
                                            <th class="table-borderless-th" >Thao tác</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                    
                                        <?php
                                            require_once 'connect.php';
                                            
                                            $num=1;
                                            while ($r = mysqli_fetch_array($staffs)){
                                               
                                                ?>
                                                <tr class="table-borderless-tr">
                                                    <td class="table-borderless-td">
                                                        <?php echo $num++; ?>
                                                    </td>
                                                   
                                                    <td class="table-borderless-td">
                                                        <div class="reponsive">

                                                            <?php echo $r['ten_dn'];?>
                                                        </div>
                                                    </td>

                                                    <td class="table-borderless-td">
                                                        <div class="reponsive">
                                                            <?php echo $r['email'];?>
                                                        </div>
                                                    </td>
                                                    <td class="table-borderless-td">
                                                        <div class="reponsive">0<?php echo $r['sdt'];?>
                                                        </div>
                                                    </td>
                                                    <td class="table-borderless-td">
                                                        <div class="detail">

                                                            <?php echo $r['dia_chi'];?>
                                                        </div>
                                                    </td>
                                                    
                                                    <td class="table-borderless-td">
                                                        <div class="reponsive">
                                                           
                                                            <?php echo $r['gioi_tinh'];?>
                                                        </div>
                                                    </td>

                                                    <td class="table-borderless-td">
                                                        <div class="reponsive">
                                                           
                                                            <?php echo $r['quen'];?>
                                                        </div>
                                                    </td>

                                                    <td class="table-borderless-td">
                                                        <div class="reponsive">
                                                            
                                                            <a onclick="return confirm('bạn có muốn xóa nhân viên này không')"
                                                                href="removeStaff.php?sid=<?php echo $r['id'];?>" class="btn-danger">Xóa
                                                            </a>
                                                        </div>
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
                                            if(isset($_SESSION['staff_filter'])){
                                                if(empty($value)){
                                                    ?>
                                                     <span style='color:red'> Bạn chưa nhập từ khóa!!!</span>
                                                    <?php 
                                                }
                                                else{
                                                    ?>
                                                    <span><?=$totalRecords?> <span>kết quả trả về cho từ khóa </span><strong><?=$value?></strong> trên <span><?=$totalPages?></span> trang</span>
                                                <?php
                                                }
                                            }
                                            else {
                                                ?>
                                                <span>Có tất cả <strong><?=$totalRecords?></strong> nhân viên trên <strong><?=$totalPages?></strong> trang</span>
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


    </div>
    <script src="./js/main.js"></script>
</body>
</html>
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

                                    <a class="control_link-item" href="addStaff.php">+ Thêm mới nhân viên</a>
                                    
                                    <a class="control_link-item" href="#" style="margin-right: 0;">
                                        <i class="ti-search"style="font-weight: 900;"></i>
                                            Tìm kiếm
                                            <input type="text" class="control_link-item--input" name="input">
                                    </a>
                                </div>
                                    <table class="table table-borderless">
                                        <thead class="table-borderless-thead">
                                        <tr>
                                            <th class="table-borderless-th" >STT</th>
                                            <th class="table-borderless-th" >Mã nhân viên</th>
                                            <th class="table-borderless-th" >Tên nhân viên</th>
                                            <th class="table-borderless-th" >Ảnh</th>
                                            <th class="table-borderless-th" >Email</th>
                                            <th class="table-borderless-th" >Số điện thoại</th>
                                            <th class="table-borderless-th" >Địa chỉ</th>
                                            <th class="table-borderless-th" >Ngày sinh</th>
                                            <th class="table-borderless-th" >CCCD</th>
                                            <th class="table-borderless-th" >Giới tính</th>
                                            <th class="table-borderless-th" >Chức vụ</th>
                                            <th class="table-borderless-th" >Thao tác</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                    
                                        <?php
                                            require_once 'connect.php';
                                            $num=1;
                                            $render_sql= "SELECT * FROM `staff` ";
                                            $result=mysqli_query($conn,$render_sql);
                                            while($r=mysqli_fetch_assoc($result)){
                                                ?>
                                                <tr class="table-borderless-tr">
                                                    <td class="table-borderless-td">
                                                        <?php echo $num++;?>
                                                    </td>
                                                    <td class="table-borderless-td">
                                                        <?php echo $r['ma_nv'];?>
                                                    </td>
                                                    <td class="table-borderless-td">
                                                        <?php echo $r['ten_nv'];?>
                                                    </td>
                                                    <td class="table-borderless-td">
                                                        <img class="table-borderless-td--img" src="./image/<?php echo $r['image']?>">
                                                    
                                                    </td>
                                                    <td class="table-borderless-td">
                                                        <?php echo $r['email'];?>
                                                    </td>
                                                    <td class="table-borderless-td">
                                                        <?php echo $r['sdt'];?>
                                                    </td>
                                                    <td class="table-borderless-td">
                                                        <?php echo $r['dia_chi'];?>
                                                    </td>
                                                    <td class="table-borderless-td">
                                                        <?php echo $r['ngay_sinh'];?>
                                                    </td>
                                                    <td class="table-borderless-td">
                                                        <?php echo $r['cccd'];?>
                                                    </td>
                                                    <td class="table-borderless-td">
                                                        <?php echo $r['gioi_tinh'];?>
                                                    </td>
                                                    <td class="table-borderless-td">
                                                        <?php echo $r['chuc_vu'];?>
                                                    </td>
                                                    <td class="table-borderless-td" style="display:flex;justify-content: space-around;">
                                                        <a href="editStaff.php?sid=<?php echo $r['id'];?>" class="btn-info">Sửa</a>
                                                        <a onclick="return confirm('bạn có muốn xóa nhân viên này không')"
                                                            href="removeStaff.php?sid=<?php echo $r['id'];?>" class="btn-danger">Xóa
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php    
                                            }
                                        ?>
                    
                                        </tbody>
                                    </table>    
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
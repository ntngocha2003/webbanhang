<?php

    header("Access-Control-Allow-Origin: *");
    require_once './admin/connect.php';

    $pageSize= isset($_GET['pageSize']) ? $_GET['pageSize']:12;
    $page= isset($_GET['page']) ? $_GET['page']:1;
    $start =($page-1) * $pageSize;

    // trả về dữ liệu hiển thị trên 1 trang
    $sql="SELECT * FROM product ORDER BY id ASC LIMIT $start,$pageSize";

    $result = mysqli_query($conn,$sql);


    $data= new stdClass();

    $records= array();
   

    while($row=mysqli_fetch_assoc($result)){
        $records[]=$row;
    }
    
    $data ->records=$records;
  

    // trả về tổng số
    $sql2="select * from product";
    $result2 = mysqli_query($conn,$sql2);
    $totalRecords=mysqli_num_rows($result2);
    $data->totalRecords=$totalRecords;

    echo json_encode($data);
?>
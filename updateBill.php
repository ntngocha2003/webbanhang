<?php
    
    $id=$_POST['id'];
         require_once './admin/connect.php';
         $time=time();
          $updateBill=" UPDATE `orders` SET `tinh_trang`='Đã hủy',`last_updated`=$time WHERE id='$id' ";

        $order="SELECT order_detail.*,orders.*
        FROM order_detail
        INNER JOIN orders ON orders.id = order_detail.id_order
        INNER JOIN product ON product.id = order_detail.id_product
        WHERE orders.id ='$id' ";
        $result=mysqli_query($conn,$order); 
        $sql = mysqli_fetch_all($result, MYSQLI_ASSOC);

        foreach ($sql as $key => $row) {
            $quantity ;
            $product="select * from product where id='".$row["id_product"]."'";
            $result1=mysqli_query($conn,$product); 
            $sql1 = mysqli_fetch_all($result1, MYSQLI_ASSOC);
            $pid=$row["id_product"];
            foreach ($sql1 as $row1){
               
                $quantity=$row1['so_luong'] + $row['so_luong'];
                
                $update=" UPDATE `product` SET `so_luong`='$quantity'  WHERE id=$pid ";
            }
            if($key != count($row1) - 1){
                $pid .=",";
            }
            var_dump($update);
        }

        if(mysqli_query($conn,$updateBill)){
            echo "<h1>Sửa thành công</h1>";
            header("location: bill.php");
        }
        if(mysqli_query($conn,$update)){
            echo "<h1>Sửa thành công</h1>";
            header("location: bill.php");
        }
?>
                 
<?php
    
    $id=$_POST['id'];
        require_once './admin/connect.php';
        $time=time();
        $updateBill=" UPDATE `orders` SET `tinh_trang`='Đã giao hàng',`last_updated`=$time
        WHERE id='$id' ";

        $order="SELECT order_detail.*,orders.*
        FROM order_detail
        INNER JOIN orders ON orders.id = order_detail.id_order
        INNER JOIN product ON product.id = order_detail.id_product
        WHERE orders.id ='$id' ";
        $result=mysqli_query($conn,$order); 
        $sql = mysqli_fetch_all($result, MYSQLI_ASSOC);

        if(mysqli_query($conn,$updateBill)){
            echo "<h1>Sửa thành công</h1>";
            header("location: bill.php");
        }
        
?>
                 
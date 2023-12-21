<?php 
  session_start();
  ob_start();
  require_once './admin/connect.php';
    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác minh việc thanh toán</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./toast/toast.css">
    <link rel="stylesheet" href="./gird/GirdSystem/gird.css">
    <link rel="stylesheet" href="./css/reponsive.css">
    <link rel="stylesheet" href="./css/cart.css">
    <link rel="stylesheet" href="./css/bill.css">
    <link rel="stylesheet" href="./css/product.css">
    <link rel="stylesheet" href="./css/acc.css"><link rel="stylesheet" href="./css/login_register.css">
    <link rel="stylesheet" href="./admin/css/addStaff.css">
    <link rel="stylesheet" href="./admin/css/addProduct.css">
    <link rel="stylesheet" href="./font/themify-icons/themify-icons.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400, 500, 700display=swapsubset=vietnamese" rel="stylesheet">
</head>
<body>
<?php
        if(isset($_SESSION['name'])){
            $row=$_SESSION['name'];
            $render_sql= "SELECT * FROM `account`where ten_dn='$row'";
            $result=mysqli_query($conn,$render_sql);
            $r=mysqli_fetch_assoc($result);
        }
    ?>
<?php
            require_once './admin/connect.php';
           
            if (!empty($_GET['action']) && $_GET['action'] == 'submit' && !empty($_POST)) {
                    $sms=$_POST['sms'];
                    $err=[];
                    if(empty($sms)){
                        $err['sms']='Bạn chưa nhập mã xác thực!';
                    }
                    if(empty($err)){

                        // if(isset($_POST['order_click'])) { 
                             if (!empty($_POST['get'])) { //Xử lý lưu giỏ hàng vào db
                               
                                $products = mysqli_query($conn, "SELECT * FROM `product` WHERE `id` IN (" . implode(",", array_keys($_POST['get'])) . ")");
                                
                                $total = 0;
                                $quantity;
                                $orderProducts = array();
                                while ($rowp = mysqli_fetch_array($products)) {
                                    $orderProducts[] = $rowp;
                                    $total += ($rowp['gia_goc']-($rowp['gia_goc']*$rowp['sale']/100)) * $_POST['get'][$rowp['id']];
                                   
                                }
                                    $insertOrder = mysqli_query($conn, "INSERT INTO `client_order` (`id`, `id_account`, `ghi_chu`, `tong_tien`,`tinh_trang`, `created_time`, `last_updated`) 
                                    VALUES (NULL,'". $r['id'] ."', '" . $_POST['note'] . "', '" . $total . "','Đang chờ hàng', '" . time() . "', '" . time() . "');");
                               
                                $clientID = $conn->insert_id;
                                $insertOrder = mysqli_query($conn, "INSERT INTO `payment` (`id`, `id_account`, `id_client`, `phuong_thuc`,`trang_thai`,`tong_tien`, `created_time`) 
                                    VALUES (NULL,'". $r['id'] ."', '" . $clientID .  "','Thanh toán bằng thẻ tín dụng' ,'Thanh toán thành công','" . $total . "', '" . time() . "');");
                                $insertString = "";
                                foreach ($orderProducts as $key => $product) {
                                    $insertString .= "(NULL, '" . $clientID . "', '" . $product['id'] . "','".($product['gia_goc']-($product['gia_goc']*$product['sale']/100))."', '" . $_POST['get'][$product['id']] . "', '" . time() . "', '" . time() . "')";
                                    $quantity=$product['so_luong']-$_POST['get'][$product['id']];
                                    $whereProduct=$product['id'];
                                    $updateProduct= mysqli_query($conn, "UPDATE `product` set `so_luong`='$quantity' where id=$whereProduct");
                                    if ($key != count($orderProducts) - 1) {
                                        $insertString .= ",";
                                        $whereProduct .=",";
                                    }
                                }
    
                                $insertOrder = mysqli_query($conn, "INSERT INTO `orders` (`id`, `id_client`, `id_product`, `gia_tien`, `so_luong`,`created_time`, `last_updated`) VALUES " . $insertString . ";");
       
                                unset($_SESSION['cart']);
                                
                             }
                            header('Location: ./paySuccess.php');
                    }
                     } 
                    // break;   
            // }
            // }
            if (!empty($_SESSION["cart"])) {
                $products = mysqli_query($conn, "SELECT * FROM `product` WHERE `id` IN (".implode(",", array_keys($_SESSION["cart"])).")");
                
            }
        ?>
       

        <div id="toast"></div>
            <form class="contact-content" action="accuracyPay.php?action=submit" method="POST">
                <div class="form-pay--order auth-form__container" style="margin: 90px 300px;
                                                        background-color: #eeeeee8c;
                                                        width: 600px;
                                                        padding: 30px;">
                      <div class="auth-form__header">
                          <h3 class="auth-form__heading"style="margin-bottom: 24px;">Xác minh việc thanh toán</h3>
                      </div>

                      <p style="font-weight: 600;">Ở bước này bạn cần nhập mã xác thực để hoàn tất thanh toán!</p>

                      <div class="icon-pay" style="display: inline-flex;justify-content: space-between;">
                      <img src="./image/MBBank-2.png" style="width: 10%;height: 10%;margin-top: 8px;" alt="icon">
                      <img src="./image/visa_pay.png" style="width: 10%;height: 10%;" alt="icon">
                      </div>

                      <?php
                        if (!empty($products)){
                            $total = 0;
                            while ($row = mysqli_fetch_array($products)) {
                                $total += ($row['gia_goc']-($row['gia_goc']*$row['sale']/100)) * $_SESSION["cart"][$row['id']];
                                ?>
                                <input class="select-quantity-screen" type="hidden" min="0" max="<?=$row['so_luong']?>" value="<?= $_SESSION["cart"][$row['id']] ?>"
                                                                                                                name="get[<?= $row['id'] ?>]" />
                                <?php
                            }
                            
                            }
        ?>

                      <div class="row sm-gutter" style="font-size: 1.4rem;
                                                        margin-bottom: 20px;
                                                        background-color: #fff;
                                                        color: #6ea1ce;
                                                        padding: 4px 0;
                                                        margin-left: 0px;">
                            <div class="col l-6 c-6 m-6">
                                <p class="title">Đơn vị chấp nhận thẻ: </p>
                                <p class="title">Tổng thanh toán: </p>
                                <p class="title">Ngày giao dịch: </p>
                                <p class="title">Số thẻ: </p>
                            </div>
                            
                            <div class="col l-6 c-6 m-6">
                                <p>NgocHa_Shop</p>
                                <p><?=$total?> đ</p>
                                <?php
                                    $n=date('d/m/Y', time());
                                    $ngaygiao = DateTime::createFromFormat('d/m/yy', $n);
                                    echo $ngaygiao->format('d/m/Y'); 
                                    ?>
                                    <p>**** **** **** ****</p>
                            </div>
                        </div>
                            <label class="control-label success-notifi">Phương thức xác thực: </label>
                                <select class="from-email form-control" id="exampleSelect2" required>
                                    <option>SMS</option>
                                </select>

                            <input type="text" id="smsCard" class="form-control"  name="sms" placeholder="SMS">
                            <span class="message messageNotifi" style="display: block;margin-top: -10px;margin-bottom: 10px;">
                                                    <?php
                                                        echo (isset($err['sms'])?($err['sms']):'');
                                                    ?>
                                                </span>
                            <span class="message messageTime" >Mã có hiệu lực trong vòng: <p class="time"style="display: contents;"></p><p style="display: contents;"> s</p></span>
                            <p class="textNote">Quý khách lưu ý nhập đúng các ký tự viết hoa viết thường của mã bảo mật khi nhận được. Vui lòng liên hệ tổng đài MB247 1900545426 để được hỗ trợ.</p>
                        <div class="auth-form__controls">
                          <a href="pay.php" class="btn auth-form__controls-back btn--normal" 
                            style="background-color: #aaa;font-size:1.4rem;
                            display: flex;">Trở lại</a>
                          
                        </div>

                        <div style="margin-top: 20px;">
                        <input class="btn-confirm btn-order"style="width:100%" type="submit" name="order_click"value="Gửi giao dịch" />
                         <!-- <button class="btn btn--primary btn-sendAccurracy" type="submit" name="order_click" style=" width: 100%;">Gửi giao dịch</button> -->
                        </div>
      
                </div>
        </form>   
                <div class="">
                    <button class="btn btn-sendEmail">Gửi mã</button>
                    <button class="btn btnSend">Gửi mã</button>
                </div>
               
</body>
<script>
    const btnSendEmail=document.querySelector('.btn-sendEmail')
    const btnSend=document.querySelector('.btnSend')
    const btnOrder=document.querySelector('.btn-order')
    const formMail=document.querySelector('#exampleSelect2')
    const smsCard=document.querySelector('#smsCard')
    const messageTime=document.querySelector('.messageTime')
    const messageNotifi=document.querySelector('.messageNotifi')
    const textNote=document.querySelector('.textNote')
    const formPayOrder=document.querySelector('.form-pay--order')
    const formSuccess=document.querySelector('.form-success')
    const successNotifi=document.querySelector('.success-notifi')
    const time=document.querySelector('.time')

    var num=16
    function timeCode(){
        num--;
        if(num!=0){
            time.innerHTML=num
            setTimeout("timeCode()",1000)
        }
        else{
            successNotifi.innerHTML="Đã hết thời gian vui lòng yêu cầu gửi lại!"
            successNotifi.style.color='#F44336'
            formMail.style.display="flex"
            smsCard.style.display="none"
            messageTime.style.display="none"
            textNote.style.display="none"
            btnSendEmail.style.display="none"
            btnSend.style.display="flex"
           
        }
    }
    var num2=16
    function timeCode2(){
        num2--;
        if(num2!=0){
            time.innerHTML=num2
            setTimeout("timeCode2()",1000)
        }
        else{
            successNotifi.innerHTML="Đơn hàng của quý khách tạm thời chưa thể thanh toán, vui lòng quay lại sau!"
            successNotifi.style.color='#F44336'
            formMail.style.display="flex"
            smsCard.style.display="none"
            messageTime.style.display="none"
            textNote.style.display="none"
            btnSendEmail.style.display="none"
            btnSend.style.display="none"
            btnOrder.style.display="none"
           
        }
    }

    btnSendEmail.addEventListener('click',()=>{
        btnSendEmail.innerHTML="Đang gửi mã..."
        setTimeout(()=>{
                successNotifi.innerHTML="Mật khẩu đã được gửi đến số điện thoại quý khách đăng ký mới MB. Vui lòng nhập mật khẩu"
                formMail.style.display="none"
                smsCard.style.display="flex"
                messageTime.style.display="block"
                textNote.style.display="flex"
                btnSendEmail.innerHTML="Gửi mã"
                successNotifi.style.color='#aaa'
                messageNotifi.style.display="none"
                timeCode();
            },3000)
    })

    btnSend.addEventListener('click',()=>{
        btnSend.innerHTML="Đang gửi mã..."
        setTimeout(()=>{
                successNotifi.innerHTML="Mật khẩu đã được gửi đến số điện thoại quý khách đăng ký mới MB. Vui lòng nhập mật khẩu"
                formMail.style.display="none"
                smsCard.style.display="flex"
                messageTime.style.display="block"
                textNote.style.display="flex"
                btnSend.innerHTML="Gửi mã"
                successNotifi.style.color='#aaa'
                messageNotifi.style.display="none"
                timeCode2();
            },3000)
    })
</script>
</html>
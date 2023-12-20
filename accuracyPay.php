
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
<div id="toast"></div>
                <div class="form-pay--order auth-form__container" style="margin: 90px 300px;
                                                        background-color: #eee;
                                                        width: 500px;
                                                        padding: 30px;">
                      <div class="auth-form__header">
                          <h3 class="auth-form__heading"style="margin-bottom: 24px;">Xác minh việc thanh toán</h3>
                      </div>

                      <p style="font-weight: 600;">Ở bước này bạn cần nhập mã xác thực để hoàn tất thanh toán!</p>

                      <div class="icon-pay" style="display: inline-flex;justify-content: space-between;">
                      <img src="./image/MBBank-2.png" style="width: 10%;height: 10%;margin-top: 8px;" alt="icon">
                      <img src="./image/visa_pay.png" style="width: 10%;height: 10%;" alt="icon">
                      </div>

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
                                <p>1000000</p>
                                <?php
                                    $n=date('d/m/Y', time());
                                    $ngaygiao = DateTime::createFromFormat('d/m/yy', $n);
                                    echo $ngaygiao->format('d/m/Y'); 
                                    ?>
                                    <p>.....................</p>
                            </div>
                        </div>
                            <label class="control-label"style="color: var(--primary-color);margin-bottom: 8px;">Phương thức xác thức: </label>
                                <select class="form-control"style="margin-bottom: 20px;color:aaa;width: 100%;" id="exampleSelect2" required>
                                    <option>Email</option>
                                </select>
      
                        <div class="auth-form__controls">
                          <a href="pay.php" class="btn auth-form__controls-back btn--normal" 
                            style="background-color: #aaa;font-size:1.4rem;
                            display: flex;">Trở lại</a>
                          <a href="accuracyPay.php"class="btn auth-form__controls-back btn--normal" style="background-color: #adb5bd;
                                                                                                            font-size: 1.4rem;
                                                                                                            display: flex;
                                                                                                            color: #fff;">Gửi mã</a>
                        </div>

                        <div style="margin-top: 20px;">
                         <button class="btn btn--primary btn-sendAccurracy"style=" width: 100%;">Gửi giao dịch</button>
                        </div>
      
                </div>
                
                <script src="./js/toast.js"></script>

                <div class="form-success" style="margin: 90px 300px;
                                                    background-color: #eeeeeea8;
                                                    width: 500px;
                                                    padding: 30px;
                                                    display:none
                                                ">
                      <div class="auth-form__header" style="text-align: center;
                                                            font-size: 4.4rem;
                                                            color: #008000b8;">
                          <i class="fas fa-check-circle"></i>
                      </div>
                      <div class="auth-form__header"style="text-align: center;">
                          <h3 class="auth-form__heading"style="margin-bottom: 24px;">Đặt hàng thành công</h3>
                      </div>
                      <p style="margin-top: -5px;
                                font-weight: 600;
                                margin-bottom: 25px;
                                color: #aaa;
                                font-size: 1.1rem;">Chúng tôi sẽ liên hệ với quý khách để xác nhận đơn hàng trong thời gian sớm nhất</p>
                    
                        <div class="auth-form__controls">
                          <a href="home.php" class="btn btn--primary" 
                            style="font-size:1.4rem;
                            display: flex;">Quay lại trang chủ</a>
                          <a href=""class="btn auth-form__controls-back btn--normal" style="margin-left: 136px;background-color: #fff;
                                                                                            font-size: 1.4rem;
                                                                                            display: flex;
                                                                                            color: var(--primary-color);">Xem chi tiết đơn hàng</a>`
                        </div>
 
                </div>
</body>
<script>
    const formPayOrder=document.querySelector('.form-pay--order')
    const formSuccess=document.querySelector('.form-success')
    function showFormSuccess(){
        formSuccess.style.display="block"
    }

    function hideFormPayOrder(){
        formPayOrder.style.display="none"
    }
    const btnSendAccurracy=document.querySelector('.btn-sendAccurracy')
        
        btnSendAccurracy.addEventListener('click',()=>{
            
            
                btnSendAccurracy.innerHTML="Đang xử lý..."
                setTimeout(()=>{
                    showFormSuccess();
                    hideFormPayOrder();
                    btnSendAccurracy.innerHTML="Gửi giao dịch"
                },3000)
        })
</script>
</html>
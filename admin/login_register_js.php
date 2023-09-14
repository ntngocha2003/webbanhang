<div class="modal modal_register">
            <div class="modal__overlay"></div>

            <div class="modal__body modal__container--register">

                <!-- Register form -->
                <div class="auth-form register-form">
                    <div class="auth-form__container">
                        <div class="auth-form__icon auth-form__icon--register">
                            <i class="ti-close icon-close"></i>
                        </div>
                        <div class="auth-form__header">
                            <h3 class="auth-form__heading">Đăng ký</h3>
                        </div>
                        
                        <div class="auth-form__form">
                            <div class="auth-form__group">
                                <input type="number" class="auth-form__input" id="phoneRegister" placeholder="Sđt">
                            </div>
                            <span class="message messageNumber"></span>
                        </div>
                        <div class="auth-form__form">
                            <div class="auth-form__group">
                                <input type="text" class="auth-form__input" id="nameRegister" placeholder="Name">
                            </div>
                            <span class="message messageName"></span>
                        </div>
                        <div class="auth-form__form">
                            <div class="auth-form__group">
                                <input type="password" class="auth-form__input" id="passwordRegister" placeholder="Mật khẩu">
                            </div>
                            <span class="message messagePass"></span>
                        </div>
                        <div class="auth-form__form">
                            <div class="auth-form__group">
                                <input type="password" class="auth-form__input" id="passwordRegisterAgain" placeholder="Nhập lại mật khẩu">
                            </div>
                            <span class="message messagePassAgain"></span>
                        </div>

                        <div class="auth-form__aside">
                            <p class="auth-form__policy-text">
                                Bằng việc đăng kí ,bạn đã đồng ý với Ngọc Hà_shop về
                                <a href="" class="auth-form__text-link">Điều khoản dịch vụ</a>&
                                <a href="" class="auth-form__text-link">Chính sách bảo mật</a>
                            </p>
                        </div>
    
                        <div class="auth-form__controls">
                            <button class="btn auth-form__controls-back btn--normal">TRỞ LẠI</button>
                            <button class="btn btn--primary btn-register">ĐĂNG KÝ</button>
                        </div>

                        <p class="question">
                            Bạn đã có tài khoản?
                            <a class="link-login" href="#">Đăng nhập</a>
                        </p>
    
                    </div>
                    
                </div>
            
            </div>
        </div> 
        
        <!-- Login form -->
        <div class="modal modal_login">
            <div class="modal__overlay"></div>

            <div class="modal__body modal__container--login">

                <div class="auth-form login-form">
                    <div class="auth-form__container">
                        <div class="auth-form__icon auth-form__icon--login">
                            <i class="ti-close icon-close"></i>
                        </div>
                        <div class="auth-form__header">
                            <h3 class="auth-form__heading">Đăng nhập</h3>
                        </div>
        
                        <div class="auth-form__form auth-form__form1">
                            <div class="auth-form__group">
                                <input type="text" class="auth-form__input" id="nameLogin" placeholder="Name">
                            </div>
                            <span class="message messageNameLogin"></span>
                        </div>
                        <div class="auth-form__form auth-form__form1">
                            <div class="auth-form__group">
                                <input type="password" class="auth-form__input" id="passwordLogin" placeholder="Mật khẩu">
                            </div>
                            <span class="message messagePassLogin"></span>
                        </div>
        
                        <div class="auth-form__aside">
                            <div class="auth-form__help">
                                <a href="" class="auth-form__help-link auth-form__help-forgot">Quên mật khẩu</a>
                                <span class="auth-form__help-separate"></span>
                                <a href="" class="auth-form__help-link">Cần trợ giúp?</a>
                            </div>
                        </div>
        
        
                        <div class="auth-form__controls">
                            <button class="btn auth-form__controls-back btn--normal">TRỞ LẠI</button>
                            <button class="btn btn--primary btn-login">ĐĂNG NHẬP</button>
                        </div>
        
                        <p class="question">
                            Bạn chưa có tài khoản?
                            <a class="link-register" href="#">Đăng ký</a>
                        </p>
                    </div>
                    
                </div>
            </div>
        </div>

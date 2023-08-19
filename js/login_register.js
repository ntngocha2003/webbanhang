
const modalRegister=document.querySelector('.modal_register');
const modalLogin=document.querySelector('.modal_login');
const btnStartRegister=document.querySelector('.btn-start--register')
const btnStartLogin=document.querySelector('.btn-start--login')
const registerForm=document.querySelector('.register-form')
const linkLogin=document.querySelector('.link-login')
const loginForm=document.querySelector('.login-form')
const linkRegister=document.querySelector('.link-register')
const closeRegister=document.querySelector('.auth-form__icon--register')
const closeLogin=document.querySelector('.auth-form__icon--login')

const btnLogin=document.querySelector('.btn-login')
const btnRegister=document.querySelector('.btn-register')

// đăng ký
const inputPhone=document.querySelector('#phoneRegister')
const inputName=document.querySelector('#nameRegister')
const inputPass=document.querySelector('#passwordRegister')
const inputPassAgain=document.querySelector('#passwordRegisterAgain')
const messageNumber=document.querySelector('.messageNumber')
const messageName=document.querySelector('.messageName')
const messagePass=document.querySelector('.messagePass')
const messagePassAgain=document.querySelector('.messagePassAgain')
// đăng nhập
const inputNameLogin=document.querySelector('#nameLogin')
const inputPassLogin=document.querySelector('#passwordLogin')
const messageNameLogin=document.querySelector('.messageNameLogin')
const messagePassLogin=document.querySelector('.messagePassLogin')


// hiện form đăng nhập
function showFormLogin(){
    modalLogin.classList.add('open');
    loginForm.classList.add('open')
}
// ẩn form đăng nhập
function hideFormLogin(){
    modalLogin.classList.remove('open');
    loginForm.classList.remove('open')
} 
closeLogin.addEventListener('click',hideFormLogin)
// hiện form đăng ký
function showFormRegister(){
    modalRegister.classList.add('open');
    registerForm.classList.add('open')
}
// ẩm form đăng ký
function hideFormRegister(){
    modalRegister.classList.remove('open');
    registerForm.classList.remove('open')
}
closeRegister.addEventListener('click',hideFormRegister)

// xử lý đăng ký
btnStartRegister.addEventListener('click',showFormRegister)
linkLogin.addEventListener('click',showFormLogin)
linkLogin.addEventListener('click',hideFormRegister)


btnRegister.addEventListener('click',(e)=>{
    const sdt=inputPhone.value;
    const name=inputName.value;
    const pass=inputPass.value;
    const passAgain=inputPassAgain.value;
    e.preventDefault();

    if(sdt.trim()===''){
        messageNumber.textContent = "bạn chưa nhập số điện thoại"
    }
    
    else{
        messageNumber.textContent = ""
    }

    if(name.trim()===''){
        messageName.textContent = "bạn chưa nhập tên tài khoản"
    }
    
    else{
        messageName.textContent = ""
    }

    if(pass.trim()===''){
        messagePass.textContent = "bạn chưa nhập mật khẩu tài khoản"
    }
    else{
        messagePass.textContent = ""
    }

    if(passAgain.trim()===''){
        messagePassAgain.textContent = "bạn cần nhập lại mật khẩu tài khoản"
    }
    else{
        messagePassAgain.textContent = ""
    }

    if(sdt!==''&& name!==''&& pass!==0 && passAgain!==0){
        btnRegister.innerHTML="Loading..."
        setTimeout(()=>{
            hideFormRegister()
            showSuccessToastRegister();
            inputPhone.value=''
            inputName.value=''
            inputPass.value=''
            inputPassAgain.value=''
            btnRegister.innerHTML="Đăng ký"
        },3000)
    }
})

// xử lý đăng nhập
btnStartLogin.addEventListener('click',showFormLogin)
linkRegister.addEventListener('click',hideFormLogin)
linkRegister.addEventListener('click',showFormRegister)

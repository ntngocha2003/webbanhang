
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
// hàm xử lý đăng nhập thành công; hiện tên tài khoản
const headerUser=document.querySelector('#header__navbar-user')

function showUser(){
    headerUser.classList.add('openTK')
    btnStartRegister.classList.add('hideTK')
    btnStartLogin.classList.add('hideTK')
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
        return false
    }
    else if(sdt.trim()<10){
        messageNumber.textContent = "bạn cần nhập đủ 10 số"
        return false
    }

    else{
        messageNumber.textContent = ""
    }

    if(name.trim()===''){
        messageName.textContent = "bạn chưa nhập tên tài khoản"
        return false
    }
    
    else{
        messageName.textContent = ""
    }

    if(pass.trim()===''){
        messagePass.textContent = "bạn chưa nhập mật khẩu tài khoản"
        return false
    }
    else if(pass<6){
        messagePass.textContent = "bạn cần nhập ít nhất 6 ký tự"
        return false
    }
    else{
        messagePass.textContent = ""
    }

    if(passAgain.trim()===''){
        messagePassAgain.textContent = "bạn cần nhập lại mật khẩu tài khoản"
        return false
    }
    else{
        messagePassAgain.textContent = ""
    }

    if(true){
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
let acc={
    name:'Nguyễn Ngọc Anh',
    pass:'anh0806'
}
// xử lý đăng nhập
btnStartLogin.addEventListener('click',showFormLogin)
linkRegister.addEventListener('click',hideFormLogin)
linkRegister.addEventListener('click',showFormRegister)

btnLogin.addEventListener('click',(e)=>{
    const nameLogin=inputNameLogin.value;
    const passLogin=inputPassLogin.value;
    e.preventDefault;

    if(nameLogin.trim()===''){
        messageNameLogin.textContent="bạn chưa nhập tên tài khoản"
        
        return false;
    }
    else if(nameLogin.trim()!==acc.name){
        messageNameLogin.textContent="sai tên tài khoản, vui lòng nhập lại!!!!"
        inputNameLogin.value=''
        return false;
    }
    else{
        messageNameLogin.textContent=''
    }

    if(passLogin.trim()===''){
        messagePassLogin.textContent="bạn chưa nhập tên mật khẩu"
        return false;
    }
    else if(passLogin.trim()!==acc.pass){
        messagePassLogin.textContent="sai mật khẩu, vui lòng nhập lại!!!!"
        inputPassLogin.value=''
        return false;
    }
    else{
        messagePassLogin.textContent=''
    }

    if(true){
        btnLogin.innerHTML="loading..."
        setTimeout(()=>{
            hideFormLogin();
            showUser();
            showSuccessToastLogin();
            inputNameLogin.value=''
            inputPassLogin.value=''
            btnLogin.innerHTML="Đăng nhập"
        },3000)

    }

})


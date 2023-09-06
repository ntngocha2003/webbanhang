const btnLogin=document.querySelector('.btn-admin')
const messageName=document.querySelector('.messageName')
const messagePass=document.querySelector('.messagePass')
const inputName=document.querySelector('#form1Example13')
const inputPass=document.querySelector('#form1Example23')

let acc={
    name:'Nguyễn Hà',
    pass:'ha0806'
}
// xử lý đăng nhập
function login(e){
    const nameLogin=inputName.value;
    const passLogin=inputPass.value;
    e.preventDefault;

    if(nameLogin.trim()===''){
        messageName.textContent="bạn chưa nhập tên tài khoản"
        
        return false;
    }
    else if(nameLogin.trim()!==acc.name){
        messageNameLogin.textContent="sai tên tài khoản, vui lòng nhập lại!!!!"
        inputName.value=''
        return false;
    }
    else{
        messageName.textContent=''
    }

    if(passLogin.trim()===''){
        messagePass.textContent="bạn chưa nhập tên mật khẩu"
        return false;
    }
    else if(passLogin.trim()!==acc.pass){
        messagePass.textContent="sai mật khẩu, vui lòng nhập lại!!!!"
        inputPass.value=''
        return false;
    }
    else{
        messagePass.textContent=''
    }

    if(true){
        btnLogin.innerHTML="loading..."
        setTimeout(()=>{
            inputName.value=''
            inputPass.value=''
            btnLogin.innerHTML="Đăng nhập"
            
        },3000)

    }
}

// btnLogin.addEventListener('click',login())


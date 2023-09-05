const accBar =document.querySelector('.header_bar')
const acc=document.querySelector('.colum-1')
const accClose=document.querySelector('.admin_close')
const addStaff=document.querySelector('.add_staff')

// hàm hiện acc
function showFormAcc(){
    acc.classList.add('openTB')
    addStaff.classList.add('colorTB')
}
// hàm ẩn
function hideFormAcc(){
    acc.classList.remove('openTB')
    addStaff.classList.remove('colorTB')
}

accBar.addEventListener('click',showFormAcc)
accClose.addEventListener('click',hideFormAcc)
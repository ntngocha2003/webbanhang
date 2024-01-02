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
    
        const addCard = document.querySelector('.btn-payvisa')
        const modal = document.querySelector('.js-modal')
        const modalContainer = document.querySelector('.js-modal-container')
        const modalClose = document.querySelector('.btn-payclose')

        
        function showPayCard () {
            modal.style.display="flex"
        }
        
       
        function hidePayCard () {
            modal.classList.remove('open')
        }

        addCard.addEventListener('click', showPayCard)
      
        modalClose.addEventListener('click', hidePayCard)

        modal.addEventListener('click', hidePayCard)

        modalContainer.addEventListener('click', function(event) {
            event.stopPropagation()
        })
   
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


    // const listAccount=document.querySelector('.list-acc');
    // const iconRight=document.querySelector('.icon-right')
    // const listAccountItem=document.querySelector('.list_acc-items');
    // const iconOpen=document.querySelector('.icon-open')
    const listControlItem1=document.querySelector('.list_contol-item1')
    const listControlItem2=document.querySelector('.list_contol-item2')
    const listControlItem3=document.querySelector('.list_contol-item3')
    const listControlItem4=document.querySelector('.list_contol-item4')
    const listControlItem5=document.querySelector('.list_contol-item5')
                        
    function showListAcc(){
        listAccountItem.style.display="block"
        iconRight.style.display="none"
        iconOpen.style.display="flex"
        iconOpen.style.color="#fff"
        iconOpen.style.backgroundColor=" #bbb";
        iconOpen.style.borderRadius="6px";
    }  
    
    function hideListAcc(){
        listAccountItem.style.display="none"
        iconRight.style.display="flex"
        iconOpen.style.display="none"
    }  
    // function activeList1(){
    //     listControlItem1.style.color="#fff"
    //     listControlItem1.style.backgroundColor=" #bbb";
    //     listControlItem1.style.borderRadius="6px";
    // }                     
                        
    // iconRight.addEventListener('click',showListAcc)
    // iconOpen.addEventListener('click',hideListAcc)
    // listControlItem1.addEventListener('click',activeList1)     
    
    
    
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
   
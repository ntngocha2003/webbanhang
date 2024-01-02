
        const btnPayCardOrder=document.querySelector('.btn-payCard--order')
        const btnOrder=document.querySelector('.btn-order')
        const showCard=document.querySelector('.show-card')
        const addCard = document.querySelector('.btn-payvisa')
        const modal = document.querySelector('.js-modal')
        const modalContainer = document.querySelector('.js-modal-container')
        const modalClose = document.querySelector('.btn-payclose')
        const payCard = document.querySelector('.btn-paycard')

        const numberCard=document.querySelector('#numberCard')
        const nameCard=document.querySelector('#nameCard')
        const dateCard=document.querySelector('#dateCard')
        const codeCard=document.querySelector('#codeCard')
        const messageNumber=document.querySelector('.messageNumber')
        const messageName=document.querySelector('.messageName')
        const messageDate=document.querySelector('.messageDate')
        const messageCode=document.querySelector('.messageCode')

        const myCard=document.querySelector('.myCard')
        const myCardDate=document.querySelector('.myCardDate')
        const numberCard2=document.querySelector('.number-card')
        function showPayCard () {
            modal.style.display="flex"
        }
        
       
        function hidePayCard () {
            modal.style.display="none"
        }

        
        payCard.addEventListener('click',(e)=>{
            
            const number=numberCard.value;
            const name=nameCard.value;
            const date=dateCard.value;
            const pass=codeCard.value;
           
            e.preventDefault();
            if(number.trim()===''){
                messageNumber.textContent = "bạn chưa nhập số tài khỏan"
                return false
            }
            else if(number<19){
                messageNumber.textContent = "bạn cần nhập đủ 16 số"
                return false
            }

            else{
                messageNumber.textContent = ""
            }

            if(name.trim()===''){
                messageName.textContent = "bạn chưa nhập tên chủ thẻ"
                return false
            }
            
            else{
                messageName.textContent = ""
            }

            

            if(date.trim()===''){
                messageDate.textContent = "bạn cần nhập ngày hết hạn của thẻ"
                return false
            }
            else{
                messageDate.textContent = ""
            }
            if(pass.trim()===''){
                messageCode.textContent = "bạn chưa nhập mã cvv"
                return false
            }
            else if(pass<3){
                messageCode.textContent = "bạn cần nhập đủ 3 ký tự"
                return false
            }
            else{
                messageCode.textContent = ""
            }

            if(true){
                payCard.innerHTML="Đang xác thực..."
                numberCard2.style.fontSize='2.6rem'
                numberCard2.innerHTML=numberCard.value
                myCard.innerHTML=nameCard.value
                myCardDate.innerHTML=dateCard.value
                setTimeout(()=>{
                    showSuccessToastPayCard();
                    hidePayCard()
                    payCard.innerHTML="Xác nhận"
                    showCard.style.display="flex"
                    btnOrder.style.display='none'
                    btnPayCardOrder.style.display='block'
                    
                    numberCard.value=''
                    nameCard.value=''
                    dateCard.value=''
                    codeCard.value=''
                },3000)
            }

        })
        addCard.addEventListener('click', showPayCard)
      
        modalClose.addEventListener('click', hidePayCard)

        modal.addEventListener('click', hidePayCard)

        modalContainer.addEventListener('click', function(event) {
            event.stopPropagation()
        })

        
        
                                 

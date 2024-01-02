       
        const modal = document.querySelector('.js-modalHome')
        const modalContainer = document.querySelector('.js-modal-containerHome')
        const modalClose = document.querySelector('.iHome-close')
        
        function showAdvertisement() {
            modal.classList.add('openAdvertisement')
        }
              
        function hideAdvertisement() {
            modal.classList.remove('openAdvertisement')
        }

        
        function handle(){
            setTimeout(()=>{
                showAdvertisement();
            },2000)
        }

            handle();

            function removeHandle(){
                setTimeout(()=>{
                    hideAdvertisement();
                },8000)
            }
    
            removeHandle();
        modalClose.addEventListener('click', hideAdvertisement)
                                 

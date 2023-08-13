// xoa san pham
var btnReturn=document.getElementsByClassName('btn-return')
for(var i=0;i<btnReturn.length;i++){
    
    btnReturn[i].addEventListener('click',()=>{
        event.target.parentElement.parentElement.parentElement.remove();
        updatecart();
    })
}
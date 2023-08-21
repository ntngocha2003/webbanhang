
// cap nhat san pham
function updatecart() {
    var listItems = document.getElementsByClassName("list-items")[0];
    var itemRow = listItems.getElementsByClassName("item-row");
    var total=0;
    var sum = 0;
    for (var i = 0; i < itemRow.length; i++) {
      
      var quantityItem = itemRow[i].getElementsByClassName("select-quantity-screen")[0]
      var subtotal=itemRow[i].getElementsByClassName("subtotal")[0]

      var itemTotal = parseFloat(subtotal.innerText)// chuyển một chuổi string sang number để tính tổng tiền.
      
      var quantity = quantityItem.value // lấy giá trị trong thẻ input

      total=total+(itemTotal * quantity)
      document.getElementsByClassName("total")[0].innerText = total + 'VNĐ'

      sum = sum + total;
    }
    document.getElementsByClassName("total-prices")[0].innerText = sum + 'VNĐ'
    
  }
 

// thay doi so luong san pham

var quantityInput = document.getElementsByClassName("select-quantity-screen");
for (var i = 0; i < quantityInput.length; i++) {
  quantityInput[i].addEventListener("change", function (event) {
    
    if (isNaN(event.target.value) || event.target.value <= 0) {
      event.target.value = 1;
    }
    updatecart()
  })
}

// xoa san pham
var btnRemove=document.getElementsByClassName('btn-remove')
for(var i=0;i<btnRemove.length;i++){
    
    btnRemove[i].addEventListener('click',()=>{
        event.target.parentElement.parentElement.parentElement.remove();
        updatecart();
    })
}


// them san pham 
const btnAdd=document.querySelectorAll('.home-product-item--add')
btnAdd.forEach((btn,index)=>{
    btn.addEventListener('click',(e)=>{
        var btnItem=e.target
        var product=btnItem.parentElement.parentElement.parentElement.parentElement;
        var productImg=product.querySelector('.home-product-item__img').src
        var productName=product.querySelector('.home-product-item__name').innerText
        var productPrice=product.querySelector('.home-product-item__price-current').innerText
        var productQuantity=product.querySelector('.home-product-item__sold').innerText
        addCart(productImg,productName,productPrice,productQuantity)
    })
})

function addCart(productImg,productName,productPrice,productQuantity){
    const addDiv=document.createElement("div");
    const contentCart=
        `
        <div class="header__cart-item">
            <img class="img-cart" src="${productImg}">
                <div class="header__cart-item-info">
                    <div class="header__cart-item-head">
                        <h5 class="header__cart-item-name">${productName}</h5>
                            <div class="header__cart-item-price-wrap">
                                <span class="header__cart-item-price">${productPrice}</span>
                                <span class="header__cart-item-multiply">x</span>
                                <span class="header__card-item-qnt">3</span>
                            </div>
                    </div>

                    <div class="header__cart-item-body">
                        <span class="quantity-cart">${productQuantity}</span>
                        <span class="header__cart-item-remove">Xóa</span>
                    </div>

                </div>
        </div>
        `
    const bodyCart=document.querySelector('.header__cart-list-item');
    addDiv.innerHTML=contentCart;
    bodyCart.append(addDiv)
    ;
}

// bật lên modal 
const btnBuy=document.querySelector('.btn-buy')
const modalInformation=document.querySelector('.modal__information')
const modalContainerInformation=document.querySelector('.modal__container--information')
const btnCancel=document.querySelector('.btn-cancel')
const btnConfirm=document.querySelector('.btn-confirm')
// hàm bật lên
function showFormInformation(){
    modalInformation.classList.add('open')
    modalContainerInformation.classList.add('open')
}
// hàm ẩn
function hideFormInformation(){
    modalInformation.classList.remove('open')
    modalContainerInformation.className.remove('open')
}

btnBuy.addEventListener('click',showFormInformation)
btnCancel.addEventListener('click',hideFormInformation)

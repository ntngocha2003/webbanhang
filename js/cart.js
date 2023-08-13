
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

  // them san pham 
 

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

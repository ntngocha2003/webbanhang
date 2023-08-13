const listDataItemsSP = getDataLocalStorage(keyLocalStorageListsSP);
//const dataListItemsCart = getDataLocalStorage(keyLocalStorageItemsCard);

if (!listDataItemsSP) {
    setDataLocalStorage(keyLocalStorageListsSP, listData);
}

  (()=> {
    const appContent=document.querySelector('.product-item')
   
        const renderListData=listDataItemsSP.map((data) => {
        return `  
            <div class="col l-2 m-4 c-6">
                <a class="home-product-item" href="#">
                    <div>
                        <img src="${data.image}" class="home-product-item__img">
                    </div>
                    <h4 class="home-product-item__name">${data.name}</h4>
                    <div class="home-product-item__price">
                        <span class="home-product-item__price-old">${data.priceOld}đ</span>
                        <span class="home-product-item__price-current">${data.priceNew}đ</span>
                    </div>
                    <div class="home-product-item__action">
                        
                        <span class="home-product-item__sold">quanttity:${data.quantity}</span>
                        <div class="home-product-item--add">
                        <i class="home-product-item--icon fas fa-cart-plus"></i>
                        </div>
                    </div>
                    <div class="div home-product-item__favourite">
                        <i class="fas fa-check"></i>
                        <span>Yêu thích</span>
                    </div>
                    <div class="home-product-item__sale-off">
                        <span class="home-product-item__sale-off-percent">${data.sale}%</span>
                        <span class="home-product-item__sale-off-label">GIẢM</span>
                    </div>
                </a>
            </div>`;
        });
   
        appContent.innerHTML = renderListData.join("");
    
    
    
  })();
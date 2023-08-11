const appContent=document.querySelector('.product-item')
const keyLocalStorageListSP = "DANHSACHSP";
const keyLocalStorageItemCart = "DANHSACHITEMCART"

const app = {
    config: JSON.parse(localStorage.getItem(keyLocalStorageListSP)) || {},
    listData: [
        {
            id: 1,
            name: "Mẫu quần jean cho nữ đang hót, vừa dễ thương vừa cá tính ",
            image: "./image/quan4.jpg",
            sale: 10,
            priceOld: 120000,
            priceNew: 108000,
            quantity: 18,
        },
        {
            id: 2,
            name: "Bộ quần áo nữ nữ dành cho các nàng vào những ngày hè nóng bức",
            image: "./image/boquanao.jpg",
            sale: 10,
            priceOld: 130000,
            priceNew: 117000,
            quantity: 18,
        },
        {
            id: 3,
            name: "Mẫu áo nữ xinh xẻo, các nàng nhanh tay rinh về thôi",
            image: "./image/ao2.jpg",
            sale: 20,
            priceOld: 120000,
            priceNew: 96,
            quantity: 22,
        },
        {
            id: 4,
            name: "Mẫu quần jean nữ cho thể hiện sự cá tính ",
            image: "./image/quannu.jpg",
            sale: 10,
            priceOld: 120000,
            priceNew: 108000,
            quantity: 20,
        },
        {
            id: 5,
            name: "Mẫu quần jean cho nữ đang hót, vừa dễ thương vừa cá tính ",
            image: "./image/quan4.jpg",
            sale: 10,
            priceOld: 120000,
            priceNew: 108000,
            quantity: 25,
        },
        {
            id: 6,
            name: "Mẫu quần jean cho nữ đang hót, vừa dễ thương vừa cá tính ",
            image: "./image/hh.jpg",
            sale: 10,
            priceOld: 120000,
            priceNew: 108000,
            quantity: 19,
        },
        {
            id: 7,
            name: "Mẫu quần trẻ trung năng động dành cho các bạn nam",
            image: "./image/quan5.jpg",
            sale: 10,
            priceOld: 120000,
            priceNew: 108000,
            quantity: 18,
        },
        {
            id: 8,
            name: "Mẫu quần trẻ trung năng động dành cho các bạn nam",
            image: "./image/quan6.jpg",
            sale: 10,
            priceOld: 120000,
            priceNew: 108000,
            quantity: 30,
        },
        {
            id: 9,
            name: "Mẫu áo nữ cute, các nàng còn chờ j mà k nhanh tay rinh về 1 em",
            image: "./image/ao3.jpg",
            sale: 10,
            priceOld: 120000,
            priceNew: 108000,
            quantity: 40,
        },
        {
            id: 10,
            name: "Mẫu áo đôi đang hót cho các cặp đôi, nhanh tay rinh về tặng ngìu iu nào",
            image: "./image/aodoi.jpg",
            sale: 20,
            priceOld: 130000,
            priceNew: 104000,
            quantity: 35,
        },
        {
            id: 11,
            name: "Aó phông dành cho các bạn nam, có thể thoải mái dù trong trạng thái nào",
            image: "./image/ao5.jpg",
            sale: 10,
            priceOld: 120000,
            priceNew: 108000,
            quantity: 20,
        },
        {
            id: 12,
            name: "Mẫu áo đôi đang hót cho các cặp đôi, nhanh tay rinh về tặng ngìu iu nào ",
            image: "./image/aodoi2.jpg",
            sale: 20,
            priceOld: 130000,
            priceNew: 104000,
            quantity: 28,
        },
    ],
    setConfig: function(key, value) {
        this.config[key] = value;
        localStorage.setItem(keyLocalStorageListSP, JSON.stringify(this.config));
    },
    render: function() {
        const htmls = this.listData.map((data, index) => {
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
                    </div>

                    
                
           
                `;
        });
        appContent.innerHTML = htmls.join('');
    },

    start: function(){
        this.render();
    }

    
}
app.start();
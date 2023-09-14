


const appContent=document.querySelector('.product-item')
// const totalRecords=document.querySelector('.totalRecords')
// let currentPage=1;
// let pageSize=3;
// const prevBtn=document.querySelector("#prev");
// const curentBtn=document.querySelector('#curent');
// const nextBtn=document.querySelector('#next');

ajaxGet();


async function ajaxGet(){
    let data1=await fetch(`http://localhost:3000/xampp/htdocs/Web_ban%20hang/getHome.php`);
    let data2=await data1.json();
    console.log(data2);

    render(data2);
   
    renderPagination(data2);

    // renderTotalRecords(data2);
}
// function renderTotalRecords(data){
//     let totalRecordss=
//         `
//             <h3>Tổng số bản ghi là: ${data.totalRecords}</h3>
//         `
//         totalRecords.innerHTML=totalRecordss;
// }
function render(data){
    
    let contentString=data.records.map(record =>
        `
        <div class="col l-2 m-4 c-6">
        <a class="home-product-item" href="product.php?id= ${record.id}">
            <div>
                <img src="./admin/image/${record.image}" class="home-product-item__img">
            </div>
            <h4 class="home-product-item__name">${record.mota}</h4>
            <div class="home-product-item__price">
                <span class="home-product-item__price-old">${record.gia_goc}đ</span>
                <span class="home-product-item__price-current">${record.gia_moi}đ</span>
            </div>
            <div class="home-product-item__action">
                
                <span class="home-product-item__sold">Quanttity:${record.so_luong}</span>
                <div class="home-product-item--add">
                    <i class="home-product-item--icon fas fa-cart-plus" id="${record.id}"></i>
                </div>
            </div>
            <div class="div home-product-item__favourite">
                <i class="fas fa-check"></i>
                <span>Yêu thích</span>
            </div>
            <div class="home-product-item__sale-off">
                <span class="home-product-item__sale-off-percent">${record.sale}%</span>
                <span class="home-product-item__sale-off-label">GIẢM</span>
            </div>
        </a>
    </div>
        `
        ).join('');

        appContent.innerHTML=contentString;
    
}
// let maxPage;
// function renderPagination(data){
//      maxPage=(Math.floor(data.totalRecords / pageSize)+1);
    
//     console.log(data.totalRecords)
//     console.log(maxPage)

//     curentBtn.innerHTML=currentPage;
//     console.log(currentPage)

//     if(currentPage >maxPage){
//         nextBtn.classList.add('hide');

//     }
//     else{
//         nextBtn.classList.remove('hide');
//     }
//     if(currentPage <=1){
//         prevBtn.classList.add('hide');

//     }
//     else{
//         prevBtn.classList.remove('hide');
//     }
// }
// nextBtn.addEventListener('click',()=>{
//     currentPage++;
//     ajaxGet();
// })
// prevBtn.addEventListener('click',()=>{
//     currentPage--;
//     ajaxGet();
// })

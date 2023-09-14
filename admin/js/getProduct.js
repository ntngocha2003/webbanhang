const content=document.querySelector('#content');
const totalRecords=document.querySelector('.totalRecords')
let currentPage=1;
let pageSize=3;
const prevBtn=document.querySelector("#prev");
const curentBtn=document.querySelector('#curent');
const nextBtn=document.querySelector('#next');

ajaxGet();


async function ajaxGet(){
    let data1=await fetch(`http://localhost:3000/xampp/htdocs/Web_ban%20hang/admin/getProduct.php?page=${currentPage} &pageSize=${pageSize}`);
    let data2=await data1.json();
    console.log(data2);

    render(data2);
   
    renderPagination(data2);

    renderTotalRecords(data2);
}
function renderTotalRecords(data){
    let totalRecordss=
        `
            <h3>Tổng số bản ghi là: ${data.totalRecords}</h3>
        `
        totalRecords.innerHTML=totalRecordss;
}
function render(data){
    
    let contentString=data.records.map(record =>
        `
            <tr class="table-borderless-tr">
                <td class="table-borderless-td">
                    <input type="checkbox" name="checkbox">
                </td>
                <td class="table-borderless-td">${record.ma_sp}</td>
                <td class="table-borderless-td">${record.ten_sp}</td>
                <td class="table-borderless-td">${record.mota}</td>
                <td class="table-borderless-td">
                    <img class="table-borderless-td--img" src="./image/${record.image}" style="width:40px">
                </td>
                <td class="table-borderless-td">${record.sale}</td>
                <td class="table-borderless-td">${record.gia_goc}</td>
                <td class="table-borderless-td">${record.gia_moi}</td>
                <td class="table-borderless-td">${record.tinh_trang}</td>
                <td class="table-borderless-td">${record.so_luong}</td>
                <td class="table-borderless-td">${record.ten_dm}</td>
                <td class="table-borderless-td" style="display:flex;justify-content: space-around;">
                    <a href="editProduct.php?sid=${record.id}" class="btn-info">Sửa</a>
                    <a onclick="return confirm('bạn có muốn xóa sản phẩm này không')"
                        href="removeProduct.php?sid=${record.id}" class="btn-danger">Xóa
                    </a>
                </td>
            </tr>
        `
        ).join('');

        content.innerHTML=contentString;
    
}
let maxPage;
function renderPagination(data){
     maxPage=(Math.floor(data.totalRecords / pageSize)+1);
    
    console.log(data.totalRecords)
    console.log(maxPage)

    curentBtn.innerHTML=currentPage;
    console.log(currentPage)

    if(currentPage >maxPage){
        nextBtn.classList.add('hide');

    }
    else{
        nextBtn.classList.remove('hide');
    }
    if(currentPage <=1){
        prevBtn.classList.add('hide');

    }
    else{
        prevBtn.classList.remove('hide');
    }
}
nextBtn.addEventListener('click',()=>{
    currentPage++;
    ajaxGet();
})
prevBtn.addEventListener('click',()=>{
    currentPage--;
    ajaxGet();
})
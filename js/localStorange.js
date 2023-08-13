
const keyLocalStorageListsSP = "DANHSACHSP";
const keyLocalStorageItemsCart = "DANHSACHITEMCART"

function getDataLocalStorage(keys) {
    return JSON.parse(localStorage.getItem(keys));
  }
  
  function setDataLocalStorage(keys, value) {
    return localStorage.setItem(keys, JSON.stringify(value));
  }


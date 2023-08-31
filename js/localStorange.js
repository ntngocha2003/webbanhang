
const keyLocalStorageListsSP = "DANHSACHSPHAM";
const keyLocalStorageItemsCart = "DANHSACHITEMCARTS"

function getDataLocalStorage(key) {
    return JSON.parse(localStorage.getItem(key));
  }
  
  function setDataLocalStorage(keys, value) {
    return localStorage.setItem(keys, JSON.stringify(value));
  }


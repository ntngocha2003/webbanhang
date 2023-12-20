function showSuccessToastRegister() {
    toast({
      title: "Thành công!",
      message: "Bạn đã đăng ký thành công tài khoản tại NgọcHà_shop.",
      type: "success",
      duration: 5000
    });
  }

function showSuccessToastLogin() {
    toast({
      title: "Thành công!",
      message: "Bạn đã đăng nhập thành công tài khoản tại NgọcHà_shop.",
      type: "success",
      duration: 5000
    });
  }
  function showSuccessToastLoginAdmin() {
    toast({
      title: "Thành công!",
      message: "Xin chào admin, chào mừng bạn quay trở lại.",
      type: "success",
      duration: 5000
    });
  }

function showErrorToast() {
    toast({
      title: "Thất bại!",
      message: "Có lỗi xảy ra, vui lòng liên hệ quản trị viên.",
      type: "error",
      duration: 5000
    });
  }

  function showSuccessToastPayCard() {
    toast({
      title: "Thành công!",
      message: "Bạn đã thêm thành công thẻ visa",
      type: "success",
      duration: 5000
    });
  }

  function showSuccessToastPayAccuracy() {
    toast({
      title: "Thành công!",
      message: "Bạn đã thanh toán thành công",
      type: "success",
      duration: 10000
    });
  }
  // Toast function
function toast({ title = "", message = "", type = "info", duration = 3000 }) {
    const main = document.getElementById("toast");
    if (main) {
      const toast = document.createElement("div");
  
      // Auto remove toast
      const autoRemoveId = setTimeout(function () {
        main.removeChild(toast);
      }, duration + 1000);
  
      // Remove toast when clicked
      toast.onclick = function (e) {
        if (e.target.closest(".toast__close")) {
          main.removeChild(toast);
          clearTimeout(autoRemoveId);
        }
      };
  
      const icons = {
        success: "fas fa-check-circle",
        info: "fas fa-info-circle",
        warning: "fas fa-exclamation-circle",
        error: "fas fa-exclamation-circle"
      };
      const icon = icons[type];
      const delay = (duration / 1000).toFixed(2);
  
      toast.classList.add("toast", `toast--${type}`);
      toast.style.animation = `slideInLeft ease .3s, fadeOut linear 1s ${delay}s forwards`;
  
      toast.innerHTML = `
                      <div class="toast__icon">
                          <i class="${icon}"></i>
                      </div>
                      <div class="toast__body">
                          <h3 class="toast__title">${title}</h3>
                          <p class="toast__msg">${message}</p>
                      </div>
                      <div class="toast__close">
                          <i class="fas fa-times"></i>
                      </div>
                  `;
      main.appendChild(toast);
    }
  }
  
  // const btnAddCart=document.querySelector('.btn-add--cart');
  // btnAddCart.addEventListener('submit',showSuccessToastAddcart());
       
        // payCard.addEventListener('click', showSuccessToast)
        

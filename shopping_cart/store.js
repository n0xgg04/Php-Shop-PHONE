// Gán sự kiện click cho các nút xóa
var deleteButtons = document.querySelectorAll(".btn-delete-sanpham");
deleteButtons.forEach(function (button) {
  button.addEventListener("click", deleteRow);
});


//nút tăng giảm
function increaseValue(element) {
    var valueElement = element.parentNode.querySelector(".value");
    var currentValue = parseInt(valueElement.innerHTML);
    valueElement.innerHTML = currentValue + 1;
}

function decreaseValue(element) {
    var valueElement = element.parentNode.querySelector(".value");
    var currentValue = parseInt(valueElement.innerHTML);
    if (currentValue > 1) {
        valueElement.innerHTML = currentValue - 1;
    }
}
//nút cập nhật

function updateCart() {
    var rows = document.querySelectorAll('.datarow tr'); // Chọn tất cả các hàng trong bảng
  
    rows.forEach(function(row) {
      var quantityElement = row.querySelector('.value');
      var totalPriceElement = row.querySelector('.total-price');
      var unitPriceElement = row.querySelector('.unit-price');
  
      var quantity = parseInt(quantityElement.innerHTML);
      var unitPrice = parseFloat(unitPriceElement.innerHTML);
      var totalPrice = unitPrice * quantity + (unitPrice * quantity * 0.05);
  
      totalPriceElement.innerHTML = totalPrice.toFixed(2); // Cập nhật giá trị vào phần tử "total-price"
    });
  
    //location.reload();
  }
  
  

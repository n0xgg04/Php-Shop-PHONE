const cartButton = document.querySelector('.fa-shopping-bag');
const cart = document.querySelector('.cart');
cartButton.addEventListener('click', function() {
    getCartInfo();
    cart.classList.toggle('show-cart');
})

window.addEventListener('click', function(e) {
    var cart = document.querySelector('.cart');
    var cartButton = document.querySelector('.fa-shopping-bag');

    if (!cart.contains(e.target) && e.target !== cartButton) {
        cart.classList.remove('show-cart');
    }
});


const buyButton = document.querySelector('.btn-buy');
buyButton.addEventListener('click', function() {
    //!Get product name
    const productName = document.querySelector('.product-name').textContent;
    const productPrice = document.querySelector('.update-price').textContent;
    const productPhoto = document.querySelector('.product-photo').src;
    alert('Đặt hàng thành công!' + '\n' + 'Sản phẩm: ' + productName + '\n' + 'Giá: ' + productPrice + '');
    const cartStorage = localStorage.getItem('product') || "{}";
    let cartObject = JSON.parse(cartStorage);

    //add to cart
    //get length of cart
    //if not exists

    if (cartObject[productName] == undefined) {
        cartObject = {
            ...cartObject,
            [productName]: {
                name: productName,
                price: productPrice,
                photo: productPhoto,
                amount: 1
            }
        }
    }else{
        cartObject[productName].amount++;
    }

    localStorage.setItem('product',JSON.stringify(cartObject))

    //show cart
    getCartInfo();
    cart.classList.add('show-cart');
})

const getCartInfo = () => {
    const cartStorage = localStorage.getItem('product') || "{}";
    let cartObject = JSON.parse(cartStorage);
    const castList = document.querySelector('.cart-list');
    castList.innerHTML = '';
    for(let key in cartObject){
        castList.innerHTML += `
        <div class="cart-item">
            <div class="cart-item_left">
                <img src="${cartObject[key].photo}" alt=""/>
            </div>
            <div class="cart-item_right"> 
                <div class="cart-info">
                    <h3>${cartObject[key].name}</h3>
                    <h4>${cartObject[key].price}</h4>
                    <span class="remove-item">Xóa</span>
                </div>
                <div class="cart-amount">
                    <i class="fas fa-chevron-up"></i>
                    <input min="0" type="number" class="item-amount" value="${cartObject[key].amount}">
                    <i class="fas fa-chevron-down"></i>
                </div>
              </div>
        </div>
        `
    }
}

const deleteButton = document.querySelectorAll('.remove-item');
deleteButton.forEach((button,index) => {
    button.addEventListener('click',function(){
        const productName = document.querySelector('.cart-info h3')[index].textContent;
        deleteProduct(productName);
        console.log("removed " + productName)
    })
})

const deleteProduct = (key) => {
    const cartStorage = localStorage.getItem('product') || "{}";
    let cartObject = JSON.parse(cartStorage);
    delete cartObject[key];
    localStorage.setItem('product',JSON.stringify(cartObject));
    getCartInfo();
}
let carts = document.querySelectorAll('.add-cart');

let products =[
    {
        id: 1,
        name: 'Bánh Kem Chocolate',
        tag: 'seller-product-1',
        price: 45000,
        inCart: 0
    },
    {
        id: 2,
        name: 'Bánh Kem Dâu',
        tag: 'seller-product-2',
        price: 55000,
        inCart: 0
    },
    {
        id: 3,
        name: 'Bánh Bông Lan',
        tag: 'seller-product-3',
        price: 50000,
        inCart: 0
    },
    {
        id: 4,
        name: 'Cupcake Chocolate',
        tag: 'seller-product-4',
        price: 40000,
        inCart: 0
    }   
];
for(let i=0; i < carts.length; i++)
{
    carts[i].addEventListener('click', ()=>{ 
        cartNumbers(products[i]);
        totalCost(products[i])
        
    })
}

function onloadCartNumbers()
{
    let productNumbers = localStorage.getItem('cartNumbers');

    if(productNumbers)
    {
        document.querySelector('#cart span').textContent = productNumbers;
    }
}

function cartNumbers(product)
{   
    let productNumbers = localStorage.getItem('cartNumbers');
    productNumbers = parseInt(productNumbers);
    
    if(productNumbers)
    {
        localStorage.setItem('cartNumbers', productNumbers + 1); 
        document.querySelector('#cart span').textContent = productNumbers + 1; 
    }
    else
    {
        localStorage.setItem('cartNumbers', 1);
        document.querySelector('#cart span').textContent = 1;  
    }

    setItems(product);
}

function setItems(product)
{   
    let cartItems = localStorage.getItem('productsInCart');
    cartItems = JSON.parse(cartItems);
    if(cartItems != null){

        if(cartItems[product.name] == undefined){
            cartItems = {
                ...cartItems,
                [product.name]:product
            }
       }
        cartItems[product.name].inCart += 1;
    } else{
        product.inCart = 1;
        cartItems = {
            [product.name]: product
        }
    }
    
    localStorage.setItem("productsInCart", JSON.stringify(cartItems));
}


function totalCost(product){
    let cartCost = localStorage.getItem('totalCost');

    if(cartCost != null){
        cartCost = parseInt(cartCost);
        localStorage.setItem('totalCost', cartCost + product.price);
    } else{
        localStorage.setItem('totalCost', product.price);
    }
}

function displayCart(){
    let cartItems = localStorage.getItem('productsInCart');
    cartItems = JSON.parse(cartItems);
    let productContainer = document.querySelector('.products-cart');
    let productBasketTotal = document.querySelector('.basketTotal-cart');
    let cartCost = localStorage.getItem('totalCost');
    console.log(cartItems);
    if(cartItems) {
        productContainer.innerHTML = '';
        Object.values(cartItems).map(item => {
            productContainer.innerHTML += `
            <div class="product-cart">
                <i class="far fa-window-close"></i>
                <img src="./assets/images/${item.tag}.jpg">
                <span class="name">${item.name}</span>
            
            <div class="price">
            ${item.price} VND
            </div>
            <div class="quantity">
                <i class="fas fa-angle-left"></i>
                <span>${item.inCart}</span>
                <i class="fas fa-angle-right"></i>
            </div>
            <div class="total">
                ${item.inCart * item.price} VND
            </div>
            </div>
            `
        });
        productBasketTotal.innerHTML += `
            <div class="basketTotalContainer">
                <h4 class="basketTotalTitle">
                    Thành tiền
                </h4>
                <h4 class="basketTotal">
                    $${cartCost} VND
                </h4>
        `;
    }   
}

onloadCartNumbers();
displayCart();
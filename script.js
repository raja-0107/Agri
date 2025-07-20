let cart = [];

function addToCart(productName, price) {
    cart.push({ product: productName, price: price });
    document.getElementById("cart-count").innerText = cart.length;
    alert(`${productName} has been added to your cart.`);
}

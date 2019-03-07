const cartContainer = document.getElementById('cart_container');
const total = document.getElementById('cartTotal');
const  id = localStorage.getItem('id');


async function loadCart() {
    let cart = [];
    cartContainer.innerHTML = '<div style="text-align: center; margin-top: 20%; grid-column-start:2">Loading...</div>';
    const response = await axios.get(`/app/api/cart/read.php?userid=${id}`);
    cart = response.data;
    cartContainer.innerHTML = '';

    if (cart && cart.length === 0) {
      cartContainer.innerHTML = '<div class="empty_cart">Cart is Empty</div>';
      return;
    }

    let total_cost = 0

  for (var j = 0; j < cart.data.length; j++){
        cartContainer.innerHTML += `<div class="content__container__main__cart__item">
      <div class="content__container__main__cart__item__picture"><img src="https://picsum.photos/330/250/?random" alt="product image" onclick="window.location = '?mod=product&id=${cart.id}'" /></div>
      <div class="content__container__main__cart__item__name">Name</div>
      <div class="content__container__main__cart__item__product_name">${cart.data[j].name}</div>
      <div class="content__container__main__cart__item__price">Price</div>
      <div class="content__container__main__cart__item__product_price">P ${cart.data[j].unit_cost}</div>
      <div class="content__container__main__cart__item__product_actions">

      </div>
    </div>`;
   total_cost += parseFloat(cart.data[j].unit_cost);
  }

  total.innerHTML = total_cost


}

function addItemToCart(id) {
  const { amount } = cart[id];
  cart[id].amount = amount + 1;
  loadCart();
}

function removeItemToCart(id) {
  cart = cart.filter((val, index) => index !== Number(id));
  loadCart();
}

function minusItemToCart(id) {
  const { amount } = cart[id];
  cart[id].amount = amount - 1;
  if (cart[id].amount < 1) {
    removeItemToCart(id);
  }
  loadCart();
}

function main() {
  userValidator();
  loadCart();
}
main();

const productContainer = document.getElementById('product_container');
async function loadProducts() {

   try {

  const id = localStorage.getItem('id');
    productContainer.innerHTML = '<div style="text-align: center; margin-top: 20%; grid-column-start:2">Loading...</div>';
    const response = await axios.get(`/app/api/products/read.php`);
    const { data } = response.data;
    productContainer.innerHTML = '';

    if (data && data.length <= 0) {
      productContainer.innerHTML = '<div>No Product Available</div>';
    }
    data.forEach((product, value) => {
      productContainer.innerHTML += `
    <div class="content__container__main__products__item" onclick="window.location='?mod=product&id=${
        product.id
        }' " data-product="1">
            <div class="content__container__main__products__item__image">
<<<<<<< HEAD
                <img src="${././product.image}" alt="${product.name}" />
=======
                <img src="${product.image}" alt="${product.name}" />
>>>>>>> frontEnd
                <div class="content__container__main__products__item__price-circle">
                    <div class="content__container__main__products__item__price">₱${
        product.unit_cost
        }</div>
                </div>
            </div>
            <div class="content__container__main__products__item__name">${product.name}</div>
        </div>
    `;
    });
  }catch(e){
    console.error(e)
    productContainer.innerHTML = '<div style="text-align: center; margin-top: 20%; grid-column-start:2">No Bidding A Available</div>';
  }
}



function main() {
  userValidator();
  loadProducts();
}
main();



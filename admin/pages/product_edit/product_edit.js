const URL_ID = new URLSearchParams(window.location.search);
const container = document.getElementById('productContainer');

async function loadProduct() {
  try {
    container.innerHTML = '<div class="error"> Loading... </div>'
    const response = await axios.get(`/app/api/products/get.php?id=${URL_ID}`);
    container.innerHTML = ''
    const { name, description, unit_cost, type, quantity, supplier, image = '' } = response.data;
    console.log(response.data)
    container.innerHTML = `<div class="content__container__main__header">${name}</div>
    <div class="content__container__main__product">
        <div class="content__container__main__product__image"><img src="${image || '../../assets/250.png' }" alt="product image" /></div>
        <div class="content__container__main__product__price">
        <span class="content__container__main__product__price__title">P ${unit_cost}</span><br /><br /><br /><br /><br /><br />
        <div class="content__container__main__product__controller">
            <button class="content__container__main__product__controller__minus">-</button>
            <input class="content__container__main__product__controller__input" disabled type="number" name="" id="" value="0" />
            <button class="content__container__main__product__controller__plus">+</button>
        </div>
        <br />
        <div class="content__container__main__product__addToCart"><button class="content__container__main__product__addToCart__button">Add To Cart</button></div>
        </div>
        <div class="content__container__main__product__description">
        <span class="content__container__main__product__description__title">Description</span><br />
        <br />${description}
        explicabo. Incidunt ipsa laboriosam soluta at est.
        </div>
    </div>`;
  } catch (error) {
    console.error(error);
    container.innerHTML = '<div class="error"> No Product Found </div>'
  }
}

function main() {
  userValidator();
  // loadProduct();
}
main();

const URL_ID = new URLSearchParams(window.location.search);
const container = document.getElementById('productContainer');

async function loadProduct() {


  try {
    container.innerHTML = '<div class="error"> Loading... </div>'
    const response = await axios.get(`${env.url}/app/api/products/get.php?id=${URL_ID}`);
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
       <br>
        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" >
            <input type="hidden" name="cmd" value="_s-xclick">
            <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----">
            <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
            <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
        </form>
        </div>
        <div class="content__container__main__product__description">
        <span class="content__container__main__product__description__title">Description</span><br />
        <br />${description}
        </div>
    </div>`;
  } catch (error) {
    console.error(error);
    container.innerHTML = '<div class="error"> No Product Found </div>'
  }
}

function main() {
  userValidator();
  loadProduct();
}
main();

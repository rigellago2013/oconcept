const URL_ID = new URLSearchParams(window.location.search);
const container = document.getElementById('productContainer');

async function loadProduct() {
  try {
    container.innerHTML = '<div class="error"> Loading... </div>'
    const response = await axios.get(`/app/api/products/get.php?id=${URL_ID}`);
    container.innerHTML = ''
    const { name, description, unit_cost, type, quantity, supplier, image = '' } = response.data;
    console.log(response.data)
    container.innerHTML = `<!-- Image -->
        <div class="content__container__main__product__image">
            <img src="${image || '../../assets/250.png' }" alt="product image" />
        </div>
        <!-- Image input -->
        <div class="content__container__main__product__image_input">
        </div>
        <!-- Name -->
        <div class="content__container__main__product__name">
            <span class="content__container__main__product__name__title">${name}</span>
            <br/>
            <div class="content__container__main__product__header" id="name">Name</div>
        </div>
        <!-- Type -->
        <div class="content__container__main__product__unit_type">
            <span class="content__container__main__product__unit_type__title">${type}</span>
            <br/>
            <div class="content__container__main__product__header" id="type">Type</div>
        </div>
        <!-- Cost -->
        <div class="content__container__main__product__cost">
            <span class="content__container__main__product__cost__title">P ${unit_cost}</span>
            <br/>
            <div class="content__container__main__product__header" id="cost">Cost</div>
        </div>
        <!-- Quantity -->
        <div class="content__container__main__product__quantity">
            <span class="content__container__main__product__quantity__title">${quantity}</span>
            <br/>
            <div class="content__container__main__product__header" id="quantity">Quantity</div>
        </div>
        <!-- Description -->
        <div class="content__container__main__product__description">
            <span class="content__container__main__product__description__title">${description}</span>
            <br/>
            <div class="content__container__main__product__header" id="description">Description</div>
        </div>`;
    container.innerHTML += `<div class="content__container__main__editButton ">
            <button class="materialButton"> Edit </button>
        </div>
        <div class="content__container__main__deleteButton">
            <button class="materialButton"> Delete </button>
        </div>`
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

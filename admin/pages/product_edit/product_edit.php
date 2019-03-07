<div class="content__container__main" id="productContainer">
    <div class="content__container__main__header">Product Details</div>
    <div class="content__container__main__product">
        <!-- Image -->
        <div class="content__container__main__product__image">
            <img src="https://picsum.photos/330/250/?random" alt="product image" />
        </div>
        <!-- Image input -->
        <div class="content__container__main__product__image_input">
            <span class="content__container__main__product__image_input__title">Image</span>
            <br/>
            <input class="content__container__main__product__image_input__input" type="file" accept="image/*"/>
        </div>
        <!-- Name -->
        <div class="content__container__main__product__name">
            <span class="content__container__main__product__name__title">Name</span>
            <br/>
            <input class="content__container__main__product__name__input" type="text"/>
        </div>
        <!-- Type -->
        <div class="content__container__main__product__unit_type">
            <span class="content__container__main__product__unit_type__title">Unit Type</span>
            <br/>
            <select class="content__container__main__product__unit_type__input">
                <option selected disabled hidden> Select A Type</option>
            </select>
        </div>
        <!-- Cost -->
        <div class="content__container__main__product__cost">
            <span class="content__container__main__product__cost__title">Cost</span>
            <br/>
            <input type="number" class="content__container__main__product__cost__input" min="0.00" />
        </div>
        <!-- Quantity -->
        <div class="content__container__main__product__quantity">
            <span class="content__container__main__product__quantity__title">Quantity</span>
            <br/>
            <input type="number"  class="content__container__main__product__quantity__input" min="0" />
        </div>
        <!-- Description -->
        <div class="content__container__main__product__description">
            <span class="content__container__main__product__description__title">Description</span>
            <br/>
            <textarea class="content__container__main__product__description__textarea" name="" id="" rows="8"></textarea>
        </div>
        <!-- Buttons -->
        <div class="content__container__main__editButton ">
            <button class="materialButton"> Edit </button>
        </div>
        <div class="content__container__main__deleteButton">
            <button class="materialButton"> Delete </button>
        </div>
    </div>
</div>

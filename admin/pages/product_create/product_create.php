<div class="content__container__main">
    <div class="content__container__main__header">Product Create</div>
    <form  class="content__container__main__product" id="form">
        <!-- Image -->
        <div class="content__container__main__product__image">
            <img src="" alt="No Image Selected" id="imgContainer" />
        </div>
        <!-- Image input -->
        <div class="content__container__main__product__image_input">
            <span class="content__container__main__product__image_input__title">Image</span>
            <br/>
            <label class="field a-field a-field_a1 page__field" style="width:100%;">
              <input class="field__input a-field__input" type="file" accept="image/*" placeholder="Product Image" id="image" required>
              <span class="a-field__label-wrap">
                <span class="a-field__label">Product Image</span>
              </span>
            </label>
            
            <label class="field a-field a-field_a1 page__field" style="width:100%;margin-top:150px">
              <input class="field__input a-field__input" placeholder="Any number greater than 1" type="number"  min="1" id="reorder" required >
              <span class="a-field__label-wrap">
                <span class="a-field__label">Reorder Point</span>
              </span>
            </label>
        </div>
        <!-- Name -->
        <div class="content__container__main__product__name">
          <label class="field a-field a-field_a1 page__field" style="width:100%;">
            <input class="field__input a-field__input" type="text" placeholder="Product Name" id="name" required>
            <span class="a-field__label-wrap">
              <span class="a-field__label">Product Name</span>
            </span>
          </label>
        </div>
        <!-- Type -->
        <div class="content__container__main__product__unit_type">
            <label class="field a-field a-field_a1 page__field" style="width:100%;">
              <select class="field__input a-field__input" placeholder="Select a Type" id="type" required>
                <option selected disabled hidden value=""> Select A Type</option>
                <option value="Sample"> </option>
              </select>
              <span class="a-field__label-wrap">
                <span class="a-field__label">Unit Type</span>
              </span>
            </label>
        </div>
        <!-- Cost -->
        <div class="content__container__main__product__cost">
            <label class="field a-field a-field_a1 page__field" style="width:100%;">
              <input class="field__input a-field__input" type="number" placeholder="eg. 100 , 200.00 or 10" min="0.01" id="cost" required>
              <span class="a-field__label-wrap">
                <span class="a-field__label">Product Cost</span>
              </span>
            </label>
        </div>
        <!-- Quantity -->
        <div class="content__container__main__product__quantity">
            <label class="field a-field a-field_a1 page__field" style="width:100%;">
              <input class="field__input a-field__input" type="number" placeholder="eg. 100 , 200.00 or 10" min="0" id="quantity" required>
              <span class="a-field__label-wrap">
                <span class="a-field__label">Product Quantity</span>
              </span>
            </label>
        </div>
        <!-- Description -->
        <div class="content__container__main__product__description">
            <label class="field a-field a-field_a1 page__field" style="width:100%;">
              <textarea class="field__input a-field__input" type="text" placeholder="Description" id="descripition" required></textarea>
              <span class="a-field__label-wrap">
                <span class="a-field__label">Description</span>
              </span>
            </label>
        </div>
        <!-- Buttons -->
        <div class="content__container__main__editButton ">
            <button class="materialButton" type="submit" form="form" value="Submit"> Create </button>
        </div>
    </form>
</div>
<script src="../../../scripts/serialize.min.js"></script>
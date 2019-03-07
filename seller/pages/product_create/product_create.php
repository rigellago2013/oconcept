<style type="text/css">
.btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}

#img-upload{
    width: 40%;
    margin:0 auto;
    padding-top:20px;
    padding-bottom: 20px;
}
</style>

<div class="content__container__main">
  <div class="content__container__main__header">Product Creates</div>
    <div class="container" style="margin-top:20px;margin-left:-9px;">
       
        <div class="panel panel-success">
          <div class="panel-heading">
            <h4>Create a Product</h4>
          </div>
          <div class="panel-body">

              <div clas="form-group">
                    <label>Upload Image</label>
                  <div class="input-group">
                      <span class="input-group-btn">
                          <span class="btn btn-default btn-file">
                              Browse… <input type="file" id="image" onchange="encodeImageFileAsURL();"  accept="image/*">
                          </span>
                      </span>
                      <input type="text" class="form-control" readonly>
                  </div>
                  <br/>
                  <div style="background-color:#eeee;width:100%;border:0.4px solid #808080;"  class="container">
                  <img class="img-responsive center-block" id='img-upload'/>
                </div>
                  <br/>
              </div>
              <br/>

               
                <input type="hidden" class="form-control" id="user_id" placeholder="Enter Product Name">
            
  

              <div class="form-group">
                <label for="exampleInputEmail1">Product Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter Product Name">
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Reorder Point</label>
                <input type="number" class="form-control" id="reordering_point" placeholder="Re Order Point">
              </div>

              <div class="form-group">
                <select class="form-control" id="category_id">
                    <option>--Choose a Type--</option>
                </select>
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Product Cost</label>
                <input type="number" class="form-control" id="cost" placeholder="Re Order Point">
              </div>

               <div class="form-group">
                <label for="exampleInputPassword1">Product Quantity</label>
                <input type="number" class="form-control" id="quantity" placeholder="Quantity">
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Description</label>
                <textarea class="form-control" id="description" placeholder="Description"></textarea>
              </div>


              <button type="button" class="btn btn-warning" id="createBtn">Add Product</button>
              <img src="loader.svg" alt="loading...." id="loader" style="width:70px;margin-left: 40%;display:none;">
            </div>
          </div>
        
        </div>
     
     </div> 
</div>
<script src="../../../scripts/serialize.min.js"></script>

  
  <script type='text/javascript'>

  function encodeImageFileAsURL() {

    var filesSelected = document.getElementById("image").files;
    if (filesSelected.length > 0) {
      var fileToLoad = filesSelected[0];

      var fileReader = new FileReader();

      fileReader.onload = function(fileLoadedEvent) {
        var srcData = fileLoadedEvent.target.result; // <--- data: base64

        var newImage = document.createElement('image');
        newImage.src = srcData;

        document.getElementById("img-upload").innerHTML = newImage.outerHTML;
        alert("Inserted Image " + document.getElementById("img-upload").innerHTML);
        console.log("Converted Base64 version is " + document.getElementById("img-upload").innerHTML);
      }
      fileReader.readAsDataURL(fileToLoad);
    }
  }

</script>


  <script>

        $(document).ready(function(){
                var url = `${env.url}/app/api/products/getcategories.php`;
                $.getJSON(url,function(data){
                    $.each(data.data,function(index,value){
                         $('#category_id').append('<option value="' + value.id + '">' + value.description + '</option>');
                    });

                });
        });

    </script>

    <script type="text/javascript">
      $(document).ready( function() {
      $(document).on('change', '.btn-file :file', function() {
    var input = $(this),
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [label]);
    });

    $('.btn-file :file').on('fileselect', function(event, label) {
        
        var input = $(this).parents('.input-group').find(':text'),
            log = label;
        
        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }
      
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#img-upload').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#image").change(function(){
        readURL(this);
    });   
  });
    </script>
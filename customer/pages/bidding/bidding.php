<div class="content__container__main">
  <div class="content__container__main__header">Bidding Page</div>
    <div class="content__container__main__products">
      <!--Bidding Div-->
                <div class="button_bidding">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalBidding">
                        Post Bidding
                        &nbsp;
                    </button>
                        <br/>
                        <br/>
                    
                    <div class="container" style="padding-top:20px; padding-right: 120px;margin-right:30px;">
                        <table class="table table-striped table-bordered  table-dark" style="width:100%" id="table_name" >
                          <thead class="thead-dark">
                            <tr>
                              <th scope="col">Description</th>
                              <th scope="col">Date</th>
                              <th scope="col">Status</th>
                            </tr>
                          </thead>
                          <tbody id=bidding>
                          </tbody>
                        </table>
                    </div>
                    <br/>
                    <br/>
                    <br/>                  
                    <br/>  
            </div>    
        </div>
      </div>


<!-- Modal -->
<div class="modal fade" id="exampleModalBidding" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Create Bidding</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <div class="modal-body">
             <input type="hidden"  class="form-control" id="user_id" aria-describedby="emailHelp" placeholder="Enter email">
                <textarea class="form-control" id="description" aria-label="With textarea"></textarea>
          </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success"  id="descriptionBtn">Add Bidding Descrption</button>
          <img src="./assets/loader.svg" alt="loading...." id="loader" style="width:70px;margin-left: 40%;display:none;">
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
      const  id = localStorage.getItem('id');

     $(document).ready(function(){
                var url = `${env.url}/app/api/bidding/getuserbidding.php?id=${id}`;
                
                $.getJSON(url,function(data){
                    $.each(data.data,function(index,value){
                        $('#bidding').append(`<tr class="odd"><td>${value.description}</td><td>${value.date}</td><td><button class="btn btn-success">${value.status}<span></td></tr>`);
                    });
                    console.log(data)

                    $('#table_name').dataTable({
                      "sPaginationType": "full_numbers"
                      })
                    .columnFilter({sPlaceHolder: "head:before",
                      aoColumns: [{type: "text" },{type: "text" },{type: "text" },{type: "text" },{type: "text" },{type: "text" }]
                    });
                });
        });

</script>

<script type="text/javascript">
    
</script>



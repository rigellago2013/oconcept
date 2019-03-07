<div class="container">
  <h2>&nbsp;Biddings</h2>
   <div class="button_bidding">
    <br/>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalBidding">Post Bidding&nbsp;</button>
      <br/>
      <br/>
            <div class="panel panel-default">
               <div class="container" style="padding-top:30px;padding-bottom:30px;">
                              <div class="container" style="padding-top:10px; padding-right:110px;margin-left:20px;">
                                  <table class="table table-striped table-bordered " style="width:100%" id="table_name" >
                                    <thead class="">
                                      <tr>
                                        <th scope="col">Description</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Status</th>
                                      </tr>
                                    </thead>
                                    <tbody id=bidding>
                                    </tbody>
                                  </table>
                            </div>
                      </div>
                            </div>
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
                        <input type="text"  class="form-control" id="title" aria-describedby="emailHelp" placeholder="Title"><br/>
                        <textarea class="form-control" id="description" aria-label="With textarea"></textarea>
                  </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" id="descriptionBtn" onclick="pota()">Add Bidding Descrption</button>
                <img src="./assets/loader.svg" alt="loading...." id="loader" style="width:70px;margin-left: 40%;display:none;">
              </div>
            </div>
          </div>
        </div>

  <script type="text/javascript">
      const  id = localStorage.getItem('id');
      var td= '';

     $(document).ready(function(){
                var url = `${env.url}/app/api/bidding/getuserbidding.php?id=${id}`;

                $.getJSON(url,function(data){
                    $.each(data.data,function(index,value){

                         switch(value.status){

                          case 'open':
                          td= `<td><button class="btn btn-success">${value.status}</button></td>`;
                          break;

                          case 'close':
                          td= `<td><button class="btn btn-danger">${value.status}</button></td>`;
                          break;
                        }


  $('#bidding').append(`<tr class="odd"><td><a href=?mod=description_detail&id=${value.id}&title=${value.title}&date=${value.date}&description=${value.description}>${value.description}</a></td><td>${value.title}</td><td>${value.date}</td><td>${value.status}</td> `


                          );
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

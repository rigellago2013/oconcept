$(document).ready(function(){
      var url_string = window.location.href
      var link = new URL(url_string);
      var id = link.searchParams.get("id");


      console.log(id);
                var url = `${env.url}/app/api/bidding/getbidwithcomment.php?id=${id}`;
                var button = '';

                $.getJSON(url,function(data){

                       $.each(data.data.comment,function(index,value){

                        switch(value.status) {

                          case 'pending':
                            button = `<p class="text-right"><a href="" class="btn btn-success btn-sm" onclick="status(${id}, ${value.comment_id})"><span class="glyphicon glyphicon-ok
                                "></span>&nbsp;Approve</a></p>`;
                          break;

                          case 'approved':
                            button = `<span class="badge badge-danger">Approved</span>`;
                          break;

                          case 'close':
                            button = `<p class="text-right"><a href="" class="btn btn-danger btn-sm" ><span class="glyphicon glyphicon-remove
                                "></span>&nbsp;Status: Closed</a></p>`;
                          break;

                        }
                           $('#description').append(`
                          <article class="row">
                        <div class="col-md-2 col-sm-2 hidden-xs">
                          <figure class="thumbnail">
                            <img class="img-responsive" src="http://www.tangoflooring.ca/wp-content/uploads/2015/07/user-avatar-placeholder.png" />
                            <figcaption class="text-center">${value.seller}</figcaption>
                          </figure>
                        </div>
                        <div class="col-md-10 col-sm-10">
                          <div class="panel panel-default arrow left">
                            <div class="panel-body">
                              <header class="text-left">
                                <div class="comment-user"><i class="fa fa-user">&nbsp;</i>${value.seller}</div>
                                <time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i>${value.comment_date}</time>
                              </header>
                              <div class="comment-post">
                                <h5 style="font-size:50px;">
                                 <b> ₱ &nbsp;${value.amount}</b>
                                </h5>
                              </div>`

                              + button +

                              `
                              </div>
                          </div>
                        </div>
                      </article>`);
                       });
                    
                    console.log(data);
                  

                });



        });


     function status(id,commentid) {

        var url = `${env.url}/app/api/bidding/closebid.php?id=${id}&commentid=${commentid}`;
        var button = '';

        $.getJSON(url,function(data){
        
        });


     }
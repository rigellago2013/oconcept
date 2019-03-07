 $(document).ready(function(){
                var url = `${env.url}/app/api/products/getcategories.php`;
                $.getJSON(url,function(data){
                    $.each(data.data,function(index,value){
                        $('#description').append(`<li><a href= "?category=${value.id}"> ${value.description}<li></a>`);
                        // $('#pota').append(`<tr class="row"><td class="field-label col-md-3 active"><center><p><a class="btn btn-primary hvr-sweep-to-right" href="?category=${value.id}">${value.description}</a></p></center></td></tr>`)
                        $('#card').append(`
                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="box-part text-center" style=" box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);">
                                <i class="fas fa-sim-card" aria-hidden="true"></i>
                              <div class="title">
                                <h3>${value.description}</h3>
                              </div>
                              <div class="text">
                                <span>Lorem ipsum dolor sit amet, id quo eruditi eloquentiam. Assum decore te sed. Elitr scripta ocurreret qui ad.</span>
                              </div>
                              <a href="?category=${value.id}">Learn More</a>
                             </div>
                          </div>`)
                    });

                    console.log(data);

                });
        });




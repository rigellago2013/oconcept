
     $(document).ready(function(){
                var url = `${env.url}/app/api/bidding/getbidsforseller.php`;
                $.getJSON(url,function(data){
                    $.each(data.data,function(index,value){

                      var url = `?mod=bidding_detail&bid_id=${value.bid_id}&title=${value.title}&customer=${value.customer}&description=${value.description}&date=${value.bid_date}`;
                      var encodedurl = encodeURI(url);
                         $('#bidding').append(`<tr class="odd"><td><a href=${encodedurl}><p>${value.title}</p></a></td><td><p>${value.customer}</p></td><td><p>${value.description}</p></td><td><p>${value.bid_date}</p></td></tr>`);
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

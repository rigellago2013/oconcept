const  id = localStorage.getItem('id');
     $(document).ready(function(){
                var url = `${env.url}/app/api/products/getorderedproducts.php?id=${id}`;
                $.getJSON(url,function(data){
                    $.each(data.data,function(index,value){
                         $('#ordered').append(`<tr class="odd"><td>${value.product_code}</td><td>${value.name}</td><td>${value.quantity}</td><td>${value.total_cost}</td><td>${value.order_date}</td></tr>`);
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

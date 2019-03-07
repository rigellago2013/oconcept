const  id = localStorage.getItem('id');
     $(document).ready(function(){
                var url = `${env.url}/app/api/products/getsellerproducts.php?user_id=${id}`;
                $.getJSON(url,function(data){
                    $.each(data.data,function(index,value){
                         $('#ordered').append(`<tr class="odd"><td><img  width="104" height="100" class="img-thumbnail" src="../${value.image}" alt="sample57" /></td><td><p>${value.name}</p></td><td><p>${value.code}</td><td><p>${value.quantity}</p></td><td><p>${value.reordering_point}</p></td><td>${value.category}</td><td>${value.unit_cost}</td><td>${value.date_added}</td></tr>`);
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
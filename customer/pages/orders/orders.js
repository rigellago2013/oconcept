    const  id = localStorage.getItem('id');
     $(document).ready(function(){
                var url = `${env.url}/app/api/orders/getorder.php?id=${id}`;
                $.getJSON(url,function(data){
                    $.each(data.data,function(index,value){
                         $('#orders').append(`<tr class="odd"><td><a href=?mod=order_detail&order_id=${value.order_id}>${value.order_num}</a></td><td>${value.total_amount}</td><td>${value.order_date}</td></tr>`);
                    });
                    console.log(data)
                    console.log(data.data.order_num);
                    $('#table_name').dataTable({
                      "sPaginationType": "full_numbers"
                      })
                    .columnFilter({sPlaceHolder: "head:before",
                      aoColumns: [{type: "text" },{type: "text" },{type: "text" },{type: "text" },{type: "text" },{type: "text" }]
                    });
                });
        });
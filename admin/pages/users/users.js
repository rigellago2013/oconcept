   $(document).ready(function(){
                var url = `${env.url}/app/api/user/getusers.php`;
                $.getJSON(url,function(data){
                    $.each(data.data,function(index,value){
                    	$('#users').append(`<tr><td>${value.id}</td><td>${value.name}</td><td>${value.email}</td><td>${value.contact}</td><td>${value.address}</td><td>${value.type}</td></tr>`)
         
                    });

                    console.log(data);
                      $('#table_name').dataTable({
                      "sPaginationType": "full_numbers"
                      })
                    .columnFilter({sPlaceHolder: "head:before",
                      aoColumns: [{type: "text" },{type: "text" },{type: "text" },{type: "text" },{type: "text" },{type: "text" }]
                    });

                });
        });
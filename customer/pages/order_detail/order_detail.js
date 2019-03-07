 const  id = localStorage.getItem('id');
 const URL_ID = new URLSearchParams(window.location.search);

     $(document).ready(function(){

                var item = '';
                var total_cost=[];
                var total = 0;
                var url = `${env.url}/app/api/orders/getorderdetails.php?order_id=${URL_ID}`;
                var arr = '';

                   $.getJSON(url,function(data){

                    item = data.data[0].order_num;
                    $('#order-number').append(`<h3>Order Number:&nbsp;${item}</h3>`)

                    $.each(data.data,function(index,value){
                        $('#total-amount').append(`<h3>Total Amount:${value.total_cost}</h3>`)
                    });

                    //Foreach For the Whole Data
                    $.each(data.data,function(index,value){
                        $('#order-detail').append(`
                            <figure class="snip1423">
                              <img src="../${value.product_image}" alt="sample57" />
                              <figcaption>
                                <h3>${value.product_name}</h3>
                                <small>${value.description}</smaill>
                                <div class="price">
                                   Total Cost:&nbsp;${value.total_cost}
                                </div>
                                 <div class="price">
                                    Quantity:&nbsp;${value.quantity}
                                </div>
                                 <div class="price">
                                    Unit Cost:&nbsp;${value.unit_cost}
                                </div>
                            </figure>`
                        );
                    });
                    console.log(total);
                    console.log(data);
            });
        });



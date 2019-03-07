<div class="container">
  <br/><br/>
  <div class="panel panel-success">
    <div class="panel-heading">
        <h1> Bidding Title: <?php echo $_GET['title'];?></h1>
        <h6> Customer: <?php echo $_GET['customer']; ?> </h6>
        <h6> Description: <?php echo $_GET['description']?></h6>
        <time> Date: <?php echo $_GET['date']?></time>

    </div>
    <div class="panel-body">
         <section class="comment-list" id="bidding_detail">
         </section>
         <div class="form-group">
            <input type="hidden" class="form-control" id="bid_id" value="<?php echo $_GET['bid_id']; ?>">
         </div>
         <div class="form-group">
             <label>Enter Amount Comments:</label>
            <input type="text" class="form-control" id="amount_id">
         </div>
         <button class="btn btn-primary" type="submit" id="postBtn">Post Comment</button> 
    </div>
  </div>
</div>

<!-- This is the script-->
<script type="text/javascript">
  $(document).ready(function(){
      var url_string = window.location.href
      var link = new URL(url_string);
      var bid_id = link.searchParams.get("bid_id");
                var url = `${env.url}/app/api/bidding/getcomments.php?bid_id=${bid_id}`;
                $.getJSON(url,function(data){
                  $(data.data,function(index,value){
                      
                  });
                  console.log(data);
                    $.each(data.data,function(index,value){
                         $('#bidding_detail').append(
                           `<article class="row">
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
                                <time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i>${value.date}</time>
                              </header>
                              <div class="comment-post">
                                <h5 style="font-size:50px;">
                                 <b> ₱ ${value.amount}</b>
                                </h5>
                              </div>
         
                              </div>
                          </div>
                        </div>
                      </article>`);
                    });
                    console.log(data)
                });
        });
</script>
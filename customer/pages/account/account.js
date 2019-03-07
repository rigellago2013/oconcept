
      const  id = localStorage.getItem('id');

     $(document).ready(function(){
                var url = `${env.url}/app/api/user/get.php?id=${id}`;
                $.getJSON(url,function(data){
                    $.each(data.data,function(index,value){
                         $('#accounts').append(` 
                            <form>
                                <div class="form-group">
                                      <label for="exampleInputEmail1">Name</label>
                                      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="${value.name}">
                                      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleInputPassword1">Password</label>
                                      <input type="password" class="form-control" id="password" placeholder="Password" value="">
                                    </div>
                                    <div class="form-group">
                                      <label for="emailAddress">Email Address</label>
                                      <input type="email" class="form-control" id="email" placeholder="Password" value="${value.email}">
                                    </div>
                                    <div class="form-group">
                                      <label for="userContact">Contact Number</label>
                                      <input type="number" class="form-control" id="contact_number" placeholder="Password" value="${value.contact}">
                                    </div>
                                    <div class="form-group">
                                      <label for="userAddress">Address</label>
                                      <input type="text" class="form-control" id="address" placeholder="Password" value="${value.address}">
                                    </div>
                                </form> 
                                  <button type="submit" id="ian" class="btn btn-primary">Update Account</button>
                              </div>`);
                    });
                    console.log(data)
                 
                });
        });
<!DOCTYPE html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register Acccount</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" media="screen" href="./styles/register.css" />
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="./env.js"></script> <!-- Global Variables-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

</head>
<body>

    <div class="main_wrapper">
        <div class="main_wrapper__content">
            <div class="main_wrapper__content__header">
                CREATE AN ACCOUNT
            </div>


              <div class="main_wrapper__content__username">
                <div class="group">
                    <input id="name" type="text" value="" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label> Full Name</label>
                </div>
            </div>


              <div class="main_wrapper__content__password">
                <div class="group">
                    <input id="password" type="password" value="" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Password</label>
                </div>
            </div>

               <div class="main_wrapper__content__email">
                <div class="group">
                    <input id="email" type="email" value="" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Email Address</label>
                </div>
            </div>

            <div class="main_wrapper__content__contact">
                <div class="group">
                    <input id="contact" type="number" value="" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Contact Number</label>
                </div>
            </div>

            <div class="main_wrapper__content__address">
                <div class="group">
                    <input id="address" type="text" value="" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Address</label>
                </div>
            </div>


            <div class="main_wrapper__content__type">
                <div class="group">
                <select id="type" placeholder="Choose a User Role">
                    <option value=""><label>Chose a User Role</label></option>
                    <option id="desc" value=""></option>
                </select>
                <span class="highlight"></span>
                <span class="bar"></span>
                <img src="./assets/loader.svg" alt="loading...." id="loader" style="width:70px;margin-left: 40%;display:none;">
                </div>
            </div>

          <!--   <div class="main_wrapper__content__buttons">
                <button class="btn red" type="button" id="registerBtn"><span><h4>Register Account</h4></span></button>
                <img src="./assets/loader.svg" alt="loading...." id="loader" >
            </div> -->

             <div class="main_wrapper__content__buttons">
                <button class="btn red" type="button" id="registerBtn"><span>Register</span></button>
                <img src="./assets/loader.svg" alt="loading...." id="loader" style="width:70px;margin-left: 40%;display:none;">
            </div>

        </div>
    </div>




    <script src="./scripts/register.js"></script>
    <script src="./scripts/user_role.js"></script>
    <!--This is for the dropdown-->
      <script>

        $(document).ready(function(){
                var url = `${env.url}/app/api/user/gettypes.php`;
                $.getJSON(url,function(data){
                    $.each(data.data,function(index,value){
                         $('#type').append('<option value="' + value.id + '">' + value.description + '</option>');
                    });

                });
        });

    </script>


</body>
</html>

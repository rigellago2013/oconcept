<!DOCTYPE html>
<html>
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
                Register Account
            </div>

            <div class="main_wrapper__content__buttons">
                <button style="background-color:red;" class="btn red" type="button" id="registerBtn"><span>Register Account</span></button>
                <img src="./assets/loader.svg" alt="loading...." id="loader" style="width:70px;margin-left: 40%;display:none;">
            </div>


              <div class="main_wrapper__content__username">
                <div class="group">
                   <select id="user_type" placeholder="Choose a User Role">
                    <option value="">Chose a User Role</option>
                    <option value=""></option>
                </select>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                </div>
            </div>

            <p id="msg"></p>


        </div>
    </div>



    <script>

        $(document).ready(function(){
                
                

                var url = `${env.url}/app/api/bidding/getcustomerbid.php`;
                // var url = "https://www.encodedna.com/library/sample.json";
                $.getJSON(url,function(data){
                    $.each(data.data,function(index,value){
                         $('#user_type').append('<option value="' + value.id + '">' + value.description + '</option>');
                    });

                    
                    console.log(data);
                
                });
                
            

            $('#user_type').change(function(){
                $('#msg').text('Selected Item:' + this.options[this.selectedIndex].text);
            })


        });

    </script>
    
    <script src="./scripts/test.js"></script>

 <!--    <script>

        $(document).ready(function(){
                var url = `${env.url}/app/api/bidding/getcustomerbid.php`;
                $.getJSON(url,function(data){
                    $.each(data.data,function(index,value){
                         $('#type').append('<option value="' + value.id + '">' + value.description + '</option>');
                    });
                    console.log(data);
                });
        });
    </script>     -->

 

</body>
</html>

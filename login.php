<?php

$module = (isset($_GET['mod']) && $_GET['mod'] != '') ? $_GET['mod'] : '';
$user = (isset($_GET['mod']) && $_GET['mod'] != '') ? $_GET['mod'] : '';


$routes = array('product_list', 'product', 'checkout', 'cart', 'home', 'account', 'contact_us');

$auth_routes = array('checkout');

$page = './pages/not_found/not_found.php';

if ($module == '') {

    $module = 'home';

}

if (in_array($module, $routes)) {

    $page = './pages/' . $module . '/' . $module . '.php';

} else if (in_array($module, $auth_routes)) {

    $page = './pages/' . $module . '/' . $module . '.php';

} else {

    $module = 'not_found';

}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" media="screen" href="./styles/login.css" />
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="./env.js"></script>
</head>
<body>
    <div class="main_wrapper">
        <div class="main_wrapper__content">
            <div class="main_wrapper__content__header">
                Please Login to Continue
            </div>
            <div class="main_wrapper__content__username">
                <div class="group">
                    <input id="email" type="email" value="" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Email</label>
                </div>
            </div>

            <div class="main_wrapper__content__password">
               <div class="group">
                    <input id="password" type="password" value="" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Password</label>
                </div>
                <div style="text-align:right; padding-top: 20px;">Don't Have an Account? <a href="/register.php">Sign Up Here</a></div>
            </div>

            <div class="main_wrapper__content__buttons">
                <button class="btn red" type="button" id="loginBtn"><span>Login</span></button>
                <img src="./assets/loader.svg" alt="loading...." id="loader" style="width:70px;margin-left: 40%;display:none;">
            </div>

        </div>
    </div>
    <script src="./scripts/login.js"></script>
    <script type="text/javascript">
        function goToRegister() {
            window.location = 'register.php';
        }
    </script>
    <script src="./home/home.js"></script>
</body>
</html>

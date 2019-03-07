<?php
$module = (isset($_GET['mod']) && $_GET['mod'] != '') ? $_GET['mod'] : '';

// Route Validation
$routes = array('product_list', 'product','product_create', 'users');

$auth_routes = array('users'); # User must be logged in first

$page = './pages/not_found/not_found.php';

if ($module == '') {
    $module = 'users';
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>O Concept | Admin Page</title>

    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <script src="./scripts/customtables.js"></script>
    <script src="./scripts/bootstrap.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://nightly.datatables.net/js/jquery.dataTables.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script> 


    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" media="screen" href="./styles/customtables.css"/>
    <link rel="stylesheet" type="text/css" media="screen" href="./styles/custom.css"/>
    <link href="https://nightly.datatables.net/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />

 

    <link rel="stylesheet" type="text/css" media="screen" href="./styles/admin.css" />
    <link href="./pages/<?php echo $module . '/' . $module . '.css' ?>" rel="stylesheet" type="text/css">
    <script src="../env.js"></script> <!-- Global Variables-->


  </head>
  <body>
    <div class="content">
        <div class="content__container__sidebar">
          <div class="content__container__sidebar__content">
            <div class="content__container__sidebar__heading">
              <div class="content__container__sidebar__item__name">O - Concept</div>
            </div>
            <!--  -->
            <a  href="?mod=users" class="content__container__sidebar__item">
              <div class="content__container__sidebar__item__name" >Users</div>
            </a>
            <!--  -->
            <div class="content__container__sidebar__item">
              <div class="content__container__sidebar__item__name">Types</div>
            </div>
            <!--  -->
            <div class="content__container__sidebar__item">
              <div class="content__container__sidebar__item__name">Categories</div>
            </div>
            <!--  -->
            <div class="content__container__sidebar__item">
              <div class="content__container__sidebar__item__name">Account</div>
            </div>

            

            <!-- <div class="content__container__sidebar__footer">Checkout</div> -->
          </div>
        </div>
        <?php require_once $page;?>
        <script src="./scripts/admin.js"></script>
        <script src="./pages/<?php echo $module . '/' . $module . '.js' ?>"></script>
    </div>
  </body>
</html>

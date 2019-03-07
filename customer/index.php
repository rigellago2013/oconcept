<?php
session_start();
$module = (isset($_GET['mod']) && $_GET['mod'] != '') ? $_GET['mod'] : '';

$routes = array('product_list', 'product','product_create','customer-bidding','orders','order_detail','account','description_detail', 'cart');
$auth_routes = array('checkout','order_detail','description_detail');
$page = './pages/not_found/not_found.php';

if ($module == '') {
    $module = 'product_list';
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
    <title>O Concept | Customer Page </title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <!--  <script src="./scripts/customtables.js"></script>
    <script src="./scripts/bootstrap.js"></script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://nightly.datatables.net/js/jquery.dataTables.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" media="screen" href="./styles/customtables.css"/>
    <link rel="stylesheet" type="text/css" media="screen" href="./styles/custom.css"/>
    <link href="https://nightly.datatables.net/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />



    <link rel="stylesheet" type="text/css" media="screen" href="./styles/admin.css" />
    <link href="./pages/<?php echo $module . '/' . $module . '.css' ?>" rel="stylesheet" type="text/css">
    <script src="../env.js"></script> <!-- Global Variables-->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  </head>

  <body>
    <div class="content">

        <div class="content__container__sidebar" style="background-color:#FF771C">

          <div class="content__container__sidebar__content">

            <div class="content__container__sidebar__heading">
              <div class="content__container__sidebar__item__name">O - Concept</div>
            </div>

            <a  style="text-decoration:none;" href="?mod=product_list" class="content__container__sidebar__item">
              <div class="content__container__sidebar__item__name"><span class="glyphicon glyphicon-tag"></span>&nbsp;&nbsp;Products</div>
            </a>

            <a style="text-decoration:none;"  href="?mod=orders" class="content__container__sidebar__item">
              <div class="content__container__sidebar__item__name"><span class="glyphicon glyphicon-object-align-right
              "></span>&nbsp;&nbsp;Orders</div>
            </a>


             <a style="text-decoration:none;"  href="?mod=customer-bidding" class="content__container__sidebar__item">
              <div class="content__container__sidebar__item__name"><span class="glyphicon glyphicon-hand-right
              "></span>&nbsp;&nbsp;Bidding</div>
            </a>

            <a style="text-decoration:none;"  href="?mod=account" class="content__container__sidebar__item">
              <div class="content__container__sidebar__item__name"><span class="glyphicon glyphicon-user
              "></span>&nbsp;&nbsp;Accounts</div>
            </a>


          <a style="text-decoration:none;"  href="?mod=cart" class="content__container__sidebar__item">
              <div class="content__container__sidebar__item__name"><span class="glyphicon glyphicon-shopping-cart
              "></span>&nbsp;&nbsp;Cart</div>
            </a>


              <a style="text-decoration:none;"  href="../login.php" class="content__container__sidebar__item">
              <div class="content__container__sidebar__item__name"><span class="glyphicon glyphicon-shopping-cart
              "></span>&nbsp;&nbsp;Logout</div>
            </a>


          </div>
        </div>

        <?php require_once $page;?>
        <script src="./scripts/admin.js"></script>
         <script src="./scripts/main.js"></script>
        <script src="./pages/<?php echo $module . '/' . $module . '.js' ?>"></script>

    </div>
  </body>
</html>

<?php
$module = (isset($_GET['mod']) && $_GET['mod'] != '') ? $_GET['mod'] : '';

$routes = array('product_list', 'product','product_create', 'ordered_products', 'payments', 'message', 'deliveries', 'Biddings','notification','deliveries','bidding','bidding_detail');
$auth_routes = array('checkout');
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
    <title>O Concept | Seller Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://nightly.datatables.net/js/jquery.dataTables.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" media="screen" href="./styles/customtables.css"/>
    <link rel="stylesheet" type="text/css" media="screen" href="./styles/custom.css"/>
    <link href="https://nightly.datatables.net/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
    <link href="./pages/<?php echo $module . '/' . $module . '.css' ?>" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" media="screen" href="seller.css" />


    <script src="../env.js"></script>
  </head>
  <body>
    <div class="content">

        <div class="content__container__sidebar">

          <div class="content__container__sidebar__content">

            <div class="content__container__sidebar__heading">
              <div class="content__container__sidebar__item__name">O - Concept</div>
            </div>

            <a style="text-decoration:none;" href="index.php" class="content__container__sidebar__item">
              <div class="content__container__sidebar__item__name"><span class="glyphicon glyphicon-tag"></span>&nbsp;&nbsp;Products</div>
            </a>

            <a style="text-decoration:none;" href="?mod=ordered_products" class="content__container__sidebar__item">
              <div class="content__container__sidebar__item__name"><span class="glyphicon glyphicon-gift"></span>&nbsp;&nbsp;Ordered Products</div>
            </a>

            <a style="text-decoration:none;" href="?mod=bidding" class="content__container__sidebar__item">
              <div class="content__container__sidebar__item__name"><span class="glyphicon glyphicon-hand-right"></span>&nbsp;&nbsp;Biddings</div>
            </a>

            <a style="text-decoration:none;" href="?mod=deliveries" class="content__container__sidebar__item">
              <div class="content__container__sidebar__item__name"><span class="glyphicon glyphicon-plane"></span>&nbsp;&nbsp;Deliveries</div>
            </a>

            <a style="text-decoration:none;" href="?mod=payments" class="content__container__sidebar__item">
              <div class="content__container__sidebar__item__name"><span class="glyphicon glyphicon-credit-card"></span>&nbsp;&nbsp;Payments</div>
            </a>

            <a style="text-decoration:none;" href="?mod=message" class="content__container__sidebar__item">
              <div class="content__container__sidebar__item__name"><span class="glyphicon glyphicon-envelope"></span>&nbsp;&nbsp;<span class= "badge badge-success">1</span>Messages</div>
            </a>

            <a style="text-decoration:none;" href="?mod=notification" class="content__container__sidebar__item">
              <div class="content__container__sidebar__item__name"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;&nbsp;<span class= "badge badge-success">1</span>Notifications</div>
            </a>

            <a style="text-decoration:none;" href="../../login.php" class="content__container__sidebar__item">
              <div class="content__container__sidebar__item__name"><span class="glyphicon glyphicon-download"></span>&nbsp;&nbsp;Logout</div>
            </a>


          </div>
        </div>
        <?php require_once $page;?>
       <!--  <script src="./scripts/admin.js"></script> -->
        <script src="./pages/<?php echo $module . '/' . $module . '.js' ?>"></script>
    </div>
  </body>
</html>

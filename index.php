<?php

$module = (isset($_GET['mod']) && $_GET['mod'] != '') ? $_GET['mod'] : '';

$routes = array('product_list', 'product', 'checkout', 'cart', 'home', 'bidding', 'account', 'contact_us', 'orders','order-detail');

$auth_routes = array('checkout','bidding');

$auth_routes = array('checkout');
$page = './pages/not_found/not_found.php';


if ($module == '') {
    $module = 'home';
}

if (in_array($module, $routes)) {
    $page = './customer/pages/' . $module . '/' . $module . '.php';
} else if (in_array($module, $auth_routes)) {
    $page = './customer/pages/' . $module . '/' . $module . '.php';
} else {
    $module = 'not_found';
}

?>

<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>O Concept</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" type="text/css" media="screen" href="./styles/admin.css" />

    <!--Mga Scripts ni Kids-->
    <script src="./env.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="./scripts/customtables.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://nightly.datatables.net/js/jquery.dataTables.js"></script>

    <!--DataTables-->


    <!--Mga CSS ni Kids-->
    <link href="https://nightly.datatables.net/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
    <link href="./customer/pages/<?php echo $module . '/' . $module . '.css' ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" media="screen" href="./styles/custom.css"/>
    <link rel="stylesheet" type="text/css" media="screen" href="./styles/hover.css"/>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" media="screen" href="./styles/main.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="./styles/customtables.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="./styles/bidding.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

  </head>
<body>
    <!--Navigation-->
    <nav>
      <div class="logo">O - Concept</div>
      <div></div>
      <div class="nav-items">
        <div><a href="login.php" class="fas fa-sign-out-alt" style="font-size:20px;margin-left:-60px;margin-top:2px"></a></div>
      </div>
    </nav>
     <!-- End of Navigation-->

    <!-- Slider-->
    <div class="content">
        <?php require_once $page;?>
        <script src="./scripts/main.js"></script>
        <script src="./customer/pages/<?php echo $module . '/' . $module . '.js' ?>"></script>
        <script src="./scripts/bootstrap.js"></script>
    </div>
     <!-- End of Slider-->

     <!--Sidebar Near the below the slider-->

<script type="text/javascript">
    $('#example').dataTable({
      "sPaginationType": "full_numbers"
      })
    .columnFilter({sPlaceHolder: "head:before",
      aoColumns: [{type: "text" },{type: "text" },{type: "text" },{type: "text" },{type: "text" },{type: "text" }]
    });
</script>

  </body>
</html>

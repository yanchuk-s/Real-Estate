
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="description" content="Homely - Responsive Real Estate Template">
  <meta name="author" content="Rype Creative [Chris Gipple]">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HOME PAGE</title>

  <!-- CSS file links -->
  <link href="/realstate/css/bootstrap.min.css" rel="stylesheet" media="screen">
  <link href="/realstate/assets/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" media="screen">
  <link href="/realstate/assets/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet">
  <link href="/realstate/assets/slick-1.6.0/slick.css" rel="stylesheet">
  <link href="/realstate/assets/chosen-1.6.2/chosen.min.css" rel="stylesheet">
  <link href="/realstate/css/nouislider.min.css" rel="stylesheet">
  <link href="/realstate/css/style.css" rel="stylesheet" type="text/css" media="all" />
  <link href="/realstate/css/responsive.css" rel="stylesheet" type="text/css" media="all" />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
  <![endif]-->
</head>
<body>

    @include('realstate.header')

    @yield('mainsection')

    @include('realstate.footer')

<!-- JavaScript file links -->
<script src="/realstate/js/jquery-3.1.1.min.js"></script> <!-- Jquery -->
<script src="/realstate/assets/jquery-ui-1.12.1/jquery-ui.min.js"></script>
<script src="/realstate/js/bootstrap.min.js"></script>  <!-- bootstrap 3.0 -->
<script src="/realstate/assets/slick-1.6.0/slick.min.js"></script> <!-- slick slider -->
<script src="/realstate/assets/chosen-1.6.2/chosen.jquery.min.js"></script> <!-- chosen - for select dropdowns -->
<script src="/realstate/js/isotope.min.js"></script> <!-- isotope-->
<script src="/realstate/js/wNumb.js"></script> <!-- price formatting -->
<script src="/realstate/js/nouislider.min.js"></script> <!-- price slider -->
<script src="/realstate/js/global.js"></script>

<!-- <script sec="js/jquery.matchHeight.js"></script> -->


</body>
</html>
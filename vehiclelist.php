<!DOCTYPE html>
<html><?php
	session_start();
	include_once("dbConnect.php");
	$conn = new dbConnect();

	if(!$conn->get_session()){
		header("location:index.php");
	}

	if(isset($_GET['q'])){
		$conn->Logout();
		header("location:index.php");
	}
?>
  <head>
    <title>JePS.id :: Web Application</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="JePS.id">
    <meta name="description" content="Owned Vehicle List of User">
    <link href="css/ol.css" type="text/css" rel="stylesheet">
    <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="css/font-awesome.min.css" type="text/css" rel="stylesheet">
    <link href="css/style.css" type="text/css" rel="stylesheet">
    <!-- Javascript Link-->
    <script type="text/javascript" src="js/jquery-3.1.1.min.js" defer></script>
    <script type="text/javascript" src="js/bootstrap.min.js" defer></script>
    <script type="text/javascript" src="js/ol.js" defer></script>
    <script type="text/javascript" src="js/main.js" defer></script>
  </head>
  <body>
    <div id="list-wrapper">
      <header id="list-header">
        <div class="container-fluid"><img id="list-logo" src="img/logo-white.png">
          <form class="form-group" id="search-box" method="GET">
            <input class="form-control" type="text" name="search" placeholder="Cari berdasarkan Plat Nomor..."><i class="fa fa-search" aria-hidden="true"></i>
          </form>
          <div id="user"><i class="fa fa-user-circle-o" aria-hidden="true"></i><span><?php echo $_SESSION['user']; ?></span></div><a class="btn btn-danger" id="logout" href="vehiclelist.php?q=logout"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
        </div>
      </header>
      <nav class="container-fluid">
        <div class="row">
          <li class="col-sm-4 col-xs-4 nav-active vehicle"><span><i class="fa fa-car" aria-hidden="true"></i>Vehicles</span></li>
          <li class="col-sm-4 col-xs-4 map"><span><i class="fa fa-map" aria-hidden="true"></i>Map</span></li>
          <li class="col-sm-4 col-xs-4 notif"><span><i class="fa fa-bell" aria-hidden="true"></i>Notification</span></li>
        </div>
      </nav>
      <section class="container-fluid">
        <div class="row veh-detail"></div>
      </section>
      <footer>
        <div id="copyright">&#169 2016, JePS.id</div>
      </footer>
    </div>
  </body>
</html>
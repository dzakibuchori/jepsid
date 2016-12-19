<!DOCTYPE html>
<html>
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
  </head>
  <body>
    <div id="wrapper">
      <header></header>
      <div id="main-wrapper">
        <div id="main"><img id="logo" src="./img/logo.png" alt="logo">
          <div class="lang">
            <div class="btn-group">
              <div class="btn btn-primary btn-sm">ENG</div>
              <div class="btn btn-danger btn-sm">IND</div>
            </div>
          </div>
          <form class="form-group" method="POST" action="">
            <input class="form-control input" type="text" name="user" placeholder="user">
            <input class="form-control input" type="password" name="password" placeholder="password">
            <input class="btn btn-block input" id="login" type="submit" name="login" value="LOGIN">
            <div class="checkbox">
              <div class="text-left row">
                <label class="col-xs-12 col-xs-offset-1">
                  <input type="checkbox" name="remember"><span id="remember">remember me?</span>
                </label>
              </div>
            </div>
          </form><?php
	include_once("dbConnect.php");
	session_start();

	$connObj = new dbConnect();
	// $connObj->teskoneksi();
	if(isset($_POST['login'])){
		$user = $_POST['user'];
		$password = $_POST['password'];

		$login = $connObj->Login($user, $password);

		if($login){
			header("location:vehiclelist.php#data");
		} else {
			?>
			<div class="alert alert-danger">
				invalid username or password !!!
			</div>
			<?php
		}
	}
?>
        </div>
      </div>
      <footer>
        <div id="copyright">&#169 2016, JePS.id</div>
      </footer>
    </div>
  </body>
</html>
<?php
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
<?php
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
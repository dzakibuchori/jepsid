<?php
	class dbConnect
	{
		public $conn;
		public function __construct()
		{
			require_once('config.php');
			$this->conn = new mysqli(server, user, password, database);

			if(!$this->conn){
				die("Cannot connect to database").mysqli_connect_error();
			};
		}

		public function Login($user, $password){
			$res = mysqli_query($this->conn, "SELECT * FROM user WHERE user = '".$user."' AND password = '".$password."'");
			$user_data = mysqli_fetch_array($res);
			$no_rows = mysqli_num_rows($res);

			if ($no_rows == 1){
				$_SESSION['login'] = true;
				$_SESSION['user'] = $user_data['user'];
				$_SESSION['password'] = $user_data['password'];
				return true;
			} else {
				return false;
			}
		}

		public function get_session(){
			return $_SESSION['login'];
		}

		public function Logout(){
			$_SESSION['login'] = false;
			session_destroy();
		}

		public function teskoneksi(){
			if($this->conn){
				echo "koneksi berhasil";
			} else {
				echo "koneksi gagal";
			}
		}

		public function showLoginStatus(){
			echo $_SESSION['login'];
		}

	}

?>
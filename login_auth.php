<?php 
	include 'db_connect.php';
	session_start();

	extract($_POST);
	$password = md5($password);
	$qry = $conn->query("SELECT * FROM users where username='$username' and password = '$password' and user_type = '1'");
	if($qry->num_rows > 0){
		foreach($qry->fetch_array() as $k => $val){
			if($k != 'password')
			$_SESSION['admin_login_'.$k] = $val;
		}
		echo 1;
	}else{
		echo 2;
	}
?>
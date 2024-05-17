<?php
include('db_connect.php');

extract($_POST);
	$data = " name = '$name' ";
	$data .= ", user_type = '2' ";
	$data .= ", username = '$username' ";

	$hashed_pass = hash('md5', $password);
	$data .= ", password = '$hashed_pass' ";

	
	
if(empty($id)){
	
	$insert= $conn->query("INSERT INTO users set ".$data);
	if($insert)
		echo 1;
}else{
	$update= $conn->query("UPDATE users set ".$data." where id =".$id);
	if($update)
		echo 1;
}
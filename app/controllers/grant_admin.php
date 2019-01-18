<?php
	session_start();
	require_once ("./connect.php");

	$id = $_GET['id'];
	//$role = $_GET['user_role'];

	$sql = "SELECT roles_id FROM users WHERE id = $id";
	$result = mysqli_query($conn, $sql);
	$user = mysqli_fetch_assoc($result);

	if($user['roles_id'] == 2){
		$sql = "UPDATE users SET roles_id = 1 WHERE id = $id";
		$update_result = mysqli_query($conn, $sql);
	}else{
		$sql = "UPDATE users SET roles_id = 2 WHERE id = $id";
		$update_result = mysqli_query($conn, $sql);
	}
	header('Location: ../views/users.php')
?>
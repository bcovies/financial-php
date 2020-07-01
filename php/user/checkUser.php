<?php
session_start();
include_once("../connection.php");
$userEmail = filter_input(INPUT_POST, 'userEmail', FILTER_SANITIZE_STRING);
$userPassword = filter_input(INPUT_POST, 'userPassword', FILTER_SANITIZE_STRING);
if ((!empty($userEmail)) and (!empty($userPassword))) {
	$queryUser =
		"SELECT  userName,userEmail,userPasswordHash
			FROM  users
				WHERE userEmail='$userEmail' LIMIT 1";
	$resultUser = mysqli_query($con, $queryUser);
	if ($resultUser) {
		$rowUser = mysqli_fetch_assoc($resultUser);
		if (password_verify($userPassword, $rowUser['userPasswordHash'])) {
			$_SESSION['userEmail'] = $rowUser['userEmail'];
			header("Location: ../../userIndex.php");
		} else {
			echo "Wrong password";
			$_SESSION['msg'] = "Wrong password";
		}
	} else {
		echo "Failed query";
	}
} else {
	echo "Empty Email or Password";
}

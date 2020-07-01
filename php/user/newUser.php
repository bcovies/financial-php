<?php
session_start();

require_once("../connection.php");

$userName = filter_input(INPUT_POST, 'userName', FILTER_SANITIZE_STRING);
$userLast = filter_input(INPUT_POST, 'userLast', FILTER_SANITIZE_STRING);
$userEmail = filter_input(INPUT_POST, 'userEmail', FILTER_SANITIZE_STRING);
$userPassword = filter_input(INPUT_POST, 'userPassword', FILTER_SANITIZE_STRING);
$userPasswordHash = password_hash($userPassword, PASSWORD_DEFAULT);
$userBirth = filter_input(INPUT_POST, 'userBirth', FILTER_SANITIZE_STRING);

$userInsert = 
"INSERT 
    INTO users (userName,userLast,userEmail,userPasswordHash,userBirth)
        VALUES ('$userName','$userLast','$userEmail','$userPasswordHash','$userBirth')";
 
if (mysqli_query($con, $userInsert)) {
    echo "New record created successfully";
    $_SESSION['msg'] = "<p style= 'color:green;'>Usuário cadastrado com sucesso!</p>";
    header("Location: ../../login.html");
  } else {
    echo "Error: " . $userInsert . "<br>" . mysqli_error($con);
  }

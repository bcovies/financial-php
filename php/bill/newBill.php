<?php
session_start();
require_once("../connection.php");
$billName = filter_input(INPUT_POST, 'billName', FILTER_SANITIZE_STRING);
$billValue = filter_input(INPUT_POST, 'billValue', FILTER_SANITIZE_STRING);
$billDate = filter_input(INPUT_POST, 'billDate', FILTER_SANITIZE_STRING);
$date = explode('-', $billDate);
$year = $date[0];
$month   = $date[1];
$day = $date[2];
$month = (int) $month;
$day = (int) $day;
$userEmail_dump = $_SESSION['userEmail'];
$queryUser =
  "SELECT  userId,userEmail
			FROM  users
				WHERE userEmail='$userEmail_dump' LIMIT 1";
$resultUser = mysqli_query($con, $queryUser);
if ($resultUser) {
  $rowUser = mysqli_fetch_assoc($resultUser);
  $_SESSION['userId'] = $rowUser['userId'];
  $userId_dump = $_SESSION['userId'];
  echo "<br> $userId_dump<br>";
} else {
  $_SESSION['msg'] = "Wrong password";
}
$billInsert =
  "INSERT 
    INTO bills (billName,billValue,userId,monthId,billYear)
     VALUES ('$billName','$billValue','$userId_dump','$month','$year')";
if (mysqli_query($con, $billInsert)) {
  header("Location: ../../newBill.php");
} else {
  echo "Error: " . $billInsert . "<br>" . mysqli_error($con);
}

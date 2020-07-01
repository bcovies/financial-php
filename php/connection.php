<?php
include 'database.php';

$con = new mysqli($sqlServer, $sqlUser, $sqlPassword, $sqlDatabase);/*

//$con = mysqli_connect($sqlServer, $sqlUser, $sqlPassword, $sqlDatabase);
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Check if server is alive
if (mysqli_ping($con)) {
    echo "Connection is ok!";
  } else {
    echo "Error: ". mysqli_error($con);
  }*/
<?php

session_start();
unset($_SESSION['idPagador'], $_SESSION['usuario'], $_SESSION['email']);

$_SESSION['msg'] = "Deslogado com sucesso";
header("Location: index.php");
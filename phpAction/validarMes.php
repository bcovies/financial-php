<?php
session_start();
include("../conexao.php");
    
/*
$idNomeMes = filter_input(INPUT_POST, 'idNomeMes', FILTER_SANITIZE_STRING);
$idPagador = filter_input(INPUT_POST, 'idPagador', FILTER_SANITIZE_STRING);
*/
$idPagador =  $_SESSION['idPagador'];
$idNomeMes =  $month = date('m');
$ano =  $year = date('Y');

$result_criarMes = "INSERT INTO mes (idNomeMes,idPagador,ano) VALUES ('$idNomeMes','$idPagador','$ano')";
$resultado_criarMes = mysqli_query($conn, $result_criarMes);
if (mysqli_insert_id($conn)) {
    $_SESSION['msg'] = "<p style= 'color:green;'>Mês criado com sucesso!</p>";
    header("Location: ../painel/index.php");
} else {
    $_SESSION['msg'] = "<p style= 'color:red;'>Mês não criado com sucesso!</p>";
    header("Location: ../painel/index.php");
}

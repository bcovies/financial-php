<?php
session_start();
include("../conexao.php");
    
    $idPagador =$_SESSION['idPagador'];
    $consulta = mysqli_query($conn, "SELECT idMes FROM mes ORDER BY idMes DESC LIMIT 1");
    $consultaF = mysqli_fetch_assoc($consulta);
    

$nomeNf = filter_input(INPUT_POST, 'nomeNf', FILTER_SANITIZE_STRING);
$valorNf = filter_input(INPUT_POST, 'valorNf', FILTER_SANITIZE_STRING);

$result_editarMes = "INSERT INTO mensalidade (idMes,nomeNf,valorNf,idPagador) VALUES ('{$consultaF['idMes']}','$nomeNf','$valorNf','$idPagador')";
$resultado_editarMes = mysqli_query($conn, $result_editarMes);

    if (mysqli_insert_id($conn)) {
    
        $_SESSION['msg'] = "<p style= 'color:green;'>Mês criado com sucesso!</p>";
        header("Location: ../painel/index.php");
    } else {
        
        $_SESSION['msg'] = "<p style= 'color:red;'>Mês não criado com sucesso!</p>";
        header("Location: ../painel/index.php");
    }





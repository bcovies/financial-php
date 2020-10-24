<?php
session_start();
if (!empty($_SESSION['idPagador'])) { } else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: ../index.php");
}
include_once("../conexao.php");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Painel de usuário - Extrato</title>
    <link rel="stylesheet" href="../css/tables.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../js/dataTables.js"></script>
    <script src="../js/jquery.js"></script>
    <script type="text/javascript" language="javascript">
        $(document).ready(function() {
            $('#listar-usuario').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "../phpAction/pesQGeral.php",
                    "type": "POST"
                }
            });
        });
    </script>
</head>

<body>
    <div class="container">
        <!-- TOP Menu -->
        <div class="topnav">
            <a href="index.php">Index</a>
            <a class="active" href="extrato.php">Extrato</a>
            <a href="../sair.php">Sair</a>
        </div>
        <!-- Page Content -->
        <br>
        <h2>Extrato Geral</h2>
        <br>
        <table id="listar-usuario" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>idMes</th>
                    <th>Nome NF</th>
                    <th>valor NF</th>
                    <th>Mes</th>
                    <th>Nome</th>
                    <th>Ano</th>
                </tr>
            </thead>
        </table>

    </div>

</body>

</html>
<?php
session_start();
if (!empty($_SESSION['idPagador'])) { } else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: /main/painel/index.php");
}
include_once("../conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Painel de usuário - Index</title>
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
                    "url": "../phpAction/pesQMes.php",
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
            <a class="active" href="index.php">Index</a>
            <a href="extrato.php">Extrato</a>
            <a href="../sair.php">Sair</a>
        </div>
        <!-- Page Content -->
        <?php
        if (isset($_SESSION['msg']))
            echo $_SESSION['msg'];
        unset($_SESSION['msg']);
        ?>
        
        
        <!-- Criar Mês -->
        <br>
        <h2>Criar Mês</h2>
        <form method="POST" action="../phpAction/validarMes.php">
            <button type="submit">Criar mês</button>
        </form>
        <br>
        <?php
            echo "<p> $_SESSION[nome], seu ID é: $_SESSION[idPagador] </p>";
            
        ?>
        <!-- Adicionar NOTA -->
        <br>
        <h2>Adicionar no Mês</h2>
        <form method="POST" action="../phpAction/validarEMes.php">
            <label>Entre com nome da NOTA FISCAL:</label>
            <input type="text" name="nomeNf" placeholder="Exemplo: Mundial"><br>
            <label>Entre com valor da NOTA FISCAL:</label>
            <input type="number" step="0.01" name="valorNf" placeholder="Exemplo: 49,99"><br>


            <button type="submit">Adicionar Nota</button>
        </form>
        <!-- Extrato do Mês -->
        <br>
        <h2>Extrato do mês</h2>
        <table id="listar-usuario" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>idMes</th>
                    <th>Nome Mes</th>
                    <th>Extrato</th>
                    <th>ID</th>
                    <th>Ano</th>
                </tr>
            </thead>
        </table>


    </div>
</body>

</html>
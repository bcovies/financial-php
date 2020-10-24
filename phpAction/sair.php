<?php

session_start();
unset($_SESSION['idPagador'], $_SESSION['nome'], $_SESSION['email']);

$_SESSION['msg'] = "Deslogado com sucesso";
header("Location: ../index.php");

session_start();
$token = md5(session_id());
if(isset($_GET['token']) && $_GET['token'] === $token) {
   // limpe tudo que for necessário na saída.
   // Eu geralmente não destruo a seção, mas invalido os dados da mesma
   // para evitar algum "necromancer" recuperar dados. Mas simplifiquemos:
   session_destroy();
   header("location: ../index.php");
   exit();
} else {
   echo '<a href="sair.php?token='.$token.'>Confirmar logout</a>';
}
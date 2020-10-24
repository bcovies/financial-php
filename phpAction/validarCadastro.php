<?php
session_start();
include_once("../conexao.php");
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
$senhaHash = password_hash($senha, PASSWORD_DEFAULT);
$result_usuario =  "INSERT INTO usuarios (nome,email,usuario,senha) VALUES ('$nome','$email','$usuario','$senhaHash')";
$resultado_usuario = mysqli_query($conn, $result_usuario);
if (mysqli_insert_id($conn)) {
    $_SESSION['msg'] = "<p style= 'color:green;'>Usuário cadastrado com sucesso!</p>";
    header("Location: ../index.php#paralogin");
} else {
    $_SESSION['msg'] = "<p style= 'color:red;'>Usuário não foi cadastrado com sucesso!</p>";
    header("Location: ../index.php#paracadastro");
}

<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/index.css">
  <title>Index</title>
</head>
<div class="container">
  <a class="links" id="paracadastro"></a>
  <a class="links" id="paralogin"></a>

  <div class="content">
    <!--FORMULÁRIO DE LOGIN-->
    <div id="login">
      <form method="post" action="phpAction/validarLogin.php">
        <h1>Login</h1>
        <p>
          <label for="usuário">Seu usuário</label>
          <input id="idPagador" name="usuario" required="required" type="text" placeholder="" />
        </p>

        <p>
          <label for="senha">Sua senha</label>
          <input id="senha" name="senha" required="required" type="password" placeholder="" />
        </p>

        <p>
          <input type="checkbox" name="manterlogado" id="manterlogado" value="" />
          <label for="manterlogado">Manter-me logado</label>
        </p>

        <p>
          <input type="submit" name="btnLogin" value="Logar" />
        </p>

        <p class="link">
          Ainda não tem conta?
          <a href="#paracadastro">Cadastre-se</a>
        </p>
      </form>
    </div>

    <!--FORMULÁRIO DE CADASTRO-->
    <div id="cadastro">
      <form method="post" action="../main/phpAction/validarCadastro.php">
        <h1>Cadastro</h1>

        <p>
          <label for="nome">Seu nome</label>
          <input id="nome" name="nome" required="required" type="text" placeholder="" />
        </p>

        <p>
          <label for="usuario">Seu usuario</label>
          <input id="usuario" name="usuario" required="required" type="text" placeholder="" />
        </p>

        <p>
          <label for="email">Seu e-mail</label>
          <input id="email" name="email" required="required" type="email" placeholder="" />
        </p>

        <p>
          <label for="senhad">Sua senha</label>
          <input id="senha" name="senha" required="required" type="password" placeholder="" />
        </p>

        <p>
          <input type="submit" name="btnCadastrar" value="Cadastrar" />
        </p>

        <p class="link">
          Já tem conta?
          <a href="#paralogin"> Ir para Login </a>
        </p>
      </form>
    </div>
  </div>
</div>

</html>
<?php 
  session_start();
  include('../config/conexao.php');

  // Remocao de caracteres especiais. 
  $emailUsuario = mysqli_real_escape_string($conexao, $_POST['emailUsuario']);
  $senhaUsuario = mysqli_real_escape_string($conexao, $_POST['senhaUsuario']);

   // Verificao se os dados do formulario esta vazio.
  if (empty($_POST) || empty($_POST['emailUsuario']) || empty($_POST['senhaUsuario'])) {
    $_SESSION['formularioVazio'] = true;
    header('Location: ../templates/index.php');
    exit;
  }

  // Logica para checar se o cadastro e existe e/ou faz o login.
  $sqlQueryVerificacao = "SELECT * FROM usuarios
                          WHERE email = '{$emailUsuario}' AND senha = md5('{$senhaUsuario}')";

  $sqlQueryBusca = mysqli_query($conexao, $sqlQueryVerificacao);
  $sqlQueryResultado = mysqli_num_rows($sqlQueryBusca);

  if ($sqlQueryResultado == 1) {
    $_SESSION['loginRealizado'] = true;
    $sqlDadosUsuario = mysqli_fetch_assoc($sqlQueryBusca);
    $_SESSION['nomeUsuario'] = $sqlDadosUsuario['nome'];
    header('Location: ../templates/dashboard.php');
    exit;
  } else {
      $_SESSION['loginNaoRealizado'] = true;
      header('Location: ../templates/index.php');
      exit;
    }
?>
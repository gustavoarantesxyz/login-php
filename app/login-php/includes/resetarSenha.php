<?php 
  session_start();
  include('../config/conexao.php');

  // Remocao de caracteres especiais. 
  $nomeUsuario = mysqli_real_escape_string($conexao, $_POST['nomeUsuario']);
  $emailUsuario = mysqli_real_escape_string($conexao, $_POST['emailUsuario']);
  $senhaUsuario = mysqli_real_escape_string($conexao, $_POST['senhaUsuario']);

  // Verificao se os dados do formulario esta vazio.
  if (empty($_POST) || empty($_POST['nomeUsuario']) || empty($_POST['emailUsuario']) || empty($_POST['senhaUsuario'])) {
    $_SESSION['formularioVazio'] = true;
    header('Location: ../templates/recuperarSenha.php');
    exit;
  }

  // Logica para checar se os dados sao iguais e/ou troca a senha. 
  $sqlQueryVerificacao = "SELECT * FROM usuarios
                          WHERE nome = '{$nomeUsuario}' AND email = '{$emailUsuario}'";

  $sqlQueryBusca = mysqli_query($conexao, $sqlQueryVerificacao);
  $sqlQueryResultado = mysqli_num_rows($sqlQueryBusca);

  if ($sqlQueryResultado == 1) {
    $_SESSION['senhaRecuperada'] = true;
    $sqlDadosBusca = mysqli_fetch_assoc($sqlQueryBusca);
    $idUsuario = $sqlDadosBusca['id'];
    $sqlQueryTrocaSenha = "UPDATE usuarios SET senha = MD5('{$senhaUsuario}') WHERE usuarios.id = '{$idUsuario}'";
    $sqlTrocaSenha = mysqli_query($conexao, $sqlQueryTrocaSenha);
    header('Location: ../templates/index.php');
    exit;
  } else {
        $_SESSION['dadosInvalidos'] = true;
        header('Location: ../templates/recuperarSenha.php');
        exit;
    }
?>
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
    header('Location: ../templates/criarConta.php');
    exit;
  }

  // Logica para checar se o cadastro ja existe e/ou criar conta.
  $sqlQueryVerificacao = "SELECT * FROM usuarios
                          WHERE email = '{$emailUsuario}' AND senha = md5('{$senhaUsuario}')";

  $sqlQueryBusca = mysqli_query($conexao, $sqlQueryVerificacao);
  $sqlQueryResultado = mysqli_num_rows($sqlQueryBusca);

  if ($sqlQueryResultado == 1) {
    $_SESSION['cadastroExistente'] = true;
    header('Location: ../templates/criarConta.php');
    exit;
  } else {
      $sqlQueryInsere = "INSERT INTO usuarios (id, nome, email, senha) 
                       VALUES (NULL, '{$nomeUsuario}', '{$emailUsuario}', md5('{$senhaUsuario}'))";
    
      $sqlQueryCadastro = mysqli_query($conexao, $sqlQueryInsere);

      if ($sqlQueryCadastro == 1) {
        $_SESSION['cadastroConcluido'] = true;
        header('Location: ../templates/index.php');
        exit;
      } else {
          $_SESSION['cadastroErro'] = true;
          header('Location: ../templates/criarConta.php');
          exit;
      }
    }
?>
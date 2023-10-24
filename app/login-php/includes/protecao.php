<?php 
  session_start();

  if (!isset($_SESSION['loginRealizado'])) {
    $_SESSION['acessoNaoAutorizado'] = true;
    header('Location: ../templates/index.php');
    exit;
  }
?>
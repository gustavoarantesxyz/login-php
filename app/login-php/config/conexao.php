<?php 
  define('HOST', 'mariadb');
  define('USUARIO', 'root');
  define('SENHA', 'root');
  define('DATABASE', 'sistemalogin');

  $conexao = mysqli_connect(HOST, USUARIO, SENHA, DATABASE) or die ('Não foi possível conectar!');
?>
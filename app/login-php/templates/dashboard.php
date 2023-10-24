<?php 
  include('../includes/protecao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bem Vindo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="bg-dark">
  <header>
    <nav class="navbar navbar-expand-sm bg-body-tertiary fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Dashboard</a>
        <ul class="navbar-nav">
          <li>
            <a href="../includes/logout.php" class="btn btn-outline-primary ml-4">Sair</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <section style="height: 300px;" class="container w-auto  d-flex align-items-center">
    <div class="text-center">
      <h1 class="text-white">Seja bem vindo! <?php echo $_SESSION['nomeUsuario'];?></h1>
    </div>
  </section>
</body>
</html>
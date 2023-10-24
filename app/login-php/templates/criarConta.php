<?php 
  session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crie sua conta</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body class="bg-dark">
  <section>
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-md-6">

          <!-- Logica para os alertas. -->
          <div class="card-body"> 
            <?php 
              if (isset($_SESSION['formularioVazio'])) {
                echo '<div class="card bg-danger mb-4">
                <p class="fw-bolder text-white p-3 mb-0 text-center">ERRO: Preencha os campos!</p>
                </div>'; 
              }
              unset($_SESSION['formularioVazio']);

              if (isset($_SESSION['cadastroExistente'])) {
                echo '<div class="card bg-danger mb-4">
                <p class="fw-bolder text-white p-3 mb-0 text-center">ERRO: E-mail ja esta em uso!</p>
                </div>';
              }
              unset($_SESSION['cadastroExistente']);

              if (isset($_SESSION['cadastroErro'])) {
                echo '<div class="card bg-danger mb-4">
                <p class="fw-bolder text-white p-3 mb-0 text-center">ERRO: Tente Novamente!</p>
                </div>';
              }
              unset($_SESSION['cadastroErro']);
            ?>
          </div>

          <!-- Elementos da pagina. -->
          <div class="card p-4">
            <h1 class="card-title mb-3">Registre-se Agora!</h1>
            <p class="card-text">Preencha todos os campos para a criação de sua conta.</p>
            <form action="../includes/cadastrar.php" method="post">
              <label for="nomeUsuario" class="form-label">Nome</label>
              <div class="mb-3 input-group">
                <div class="input-group-text"><i class="bi bi-person-circle"></i></div>
                <input type="text" name="nomeUsuario" id="" class="form-control" placeholder="Seu Nome">
              </div>
              <label for="emailUsuario" class="form-label">E-mail</label>
              <div class="mb-3 input-group">
                <div class="input-group-text"><i class="bi bi-envelope-at-fill"></i></div>
                <input type="text" name="emailUsuario" id="" class="form-control" placeholder="seu-email@email.com">
              </div>
              <label for="senhaUsuario" class="form-label">Senha</label>
              <div class="mb-3 input-group">
                <div class="input-group-text"><i class="bi bi-lock-fill"></i></div>
                <input type="password" class="form-control" id="password" name="senhaUsuario" placeholder="Sua senha" >
              </div>
              <input type="submit" value="Criar conta" class="w-100 btn btn-primary">
              <div class="mt-3">
                <p class="mb-0">Já tem uma conta? <a href="index.php">Faça login</a></p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
</html>
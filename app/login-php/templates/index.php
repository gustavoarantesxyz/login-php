<?php 
  session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
                <p class="fw-bolder text-white p-3 mb-0 text-center">Erro: Todos os campos devem ser preenchidos!</p>
                </div>'; 
              }
              unset($_SESSION['formularioVazio']);

              if (isset($_SESSION['loginNaoRealizado'])) {
                echo '<div class="card bg-danger mb-4">
                <p class="fw-bolder text-white p-3 mb-0 text-center">Erro: Dados inválidos!</p>
                </div>';
              }
              unset($_SESSION['loginNaoRealizado']);

              if (isset($_SESSION['cadastroConcluido'])) {
                echo '<div class="card bg-success mb-4">
                <p class="fw-bolder text-white p-3 mb-0 text-center">Cadastro efetuado com Sucesso!</p>
                </div>';
              }
              unset($_SESSION['cadastroConcluido']);

              if (isset($_SESSION['senhaRecuperada'])) {
                echo '<div class="card bg-success mb-4">
                <p class="fw-bolder text-white p-3 mb-0 text-center">Sua senha foi alterada com sucesso!</p>
                </div>';
              }
              unset($_SESSION['senhaRecuperada']);

              if (isset($_SESSION['acessoNaoAutorizado'])) {
                echo '<div class="card bg-danger mb-4">
                <p class="fw-bolder text-white p-3 mb-0 text-center">Erro: Você tentou acessar uma página sem efetuar login.</p>
                </div>';
              }
              unset($_SESSION['acessoNaoAutorizado']);
            ?>
          </div>
          
          <!-- Elementos da pagina. -->
          <div class="card p-4">
            <h1 class="card-title">Faça seu Login</h1>
            <div class="card-body">
              <form action="../includes/login.php" method="post">
                <label for="emailUsuario" class="form-label">E-mail</label>
                <div class="mb-3 input-group">
                  <div class="input-group-text"><i class="bi bi-envelope-at-fill"></i></div>
                  <input type="email" name="emailUsuario" id="" class="form-control" placeholder="email@exemplo.com">
                </div>
                <div class="d-flex justify-content-between">
                  <label for="senhaUsuario" class="form-label">Senha</label>
                  <label for="recuperarSenha"><a href="recuperarSenha.php">esqueceu?</a></label>
                </div>
                <div class="mb-3 input-group">
                  <div class="input-group-text"><i class="bi bi-lock-fill"></i></div>
                  <input type="password" class="form-control" name="senhaUsuario" placeholder="Sua Senha">
                </div>
                <input type="submit" value="Entrar" class="w-100 btn btn-primary">
                <div class="mt-3">
                  <p class="mb-0">Não tem uma conta? <a href="criarConta.php">Criar conta</a></p>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>
<?php 
  session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recupere sua senha</title>
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
                <p class="fw-bolder text-white p-3 mb-0 text-center">Erro: Todos os campos devem ser preenchidos!</p>
                </div>'; 
              }
              unset($_SESSION['formularioVazio']);

              if (isset($_SESSION['dadosInvalidos'])) {
                echo '<div class="card bg-danger mb-4">
                <p class="fw-bolder text-white p-3 mb-0 text-center">Erro: Dados inválidos!</p>
                </div>';
              }
              unset($_SESSION['dadosInvalidos']);
            ?>
          </div>

          <!-- Elementos da pagina. -->
          <div class="card p-4">
            <h1 class="card-title">Redefinir Senha</h1>
            <p class="card-text fw-bolder text-danger bg-danger-subtle rounded p-2 mb-0">*Para recuperar sua conta, confirme seu nome e o e-mail que você usou para criar sua conta, e defina uma nova senha.</p>
            <div class="card-body"> 
              <form action="../includes/resetarSenha.php" method="post">
                <label for="nomeUsuario" class="form-label">Nome</label>
                <div class="mb-2 input-group">
                  <div class="input-group-text"><i class="bi bi-person-circle"></i></div>
                  <input type="text" name="nomeUsuario" class="form-control" placeholder="Seu Nome">
                </div>
                <p class="mb-3 text-dark-emphasis fst-italic">O mesmo nome usado para criar a conta.</p>
                <label for="emailUsuario" class="form-label">E-mail</label>
                <div class="mb-2 input-group">
                  <div class="input-group-text"><i class="bi bi-envelope-at-fill"></i></div>
                  <input type="email" name="emailUsuario" class="form-control" placeholder="seu-email@email.com">
                </div>
                <p class="mb-3 text-dark-emphasis fst-italic">O mesmo e-mail usado para criar a conta.</p>
                <div>
                  <label for="senhaUsuario" class="form-label">Nova senha</label>
                </div>
                <div class="mb-3 input-group">
                  <div class="input-group-text"><i class="bi bi-lock-fill"></i></div>
                    <input type="password" class="form-control" name="senhaUsuario" placeholder="Sua Senha">
                </div>
                <input type="submit" value="Recuperar Conta" class="w-100 btn btn-primary">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
</html>
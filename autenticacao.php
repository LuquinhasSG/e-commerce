<?php
session_start();

if (isset($_SESSION['user'])) {
  header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <?php include 'header.php'; ?>

  <div class="container vw-100 mt-5">
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link active" href="#login" data-bs-toggle="tab" id="login-nav">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#registro" data-bs-toggle="tab" id="registro-nav">Registro</a>
      </li>
    </ul>

    <div class="tab-content">
      <div class="tab-pane fade show active" id="login">
        <!-- Conteúdo do formulário de login -->
        <form action="login.php" method="POST">
          <div class="mb-3 mt-3">
            <label for="senha" class="form-label">E-mail</label>
            <div class="input-group">
              <span class="input-group-text" id="basic-addon1">@</span>
              <input type="text" class="form-control" placeholder="Insira seu e-mail" aria-describedby="basic-addon1" id="email" name="email" required>
            </div>
          </div>
          <div class="mb-3">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" class="form-control" placeholder="Insira sua senha" id="senha" name="senha" required>
          </div>
          <?php if (isset($_GET['erro'])) : ?>
            <p>Usuário ou senha incorretos.</p>
          <?php endif; ?>
          <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">Entrar</button>
          </div>
        </form>
      </div>

      <div class="tab-pane fade" id="registro">
        <!-- Conteúdo do formulário de registro -->
        <form action="cadastro.php" method="POST">
          <div class="mb-3 mt-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" placeholder="Insira seu nome" id="nome" name="nome" required>
          </div>
          <div class="mb-3">
            <label for="senha" class="form-label">E-mail</label>
            <div class="input-group">
              <span class="input-group-text" id="basic-addon1">@</span>
              <input type="text" class="form-control" placeholder="Insira seu e-mail" aria-describedby="basic-addon1" id="email" name="email" required>
            </div>
          </div>
          <div class="mb-3">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" class="form-control" placeholder="Insira sua senha" id="senha" name="senha" required>
          </div>
          <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">Registrar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
<?php
session_start();

if (isset($_SESSION['user'])) {
  header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Autenticação</title>
  <link rel="stylesheet" href="../../css/bootstrap.min.css">
  <script src="../../js/bootstrap.bundle.min.js"></script>
  <script src="../../js/jquery-3.6.0.min.js"></script>
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
        <form action="auth.php" method="POST" id="login-form">
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
          <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">Entrar</button>
          </div>
          <input type="hidden" name="action" value="login">
        </form>
      </div>

      <div class="tab-pane fade" id="registro">
        <form action="javascript:void(0);" method="POST" id="registro-form" onsubmit="validatePassword()">
          <div class="mb-3 mt-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" placeholder="Insira seu nome" id="nome" name="nome" required>
          </div>
          <div class="mb-3">
            <label for="senha" class="form-label">E-mail</label>
            <div class="input-group">
              <span class="input-group-text" id="basic-addon1">@</span>
              <input type="text" class="form-control" placeholder="Insira seu e-mail" aria-describedby="basic-addon1" id="email-registro" name="email" required>
            </div>
          </div>
          <div class="mb-3">
            <label for="senha-registro" class="form-label">Senha</label>
            <input type="password" class="form-control" placeholder="Insira sua senha" id="senha-registro" name="senha" required>
          </div>
          <div class="mb-3">
            <label for="confirma-senha" class="form-label">Confirmar senha</label>
            <input type="password" class="form-control" placeholder="Confirme sua senha" id="confirma-senha" name="confirma-senha" required>
          </div>
          <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary" onclick="validatePassword(event)">Registrar</button>
          </div>
          <input type="hidden" name="action" value="cadastrar">
        </form>
      </div>
    </div>
  </div>
  <div class="container">
    <div class=" alert alert-danger mt-4 d-none" role="alert" id="alert"></div>
  </div>
</body>
<script>
  $(document).ready(function() {
    const urlParams = new URLSearchParams(window.location.search);
    const erro = urlParams.get('erro').toLowerCase().replace(/^\w/, c => c.toUpperCase());
    var tab = urlParams.get('tab');

    if (tab === 'login') {
      $('a[href="#login"]').tab('show');
    } else if (tab === 'registro') {
      $('a[href="#registro"]').tab('show');
    }

    if (erro !== null) {
      $("#alert").css('display', 'none');
      $("#alert").removeClass('d-none');
      $("#alert").fadeIn(500).delay(5000).fadeOut();
      $("#alert").text(erro);
    }
  });
</script>
<script>
  function validatePassword(event) {
    event.preventDefault();
    const nome = $('#nome').val();
    const email = $('#email-registro').val();
    const password = $('#senha-registro').val();
    const confirmPassword = $('#confirma-senha').val();
    const form = document.getElementById('registro-form');
    if (nome === '' || email === '' || password === '' || confirmPassword === '') {
      $("#alert").css('display', 'none');
      $("#alert").removeClass('d-none');
      $("#alert").fadeIn(500).delay(5000).fadeOut();
      $("#alert").text("Preencha todos os campos.");
      return false;
    }
    if (password !== confirmPassword) {
      $("#alert").css('display', 'none');
      $("#alert").removeClass('d-none');
      $("#alert").fadeIn(500).delay(5000).fadeOut();
      $("#alert").text("As senhas não correspondem.");
      return false;
    }
    if (password.length < 6) {
      $("#alert").css('display', 'none');
      $("#alert").removeClass('d-none');
      $("#alert").fadeIn(500).delay(5000).fadeOut();
      $("#alert").text("A senha deve conter no mínimo 6 caracteres.");
      return false;
    }

    form.submit();
  }
</script>

</html>
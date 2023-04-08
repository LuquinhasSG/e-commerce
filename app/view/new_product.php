<?php
require_once '../../config/session.php';
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Criar produto</title>
  <link rel="stylesheet" href="../../css/bootstrap.min.css">
  <script src="../../js/bootstrap.bundle.min.js"></script>
  <script src="../../js/jquery-3.6.0.min.js"></script>
</head>

<body>
  <?php include 'header.php'; ?>
  <div class="container my-5">
    <h4 class="mb-4">Criar produto</h4>
    <form method="POST" action="javascript:void(0);" id="form-editar-produto">
      <div class="form-group mt-2">
        <label for="nome">Nome:</label>
        <input type="text" class="form-control" id="nome" name="nome" required>
      </div>
      <div class="form-group mt-2">
        <label for="descricao">Descrição:</label>
        <input type="text" class="form-control" id="descricao" name="descricao" required>
      </div>
      <div class="form-group mt-2">
        <label for="codigo_barras">Código de barras:</label>
        <input type="text" class="form-control" id="codigo_barras" name="codigo_barras" required>
      </div>
      <div class="form-group mt-2">
        <label for="fabricante">Fabricante:</label>
        <input type="text" class="form-control" id="fabricante" name="fabricante" required>
      </div>
      <div class="form-group mt-2">
        <label for="validade">Validade:</label>
        <input type="date" class="form-control" id="validade" name="validade" required>
      </div>
      <div class="form-group mt-2">
        <label for="imagem">Imagem:</label>
        <input type="text" class="form-control" id="imagem" name="imagem" required>
      </div>
      <input type="hidden" name="action" value="add">
      <div class="alert alert-primary mt-4 d-none" role="alert" id="alert"></div>
      <div class="d-grid gap-2">
        <button type="submit" id="btn-editar-produto" class="btn btn-primary mt-4">Salvar</button>
      </div>

    </form>
  </div>

  <script>
    $(document).ready(function() {
      $('#btn-editar-produto').click(function() {
        $(this).addClass('disabled').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Carregando...');
        $(this).prop('disabled', true);

        const nome = $('#nome').val();
        const descricao = $('#descricao').val();
        const codigo_barras = $('#codigo_barras').val();
        const fabricante = $('#fabricante').val();
        const validade = $('#validade').val();
        const imagem = $('#imagem').val();

        if (nome == '' || descricao == '' || codigo_barras == '' || fabricante == '' || validade == '' || imagem == '') {
          $("#alert").css('display', 'none');
          $("#alert").removeClass('d-none');
          $("#alert").fadeIn(500).delay(5000).fadeOut();
          $('#alert').removeClass('alert-success');
          $('#alert').addClass('alert-danger');
          $("#alert").text("Preencha todos os campos.");
          $('#btn-editar-produto').prop('disabled', false);
          $('#btn-editar-produto').removeClass('disabled').html('Salvar');
          return;
        }

        $.ajax({
          url: 'actions.php',
          type: 'POST',
          data: $('#form-editar-produto').serialize(),
          success: function(response) {
            $("#alert").css('display', 'none');
            $("#alert").removeClass('d-none');
            $("#alert").fadeIn(500).delay(5000).fadeOut();
            $('#alert').removeClass('alert-danger');
            $('#alert').addClass('alert-success');
            $('#alert').html('Produto criado com sucesso! Retornando para tela anterior');
          },
          error: function(xhr, status, error) {
            $("#alert").css('display', 'none');
            $("#alert").removeClass('d-none');
            $("#alert").fadeIn(500).delay(5000).fadeOut();
            $('#alert').removeClass('alert-success');
            $('#alert').addClass('alert-danger');
            $('#alert').html('Ocorreu um erro ao criar o produto: ' + JSON.parse(xhr.responseText));
          },
          complete: function() {
            $('#btn-editar-produto').html('Salvar');
            setTimeout(function() {
              window.history.back();
            }, 5000);

          }
        });
      });
    });
  </script>
</body>
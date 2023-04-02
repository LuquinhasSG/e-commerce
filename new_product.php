<?php
require_once 'session.php';
?>
<!DOCTYPE html>
<html>

<head>
  <title>Criar produto</title>
  <!-- Inclusão do Bootstrap -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <?php include 'header.php'; ?>
  <div class="container my-5">
    <h4 class="mb-4">Criar produto</h4>
    <form method="POST" action="javascript:void(0);" id="form-editar-produto">
      <div class="form-group mt-2">
        <label for="nome">Nome:</label>
        <input type="text" class="form-control" id="nome" name="nome">
      </div>
      <div class="form-group mt-2">
        <label for="descricao">Descrição:</label>
        <input type="text" class="form-control" id="descricao" name="descricao">
      </div>
      <div class="form-group mt-2">
        <label for="codigo_barras">Código de barras:</label>
        <input type="text" class="form-control" id="codigo_barras" name="codigo_barras">
      </div>
      <div class="form-group mt-2">
        <label for="fabricante">Fabricante:</label>
        <input type="text" class="form-control" id="fabricante" name="fabricante">
      </div>
      <div class="form-group mt-2">
        <label for="validade">Validade:</label>
        <input type="date" class="form-control" id="validade" name="validade">
      </div>
      <div class="form-group mt-2">
        <label for="imagem">Imagem:</label>
        <input type="text" class="form-control" id="imagem" name="imagem">
      </div>
      <input type="hidden" name="action" value="add">
      <div class="alert alert-primary mt-4" role="alert" id="alert" style="display: none">
      </div>
      <div class="d-grid gap-2">
        <button type="submit" id="btn-editar-produto" class="btn btn-primary mt-4">Salvar <div id="loading" class="spinner-grow loading ms-1" role="status">
            <span class="visually-hidden">Loading...</span>
          </div></button>
      </div>

    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#btn-editar-produto').click(function() {
        $('#btn-editar-produto').prop('disabled', true);
        $('#loading').css("visibility", "visible");
        $.ajax({
          url: 'actions.php',
          type: 'POST',
          data: $('#form-editar-produto').serialize(),
          success: function(response) {
            $('#alert').show().delay(5000).fadeOut();
            $('#alert').removeClass('alert-danger');
            $('#alert').addClass('alert-success');
            $('#alert').html('Produto editado com sucesso!');
          },
          error: function(xhr, status, error) {
            $('#alert').show().delay(5000).fadeOut();
            $('#alert').removeClass('alert-success');
            $('#alert').addClass('alert-danger');
            $('#alert').html('Ocorreu um erro ao editar o produto: ' + JSON.parse(xhr.responseText));

          },
          complete: function() {
            setTimeout(function() {
              window.history.back();
              $('#btn-editar-produto').prop('disabled', false);
              $('#loading').css("visibility", "hidden");
            }, 5000);

          }
        });
      });
    });
  </script>
</body>
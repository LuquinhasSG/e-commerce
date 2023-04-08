<?php
require_once '../../config/session.php';
require_once '../../config/firebase.php';
require_once '../model/Produto.php';


if (!isset($_GET['id']) || empty($_GET['id'])) {
  header('Location: index.php');
  exit;
}

$id = $_GET['id'];

$firebase = new FirebaseConfig();
$produtoRef = $firebase->getFirestore()->collection('Produtos')->document($id);
$produto = $produtoRef->snapshot()->data();

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Editar produto</title>
  <link rel="stylesheet" href="../../css/bootstrap.min.css">
  <script src="../../js/bootstrap.bundle.min.js"></script>
  <script src="../../js/jquery-3.6.0.min.js"></script>
</head>

<body>
  <?php include 'header.php'; ?>
  <div class="container my-5">
    <h4 class="mb-4">Editar produto</h4>
    <form method="POST" action="javascript:void(0);" id="form-editar-produto">
      <div class="form-group mt-2">
        <label for="nome">Nome:</label>
        <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $produto['nome']; ?>" required>
      </div>
      <div class="form-group mt-2">
        <label for="descricao">Descrição:</label>
        <input type="text" class="form-control" id="descricao" name="descricao" value="<?php echo $produto['descricao']; ?>" required>
      </div>
      <div class="form-group mt-2">
        <label for="codigo_barras">Código de barras:</label>
        <input type="text" class="form-control" id="codigo_barras" name="codigo_barras" value="<?php echo $produto['codigo_barras']; ?>" required>
      </div>
      <div class="form-group mt-2">
        <label for="fabricante">Fabricante:</label>
        <input type="text" class="form-control" id="fabricante" name="fabricante" value="<?php echo $produto['fabricante']; ?>" required>
      </div>
      <div class="form-group mt-2">
        <label for="validade">Validade:</label>
        <input type="date" class="form-control" id="validade" name="validade" value="<?php echo $produto['validade'] ?>" required>
      </div>
      <div class="form-group mt-2">
        <label for="imagem">Imagem:</label>
        <input type="text" class="form-control" id="imagem" name="imagem" value="<?php echo $produto['imagem']; ?>" required>
      </div>
      <input type="hidden" name="id" value="<?php echo $id; ?>">
      <input type="hidden" name="action" value="set">
      <div class="alert alert-primary mt-4 d-none" role="alert" id="alert">
        Ocorreu um erro ao salvar
      </div>
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
            $('#alert').html('Produto editado com sucesso!');
          },
          error: function(xhr, status, error) {
            $("#alert").css('display', 'none');
            $("#alert").removeClass('d-none');
            $("#alert").fadeIn(500).delay(5000).fadeOut();
            $('#alert').removeClass('alert-success');
            $('#alert').addClass('alert-danger');
            $('#alert').html('Ocorreu um erro ao editar o produto: ' + JSON.parse(xhr.responseText));

          },
          complete: function() {
            $('#btn-editar-produto').prop('disabled', false);
            $('#btn-editar-produto').removeClass('disabled').html('Salvar');
          }
        });

      });
    });
  </script>
</body>
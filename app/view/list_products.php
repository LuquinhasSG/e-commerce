<?php
require_once '../../config/session.php';
require '../../config/firebase.php';

$firestore = new FirebaseConfig();
$produtosRef = $firestore->getFirestore()->collection('Produtos');
$produtos = $produtosRef->documents();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Lista de produtos</title>
  <link rel="stylesheet" href="../../css/bootstrap.min.css">
  <script src="../../js/bootstrap.bundle.min.js"></script>
  <script src="../../js/jquery-3.6.0.min.js"></script>
</head>

<body>
  <?php include 'header.php'; ?>
  <div class="container my-5">
    <div class="row gx-5 mb-3">
      <div class="col">
        <h4>Lista de Produtos</h4>
      </div>
      <div class="col d-flex justify-content-end">
        <a href="new_product.php" class="btn btn-primary">Adicionar Produto</a>
        <a onclick="location.reload()" class="btn btn-success ms-2">Atualizar</a>
      </div>
    </div>

    <table class="table table-striped">
      <thead>
        <tr>
          <th></th>
          <th>Nome</th>
          <th>Descrição</th>
          <th>Código de Barras</th>
          <th>Fabricante</th>
          <th>Validade</th>
          <th>Imagem</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($produtos as $produto) : ?>
          <tr id="<?php echo $produto->id(); ?>">
            <td><input type="checkbox" name="produtos[]" value="<?php echo $produto->id(); ?>"></td>
            <td><?php echo $produto['nome']; ?></td>
            <td><?php echo $produto['descricao']; ?></td>
            <td><?php echo $produto['codigo_barras']; ?></td>
            <td><?php echo $produto['fabricante']; ?></td>
            <td><?php echo $produto['validade']; ?></td>
            <td><img src="<?php echo $produto['imagem']; ?>" alt="<?php echo $produto['nome']; ?>" width="50"></td>
            <td><a href="edit_product.php?id=<?php echo $produto->id(); ?>" class="btn btn-primary btn-sm">Editar</a></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <button id="btn-excluir" class="btn btn-danger">Excluir</button>
  </div>
  <script>
    $(document).ready(function() {
      $('#btn-excluir').click(function() {
        var ids = [];

        $('input[name="produtos[]"]:checked').each(function() {
          ids.push($(this).val());
        });

        $.ajax({
          url: 'actions.php',
          type: 'POST',
          data: {
            action: 'delete-list',
            ids: ids
          },
          success: function(response) {
            ids.forEach(function(id) {
              $('#' + id).remove();
            });
          },
          error: function(xhr, status, error) {
            console.log(xhr.responseText);
          }
        });
      });
    });
  </script>
</body>

</html>
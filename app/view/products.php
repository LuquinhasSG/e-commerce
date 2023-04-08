<?php
session_start();
require_once '../../config/firebase.php';
$firebase = new FirebaseConfig();
$produtosRef = $firebase->getFirestore()->collection('Produtos');
$produtos = $produtosRef->documents();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Produtos</title>
  <link rel="stylesheet" href="../../css/bootstrap.min.css">
  <script src="../../js/bootstrap.bundle.min.js"></script>
  <script src="../../js/jquery-3.6.0.min.js"></script>
</head>

<body>
  <?php include 'header.php'; ?>
  <div class="container my-5">
    <h5 class="card-title text-truncate mb-4">Catálogo de Produtos</h5>
    <div class="row">
      <?php foreach ($produtos as $produto) : ?>
        <div class="col-md-4 mb-4 w-25">
          <div class="card">
            <img src="<?php echo $produto['imagem'] ?>" class="card-img-top" alt="<?php echo $produto['nome'] ?>">
            <div class="card-body">
              <h5 class="card-title text-truncate"><?php echo $produto['nome'] ?></h5>
              <p class="fw-light"><?php echo $produto['codigo_barras'] ?></p>
              <p class="card-text text-truncate"><?php echo $produto['descricao'] ?></p>
              <h6 class="card-subtitle mb-2 text-muted"><?php echo $produto['fabricante'] ?></h6>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</body>

</html>
<?php
require_once __DIR__ . '/config/firebase.php';

$produtosRef = $firestore->collection('Produtos');
$produtos = $produtosRef->documents();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Produtos</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
    <a class="navbar-brand" href="#">E-commerce</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="#">Produtos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Carrinho</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container my-4">
    <div class="row">
      <?php foreach ($produtos as $produto) : ?>
        <div class="col-md-4 mb-4 w-25">
          <div class="card">
            <img src="<?php echo $produto['imagem'] ?>" class="card-img-top" alt="<?php echo $produto['nome'] ?>">
            <div class="card-body">
              <h5 class="card-title"><?php echo $produto['nome'] ?></h5>
              <p class="card-text"><?php echo $produto['descricao'] ?></p>
              <h6 class="card-subtitle mb-2 text-muted"><?php echo 'R$ 109,00' ?></h6>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

</body>

</html>
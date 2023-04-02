<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
  <a class="navbar-brand" href="index.php">E-commerce</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <?php
      if (!isset($_SESSION['user'])) : ?>
        <li class="nav-item active ml-auto">
          <a class="nav-link" href="autenticacao.php">Acessar</a>
        </li>
      <?php else : ?>
        <li class="nav-item active ml-auto">
          <a class="nav-link" href="list_products.php">Gerenciar produtos</a>
        </li>
        <li class="nav-item active ml-auto">
          <a class="nav-link" href="logout.php">Sair</a>
        </li>
      <?php endif; ?>
    </ul>
  </div>
</nav>
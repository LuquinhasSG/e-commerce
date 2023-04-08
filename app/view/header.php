<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
  <div class="container-fluid">
    <a class="navbar-brand" href="../../index.php">E-commerce</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <?php if (!isset($_SESSION['user'])) : ?>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="authentication.php">Acessar</a>
          </li>
        </ul>
      <?php else : ?>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="list_products.php">Gerenciar produtos</a>
          </li>
        </ul>
        <p>Olá <?php echo $_SESSION['user']['nome'] ?>!</p>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <div class="d-flex flex-row align-items-center text-white">
              <?php if ($_SESSION['user']['nome'] != null) : ?>
                <p class="me-4 mb-0">Olá <?php echo $_SESSION['user']['nome'] ?>!</p>
              <?php endif; ?>
              <a class="nav-link" href="logout.php">Sair</a>
            </div>

          </li>
        </ul>
      <?php endif; ?>
    </div>
  </div>
</nav>
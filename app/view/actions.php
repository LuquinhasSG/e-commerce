<?php
require_once '../controller/ProdutoController.php';

$produtoController = new ProdutoController();

if (isset($_POST['action'])) {
  $produtoController->handleRequest($_POST);
}

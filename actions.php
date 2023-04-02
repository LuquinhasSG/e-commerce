<?php
require_once 'config/firebase.php';
require_once 'classes/Produto.php';

$action = $_POST['action'];

if (isset($_POST['action'])) {
  $produto = new Produto();
  if ($action != 'delete-list') {
    $produto->setId($_POST['id']);
    $produto->setNome($_POST['nome']);
    $produto->setDescricao($_POST['descricao']);
    $produto->setCodigoDeBarras($_POST['codigo_barras']);
    $produto->setFabricante($_POST['fabricante']);
    $produto->setValidade($_POST['validade']);
    $produto->setImagem($_POST['imagem']);
  }


  switch ($_POST['action']) {
    case 'add':
      $produto->add();
      break;

    case 'set':
      $produto->set();
      break;

    case 'delete':
      $produto->delete();
      break;

    case 'delete-list':
      foreach ($_POST['ids'] as $id) {
        $produto->setId($id);
        $produto->delete();
      }

      break;

    default:
      // Ação inválida
      break;
  }
}

<?php
require_once '../../config/session.php';
require_once '../model/Produto.php';

class ProdutoController
{
  private $produto;

  public function __construct()
  {
    $this->produto = new Produto();
  }

  public function handleFormSubmit($formData)
  {
    if ($formData['action'] != 'delete-list') {
      $this->produto->setId($formData['id']);
      $this->produto->setNome($formData['nome']);
      $this->produto->setDescricao($formData['descricao']);
      $this->produto->setCodigoDeBarras($formData['codigo_barras']);
      $this->produto->setFabricante($formData['fabricante']);
      $this->produto->setValidade($formData['validade']);
      $this->produto->setImagem($formData['imagem']);
    }
  }

  public function add()
  {
    $this->produto->add();
  }

  public function set()
  {
    $this->produto->set();
  }

  public function delete()
  {
    $this->produto->delete();
  }

  public function deleteList()
  {
    foreach ($_POST['ids'] as $id) {
      $this->produto->setId($id);
      $this->produto->delete();
    }
  }

  public function handleRequest($formData)
  {
    $this->handleFormSubmit($formData);

    switch ($formData['action']) {
      case 'add':
        $this->add();
        break;

      case 'set':
        $this->set();
        break;

      case 'delete':
        $this->delete();
        break;

      case 'delete-list':
        $this->deleteList();
        break;

      default:
        break;
    }
  }
}

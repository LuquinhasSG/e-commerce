<?php
session_start();
require_once '../../config/firebase.php';
require_once '../../config/translate.php';
require_once '../model/Usuario.php';

class AuthController
{
  private $firebase;
  private $translate;

  public function __construct()
  {
    $this->firebase = new FirebaseConfig();
    $this->translate = new TranslateConfig();
  }

  public function cadastrar($nome, $email, $senha)
  {
    $userProperties = [
      'nome' => $nome,
    ];

    try {
      $user = $this->firebase->getAuth()->createUserWithEmailAndPassword($email, $senha, $userProperties);
      $usuario = new Usuario();
      $usuario->setId($user->uid);
      $usuario->setNome($nome);
      $usuario->setEmail($email);
      $usuario->setIsAdmin(true);
      $usuario->set();
      header('Location: authentication.php');
      exit();
    } catch (\Exception $e) {
      $message = $this->translate->translate($e->getMessage());
      header('Location: authentication.php?tab=registro&erro=' . $message);
    }
  }

  public function login($email, $senha)
  {
    try {
      $user = $this->firebase->getAuth()->signInWithEmailAndPassword($email, $senha);
      $firestoreUser = $this->firebase->getFirestore()->collection('Usuarios')->document($user->data()['localId'])->snapshot();
      $usuario = new Usuario();
      $usuario->setId($user->data()['localId']);
      $usuario->fromFirebase($firestoreUser->data());
      $_SESSION['user'] = $usuario->toArray();
      header('Location: list_products.php');
      exit();
    } catch (\Exception $e) {
      $message = $this->translate->translate($e->getMessage());
      header('Location: authentication.php?erro=' . $message);
    }
  }
}

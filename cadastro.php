<?php
require_once 'config/firebase.php';
require_once 'classes/Usuario.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$userProperties = [
  'nome' => $_POST['nome'],
];

try {
  // A senha não precisa ser criptografada, pois o Firebase faz isso automaticamente.
  $user = $auth->createUserWithEmailAndPassword($email, $senha, $userProperties);
  $usuario = new Usuario($nome, $email, $senha, false);
  $firestore->collection('Usuarios')->add($usuario->toArray());
  header('Location: autenticacao.php');
  exit();
} catch (\Exception $e) {
  header('Location: autenticacao.php');
}


<?php
session_start();
require_once 'config/firebase.php';

$email = $_POST['email'];
$senha = $_POST['senha'];

try {
  $user = $auth->signInWithEmailAndPassword($email, $senha);
  $_SESSION['user'] = $user->data();
  header('Location: list_products.php');
  exit();

} catch (\Kreait\Firebase\Auth\SignIn\FailedToSignIn $e) {
  header('Location: autenticacao.php?erro=1');
}

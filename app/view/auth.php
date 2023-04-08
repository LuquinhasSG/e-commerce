<?php

require_once '../controller/AuthController.php';

$authController = new AuthController();

if ($_POST['action'] == 'cadastrar') {
  $authController->cadastrar($_POST['nome'], $_POST['email'], $_POST['senha']);
} else if ($_POST['action'] == 'login') {
  $authController->login($_POST['email'], $_POST['senha']);
}

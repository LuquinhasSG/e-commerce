<?php
class Usuario
{
  private $nome;
  private $email;
  private $password;
  private $isAdmin;

  public function __construct($nome, $email, $password, $isAdmin)
  {
    $this->nome = $nome;
    $this->email = $email;
    $this->password = $password;
    $this->isAdmin = $isAdmin;
  }

  public function getNome()
  {
    return $this->nome;
  }

  public function setNome($nome)
  {
    $this->nome = $nome;
  }

  public function getEmail()
  {
    return $this->email;
  }

  public function setEmail($email)
  {
    $this->email = $email;
  }

  public function getPassword()
  {
    return $this->password;
  }

  public function setPassword($password)
  {
    $this->password = $password;
  }

  public function getIsAdmin()
  {
    return $this->isAdmin;
  }

  public function setIsAdmin($isAdmin)
  {
    $this->isAdmin = $isAdmin;
  }

  public function toArray()
  {
    return [
      'nome' => $this->nome,
      'email' => $this->email,
      'isAdmin' => $this->isAdmin,
    ];
  }
}

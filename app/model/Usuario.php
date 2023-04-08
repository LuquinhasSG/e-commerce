<?php
class Usuario
{
  private $id;
  private $nome;
  private $email;
  private $password;
  private $isAdmin;
  private $firebase;

  public function __construct()
  {
    $this->firebase = new FirebaseConfig();
  }

  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
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

  // método para adicionar um documento Usuario no Firestore
  public function add()
  {
    // adiciona um novo documento com o ID especificado
    $this->firebase->getFirestore()->collection('Usuarios')->add([
      'nome' => $this->nome,
      'email' => $this->email,
      'isAdmin' => $this->isAdmin,
    ]);
  }

  // método para atualizar um documento Usuario existente no Firestore
  public function set()
  {
    $this->firebase->getFirestore()->collection('Usuarios')->document($this->id)->set([
      'nome' => $this->nome,
      'email' => $this->email,
      'isAdmin' => $this->isAdmin,
    ]);
  }

  // método para remover um documento Usuario do Firestore
  public function delete()
  {
    $this->firebase->getFirestore()->collection('Usuarios')->document($this->id)->delete();
  }

  public function toArray()
  {
    return [
      'nome' => $this->nome,
      'email' => $this->email,
      'isAdmin' => $this->isAdmin,
    ];
  }

  public function fromFirebase($data)
  {
    $this->nome = $data['nome'];
    $this->email = $data['email'];
    $this->isAdmin = $data['isAdmin'];
  }
}

<?php

require_once 'config/firebase.php';
class Produto
{
    private $id;
    private $nome;
    private $descricao;
    private $codigo_barras;
    private $fabricante;
    private $validade;
    private $imagem;

    // Métodos para obter e definir os atributos da classe
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

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function getCodigoDeBarras()
    {
        return $this->codigo_barras;
    }

    public function setCodigoDeBarras($codigo_barras)
    {
        $this->codigo_barras = $codigo_barras;
    }

    public function getFabricante()
    {
        return $this->fabricante;
    }

    public function setFabricante($fabricante)
    {
        $this->fabricante = $fabricante;
    }

    public function getValidade()
    {
        return $this->validade;
    }

    public function setValidade($validade)
    {
        $this->validade = $validade;
    }

    public function getImagem()
    {
        return $this->imagem;
    }

    public function setImagem($imagem)
    {
        $this->imagem = $imagem;
    }

    public function add()
    {
        global $firestore;

        // adiciona um novo documento com o ID especificado
        $firestore->collection('Produtos')->add([
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'codigo_barras' => $this->codigo_barras,
            'fabricante' => $this->fabricante,
            'validade' => $this->validade,
            'imagem' => $this->imagem
        ]);
    }

    // método para atualizar um documento Produto existente no Firestore
    public function set()
    {
        global $firestore;

        $firestore->collection('Produtos')->document($this->id)->set([
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'codigo_barras' => $this->codigo_barras,
            'fabricante' => $this->fabricante,
            'validade' => $this->validade,
            'imagem' => $this->imagem
        ]);
    }

    // método para remover um documento Produto do Firestore
    public function delete()
    {
        global $firestore;

        $firestore->collection('Produtos')->document($this->id)->delete();
    }
}

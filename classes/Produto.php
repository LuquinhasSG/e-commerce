<?php
class Produto
{
    private $id;
    private $nome;
    private $descricao;
    private $codigoBarras;
    private $fabricante;
    private $validade;

    // construtor
    public function __construct($id, $nome, $descricao, $codigoBarras, $fabricante, $validade)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->codigoBarras = $codigoBarras;
        $this->fabricante = $fabricante;
        $this->validade = $validade;
    }

    // getters e setters
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

    public function getCodigoBarras()
    {
        return $this->codigoBarras;
    }

    public function setCodigoBarras($codigoBarras)
    {
        $this->codigoBarras = $codigoBarras;
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
}

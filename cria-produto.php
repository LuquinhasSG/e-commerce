<?php

require_once 'config/firebase.php';

// define os dados do produto
$data = [
    'nome' => 'Creatina Max Titanium',
    'descricao' => 'Suplemento alimentar para atletas',
    'codigo_de_barras' => '7898095340217',
    'fabricante' => 'Max Titanium',
    'validade' => '2023-06-30',
    'imagem_url' => 'https://exemplo.com/creatina_max_titanium.jpg'
];

// adiciona o documento na coleção "Produtos"
$docRef = $firestore->collection('Produtos')->add($data);

// imprime o ID do novo documento
echo 'Produto criado com sucesso. ID: ' . $docRef->id();

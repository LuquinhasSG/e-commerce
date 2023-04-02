<?php

require_once 'config/firebase.php';
require_once 'classes/Produto.php';

$produtos = [
    [
        "nome" => "Creatina Max Titanium",
        "descricao" => "Creatina para auxiliar no ganho de massa muscular",
        "codigo_barras" => "7898948585443",
        "fabricante" => "Max Titanium",
        "validade" => "2024-06-30",
        "imagem" => "https://static.vhsys.com/vh-drive/produtos/50048917/EGIDE___300G___LIMAO___MAX_TITANIUM___PRE-TREINO_2499280_thumb.png"
    ],
    [
        "nome" => "Hipercalórico",
        "descricao" => "Suplemento hipercalórico para ganho de peso e massa muscular",
        "codigo_barras" => "7891234567890",
        "fabricante" => "Integralmédica",
        "validade" => "2023-12-31",
        "imagem" => "https://www.madrugaosuplementos.com.br/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/c/i/citrus.png"
    ],
    [
        "nome" => "100% Whey",
        "descricao" => "Proteína do soro do leite para auxiliar no ganho de massa muscular",
        "codigo_barras" => "7898106198274",
        "fabricante" => "Optimum Nutrition",
        "validade" => "2022-11-30",
        "imagem" => "https://www.madrugaosuplementos.com.br/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/o/n/on-whey-gold-standard-morango-2_00-lbs-_907g__1.png"
    ],
    [
        "nome" => "Hórus 150g",
        "descricao" => "Suplemento pré-treino para aumento de energia e foco",
        "codigo_barras" => "7894567891230",
        "fabricante" => "Atlhetica Nutrition",
        "validade" => "2023-10-31",
        "imagem" => "https://www.madrugaosuplementos.com.br/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/c/r/creatina-300g-max-titanium.png"
    ],
    [
        "nome" => "Égide 300g",
        "descricao" => "Suplemento pós-treino para recuperação muscular",
        "codigo_barras" => "7894567891231",
        "fabricante" => "Atlhetica Nutrition",
        "validade" => "2024-04-30",
        "imagem" => "https://integralmedica.vteximg.com.br/arquivos/ids/155656-292-292/sinister-mass-chocolate-3kg-integralmedica.png?v=637324119451970000"
    ]
];

foreach ($produtos as $produtoData) {
    $produto = new Produto(
        null,
        $produtoData["nome"],
        $produtoData["descricao"],
        $produtoData["codigo_barras"],
        $produtoData["fabricante"],
        $produtoData["validade"],
        $produtoData["imagem"]
    );

    $produto->add();
}

echo "Produtos adicionados com sucesso!";

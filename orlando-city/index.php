<?php

require 'inc/configuration.php';
require 'inc/Slim-2.x/Slim/Slim.php';

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

// GET route
$app->get(
    '/',
    function () {
        
        require_once("view/index.php");

    }
);

$app->get(
    '/home',
    function () {
        
        require_once("view/index.php");

    }
);

$app->get(
    '/videos',
    function () {
        
        require_once("view/videos.php");

    }
);

$app->get(
    '/shop',
    function () {
        
        require_once("view/shop.php");

    }
);

$app->get('/produtos', function(){
    
    $sql = new Sql();

    $data = $sql->select("SELECT * FROM hcode_shop.tb_produtos where preco_promorcional > 0 order by preco_promorcional desc limit 3;");

    foreach ($data as &$produto) {
        $preco = $produto['preco'];
        $centavos = explode(".", $preco);
        $produto['preco'] = number_format($preco, 0, ",", ".");
        $produto['centavos'] = end($centavos);
        $produto['parcelas'] = 10;
        $produto['parcela'] = $preco/$produto['parcelas'];
        $produto['total'] = number_format($preco, 2, ",", ".");
    }

    echo json_encode($data);

});

$app->get('/produtos-mais-buscados', function() {
    $sql = new Sql();

    $data = $sql->select("SELECT * FROM hcode_shop.tb_produtos LIMIT 4;");

    foreach ($data as &$produto) {
        $preco = $produto['preco'];
        $centavos = explode(".", $preco);
        $produto['preco'] = number_format($preco, 0, ",", ".");
        $produto['centavos'] = end($centavos);
        $produto['parcelas'] = 10;
        $produto['parcela'] = $preco/$produto['parcelas'];
        $produto['total'] = number_format($preco, 2, ",", ".");
    }

    echo json_encode($data);
});

$app->run();

<?php

//Dependências
require './retorno.php';
require './index.php';

use Classes\Campeao;

$campeaoDB = new Campeao();
$campeaos = crawler();

//Captura os dados: Nome campeao e a imagem do campeao
//E jogo para o banco de dados
foreach($campeaos as $campeao){
    $campeaoDB->inserir($campeao['nome'], $campeao['imagem']);
}

?>
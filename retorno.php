<?php

namespace Classes;

//Necessita do arquivo Conexao.php
require 'Conexao.php';

use classes\Conexao;

class Campeao {
    
    private $conexao;
    
    //Estabelece uma conexão com o database criado.
    public function __construct() {
        $con = new Conexao();
        $this->conexao = $con->getConexao();
    }
    //Lista os nomes dos champion na função "select * from champion;";
    public function listar() {
        $sql = "select * from champion;";       
        $q = $this->conexao->prepare($sql);
        $q->execute();
        return $q;
    }
    //Insere os nomes e imagens dos champion dá página escolhida.
    //OBS: O código já vai automática porcausa do autoincrment!
    public function inserir($nome, $img) {
        $sql = "insert into champion (nome_campeao, foto_campeao) values (?, ?);";
        $q = $this->conexao->prepare($sql);
        $q->bindParam(1, $nome);
        $q->bindParam(2, $img);
        $q->execute();
    }
    
}
?>
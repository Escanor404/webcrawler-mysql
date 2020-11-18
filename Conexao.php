<?php

namespace Classes;

class Conexao {
    
    private $username;
    private $password;
    private $database;
    private $host;
    
    //Conecta com o DB webcrawler que foi criado no início da aula
    public function __construct() {
        $this->username = 'root';
        $this->password = '';
        $this->host = 'localhost';
        $this->database = 'webcrawler';
    }
    
    public function getConexao() {

        $con = new \PDO('mysql:host='.$this->host.';dbname='.$this->database, $this->username, $this->password);

        return $con;
    }

}

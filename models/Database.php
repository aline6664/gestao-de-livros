<?php

class Database {
    // valores padrões
    private $host = 'localhost';
    private $db_name = 'biblioteca';
    private $username = 'root';
    private $password = '';
    private $DBConn; // conexao com o banco

    public function __construct($servidor, $nomeBanco, $usuario, $senha) {
        $this->host = $servidor;
        $this->db_name = $nomeBanco;
        $this->username = $usuario;
        $this->password = $senha;
        // criar o database
        $this->createDatabase();
    }

    // criar database se não existir
    public function createDatabase() {
        try {
            // conexão
            $this->DBConn = new PDO('mysql:host=' . $this->host, $this->username, $this->password);
            // echo "Conexão bem-sucedida!"; // para verificar se conexão funcionou

            $this->DBConn->exec('CREATE DATABASE IF NOT EXISTS ' . $this->db_name);

            // reconectar ao novo database
            $this->DBConn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
            $this->DBConn->exec('set names utf8');
        }
        catch (PDOException $e) {
            error_log("Erro ao criar o banco de dados: " . $e->getMessage());
            die("Erro ao conectar-se ao banco.");
        }
    }

    // criar a conexão
    public function getConnection() {
        $this->DBConn = null;
        try {
            // PDO(mysql:host= "localhost"; dbname= "nome_database", "usuario", "senha")
            $this->DBConn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
            $this->DBConn->exec('set names utf8'); // permitir o uso de caracteres especiais
        }
        catch (PDOException $e) {
            error_log("Erro ao conectar-se ao banco: " .$e->getMessage());
            die("Falha na conexão. Por favor, tente novamente mais tarde.");
        }
        return $this->DBConn;
    }
}
?>
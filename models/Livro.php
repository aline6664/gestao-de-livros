<?php

class Livro {
    // atributos
    private $conexao; // conexão com o banco de dados do tipo Database
    private $tableName = 'livros';
    
    public $id;
    public $titulo;
    public $autor;
    public $ano_publicacao;
    public $categoria;

    // métodos
    public function __construct($db) { // toda vez que cria um objeto Livro precisa passar a database
        $this->conexao = $db;
    }

    // REGISTRAR LIVRO
    public function criar() {
        // inserir usando parâmetros
        $comandoSQL = "INSERT INTO `{$this->tableName}` (titulo, autor, ano_publicacao, categoria) VALUES (:param1, :param2, :param3, :param4)";
        try {
            $acesso = $this->conexao->prepare($comandoSQL);
            $acesso->bindParam(':param1', $titulo);
            $acesso->bindParam(':param2', $autor);
            $acesso->bindParam(':param3', $ano_publicacao);
            $acesso->bindParam(':param4', $categoria);
            $acesso->execute();
        }
        catch (PDOException $erro) {
            echo "Erro ao registrar o livro: " . $erro->getMessage();
        }
    }

    // LISTAR TODOS LIVROS REGISTRADOS
    public function listar() {
        var_dump($this->table_name);
        $comandoSQL = "SELECT * FROM `{$this->table_name}` ORDER BY `id` DESC"; // ordenar por ID
        try {
            $acesso = $this->conexao->prepare($comandoSQL); // prepare() valida o comando SQL para o acesso
            $acesso->execute(); // executa o comando SQL
            return $acesso;
        }
        catch (PDOException $erro) {
            echo "Erro ao listar os livros: " . $erro->getMessage();
        }
    }

    /*
    // BUSCAR CLIENTE PELO NOME
    public function buscarNome($nomeBusca) {
        // retornar linha(s) da tabela com o nome igual
        $comandoSQL = "SELECT * FROM {$this->tableName} WHERE nome = :nome";
        try {
            $acesso = $this->conexao->prepare($comandoSQL);
            $acesso->bindParam(':nome', $nomeBusca); // passando o parâmetro para o comando SQL
            $acesso->execute();
            return $acesso->fetchAll(PDO::FETCH_ASSOC); // retorna as linhas encontradas
        }
        catch (PDOException $erro) {
            echo "Erro ao recuperar cliente(s) por nome: " . $erro->getMessage();
        }
    }
    */

    // ALTERAR DADOS DO LIVRO
    public function alterar($id, $titulo, $autor, $ano_publicacao, $categoria) {
        $comandoSQL = "UPDATE `{$this->tableName}` SET `titulo = :param1, autor = :param2, ano_publicacao = :param3, categoria = :param4`";
        try {
            $acesso = $this->conexao->prepare($comandoSQL);
            $acesso->bindParam(':param1', $titulo);
            $acesso->bindParam(':param2', $autor);
            $acesso->bindParam(':param3', $ano_publicacao);
            $acesso->bindParam(':param4', $categoria);
            return $acesso->execute([$id, $titulo, $autor, $ano_publicacao, $categoria]);    
        }
        catch (PDOException $erro) {
            echo "Erro ao alterar dados do livro: " . $erro->getMessage();
        }    
    }

    // APAGAR LIVRO
    public function excluir($id) {
        $comandoSQL = "DELETE FROM `{$this->table_name}` WHERE `id = :id`";
        try {
            $acesso = $this->conexao->prepare($comandoSQL);
            $acesso->bindParam(':id', $id);
            $acesso->execute();
        }
        catch (PDOException $erro) {
            echo "Erro ao excluir o livro: " . $erro->getMessage();
        }
    }
}

?>
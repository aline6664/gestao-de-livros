<?php

require_once "../models/Livro.php";
require_once "../models/Database.php";

// O controlador vai gerenciar as telas e os objetos da classe Livro

class LivroController {
    // atributos
    private $livroModel; // objeto da classe Livro
    private $db; // opcional

    // métodos
    public function __construct() {
        // Toda vez que inicializa o controlador, inicializa um objeto Livro
        $this->db = new Database('localhost','banco_sistema','root','');
        $this->livroModel = new Livro($this->db->getConnection());
    }

    // Funções que são chamadas quando o usuário CLICA nos botões correspondentes na tela (view)
    // papel deles é chamar as funções do Livro model

    public function criar() {
        $dados = $this->livroModel->criar($_POST['titulo'], $_POST['autor'], $_POST['ano_publicacao'], $_POST['categoria']);
        header("Location: views/livro_index.php");
        exit;
    }

    public function listar() {
        $dados = $this->livroModel->listar();
        // require "views/listar.php"; // chama a tela que lista os livros
    }

    public function alterar() {
        if ($_POST) { // verifica se o formulário foi submetido (via POST)
            $this->livroModel->alterar($_POST['id'], $_POST['titulo'], $_POST['autor'], $_POST['ano_publicacao'], $_POST['categoria']);
            header("Location: views/livro_index.php");
            exit;
        }
    }

    public function excluir() {
        if (isset($_GET['id'])) { // verifica se livro com este id existe (via GET)
            $this->livroModel->excluir($_GET['id']);
            header("Location: views/livro_index.php");
            exit;
        }
    }

    // Função extra que é chamada quando for alterar
    // ela mostra um form para editar diretamente por ele
    public function editarForm() {
        if (!isset($_GET['id'])) {  // se o campo não for preenchido ...
            die("ID não informado.");
        }

        $livro = $this->livro->buscarPorId($_GET['id']); // se o ID não existir ...
        if (!$livro) {
            die("Livro não encontrado.");
        }

        require "views/livro_alterar.php";
    }
}

?>
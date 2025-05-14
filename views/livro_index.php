<?php
    require_once "../controllers/LivroController.php";

$controller = new LivroController();

// controla a ação que é informada
// caso nenhuma ação for passada, ele cai no "listar" (mostra os livros)
$acao = $_GET['acao'] ?? 'listar';

switch ($acao) {
    case 'salvar':
        $controller->salvar();
        break;
    case 'editar':
        $controller->editarForm();
        break;
    case 'atualizar':
        $controller->atualizar();
        break;
    case 'excluir':
        $controller->excluir();
        break;
    default: // sempre lista os livros se nenhuma ação for escolhida pelo usuário
        $controller->listar();
        break;
}
?>
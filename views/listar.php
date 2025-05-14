<!-- a view vai mostrar na tela o que foi acessado no banco de dados -->

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Listagem de Livros</title>
    <link rel="stylesheet" type="text/css" href="lista.css">
</head>
<body>
     <h1>Listagem de Livros</h1>
     <button><a href="./adicionar.php">+ Adicionar Livro</a></button>
     <br><br>

     <table>
        <thead>
            <tr>
                <td>ID</td>
                <td>TÍtulo</td>
                <td>Autor</td>
                <td>Ano de Publicação</td>
                <td>Categoria</td>
                <td>Ações</td>
            </tr>
        </thead>

        <tbody>
        <!-- Criar uma repetição para exibir todos os livros, usando a variável $livros -->
            <?php
                while ($livro = $livros->fetch(PDO::FETCH_ASSOC)):  ?>
                <tr>
                    <td><?= $livro['id'] ?></td>
                    <td><?= htmlspecialchars($livro['titulo']) ?></td>
                    <td><?= htmlspecialchars($livro['autor']) ?></td>
                    <td><?= htmlspecialchars($livro['ano_publicacao']) ?></td>
                    <td><?= htmlspecialchars($livro['categoria']) ?></td>
                    <td>
                        <a href="livro_index.php?acao=alterar&id=<?= $livro['id'] ?>">Editar</a> |
                        <a href="livro_index.php?acao=excluir&id=<?= $livro['id'] ?>" onclick="return confirm('Deseja realmente excluir?')">Excluir</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
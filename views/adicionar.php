<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Adicionar livro</title>
    <link rel="stylesheet" type="text/css" href="form.css">
</head>
<body>
    <h1>Adicionar livro</h1>

    <form action="index.php?acao=salvar" method="POST">

        <label>Título: </label><br>
        <input type="text" name="titulo" placeholder="Digite o título do livro" required><br><br>

        <label>Autor:</label><br>
        <input type="text" name="autor" placeholder="Digite o nome do autor do livro"required><br><br>

        <label>Ano de Publicação:</label><br>
        <input type="number" min="1000" max="2099" step="1" value="2025" required><br><br>

        <label for="categoria">Categoria:</label><br>
        <select id="campo" name="categoria" required>
            <option value="Romance">Romance</option>
            <option value="Conto">Conto</option>
            <option value="Crônica">Crônica</option>
            <option value="Poesia">Poesia</option>
            <option value="Teatro">Teatro</option>
        </select><br><br>

        <div class="botoes">
            <input type="submit" value="Salvar">
            <input type="reset" value="Resetar">
            <button><a href="livro_index.php">Cancelar</a></button>
        </div>
    </form>
</body>
</html>

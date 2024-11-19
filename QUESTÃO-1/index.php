<?php
    include 'database.php';
    $db = connectDatabase();

    $result = $db->query('SELECT * FROM livros');
        $livros = [];
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $livros[] = $row;
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif, Helvetica;
            background-color: #f4f4f4;
            color: black;
            padding: 20px;
        }
        .content {
            max-width: 500px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
        }
        h1 {
            margin: 10px;
            text-align: center;
            color: #f67828;
        }
        h2 {
            margin: 10px;
        }
        label {
            display: block;
            margin: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #ffa56b;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #f67828;
        }
        ul {
            padding: 0;
        }
        li {
            background: #ddd;
            margin: 10px 0;
            padding: 10px;
            border-radius: 4px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        form[action="delete_book.php"] {
            margin-left: 10px;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Livraria</title>
</head>
<body>
    <div class="content">
        <h1>Livraria</h1>
        <hr>
        <h2>Adicionar Livro</h2>
        <form action="add_book.php" method="post">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" placeholder="Digite o título do livro" required>
            <label for="autor">Autor:</label>
            <input type="text" name="autor" placeholder="Digite o nome do(a) Autor(a)" required>
            <label for="ano_publicacao">Ano:</label>
            <input type="number" name="ano_publicacao" placeholder="Digite o ano de publicação" required>
            <input type="submit" value="Adicionar Livro">
        </form>
        <br>
        <hr>
        <h2>Livros Cadastrados</h2>
        <ul>
            <?php foreach ($livros as $livro): ?>
                <li>
                    <?php echo "{$livro['id']}: {$livro['titulo']} - {$livro['autor']} ({$livro['ano_publicacao']})"; ?>
                    <form action="delete_book.php" method="post" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $livro['id']; ?>">
                        <input type="submit" value="Excluir">
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>
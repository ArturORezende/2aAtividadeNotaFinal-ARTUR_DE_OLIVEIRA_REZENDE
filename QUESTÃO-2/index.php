<?php
    include 'database.php';

    $db = getDatabaseConnection();

    $stmt = $db->query("SELECT * FROM tarefas");
    $tarefas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <title>Sistema de Gerenciamento de Tarefas</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            background-color: #ffee8c;
            font-family: Arial, Helvetica, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
            padding: 20px;
        }
        .content {
            background-color: white;
            padding: 32px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            min-width: 300px;
            max-width: 500px;
        }
        h1, h2 {
            text-align: center;
            margin: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
        }
        input[type="text"],
        input[type="date"],
        button {
            padding: 10px;
            margin-bottom: 10px;
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border-color 0.3s;
        }
        input[type="text"]:focus,
        input[type="date"]:focus {
            border-color: #ccc;
        }
        input[type="date"] {
            cursor: pointer;
        }
        button {
            margin-bottom: 18px;
            background-color: #ffee8c;
            color: black;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #ffcc00;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        form {
            display: inline;
        }
        .tarefas-lista {
            list-style-type: none;
            padding: 0;
        }

        .tarefa-item {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: background-color 0.3s;
        }

        .tarefa-item:hover {
            background-color: #faf3e8;
        }

        .tarefa-concluida {
            background-color: #fcdda7;
            text-decoration: line-through;
        }

        .tarefa-pendente {
            background-color: #fff3cd;
        }
    </style>
    
</head>
<body>
    <div class="content">
        <h1>Gerenciamento de Tarefas</h1>
        <hr>
        <br>

        <form action="add_tarefa.php" method="post">
            <input type="text" name="descricao" placeholder="Descrição da tarefa" required><br>
            <input type="date" name="pendente" required><br>
            <button>Adicionar Tarefa</button>
        </form>
        <hr>
        <h2>Tarefas Pendentes</h2>
        <ul class="tarefas-lista">
            <?php foreach ($tarefas as $tarefa): ?>
                <?php if (!$tarefa['concluido']): ?>
                    <li class="tarefa-item tarefa-pendente">
                        <?= htmlspecialchars($tarefa['descricao']) ?> - <?= htmlspecialchars($tarefa['pendente']) ?>
                        <form action="update_tarefa.php" method="post" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $tarefa['id'] ?>">
                            <button type="submit">Concluir</button>
                        </form>
                        <form action="delete_tarefa.php" method="post" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $tarefa['id'] ?>">
                            <button type="submit">Excluir</button>
                        </form>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>

        <h2>Tarefas Concluídas</h2>
        <ul class="tarefas-lista">
            <?php foreach ($tarefas as $tarefa): ?>
                <?php if ($tarefa['concluido']): ?>
                    <li class="tarefa-item tarefa-concluida">
                        <?= htmlspecialchars($tarefa['descricao']) ?> - <?= htmlspecialchars($tarefa['pendente']) ?>
                        <form action="delete_tarefa.php" method="post" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $tarefa['id'] ?>">
                            <button type="submit">Excluir</button>
                        </form>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>
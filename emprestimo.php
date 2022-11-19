<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registar item</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="index.css" >
</head>
<body>
    <!-- <header class="header" id="header">
        <button class="logout-btn" id="logout-btn">Logout</button>
    </header> -->
    <aside>
        <h2>Ações:</h2>
        <nav>
            <ul>
                <li class=""><a href="principal.php">Itens Cadastrados</a></li>
                <li class=""><a href="cadastro.php">Novo Item</a></li>
                <li class="selected"><a href="emprestimo.php">Novo Empréstimo</a></li>
                <!-- <li class=""><a href="emprestimo">Devolver Item</a></li> -->
                <li class=""><button onclick="logout">Deslogar</button></li>
            </ul>
        </nav>
    </aside>
    <main class="main">
        <!-- <h1>Registrar Item</h1> -->
        <!-- <form action="item.php" method="post">
            <label for="">
                <span>Nome do Item</span>
                <input type="text" name="name" id="name" placeholder="Nome do Item">
            </label>
            <button class="btn btn-invert" type="submit">Cadastrar</button>
        </form> -->
        <table class="borrowed-items-table">
            <thead>
                <tr>
                    <th>
                        Nome
                    </th>
                    <th>
                        Proprietário
                    </th>
                    <th>
                        Data de retorno
                    </th>
                    <th>
                        Ações
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $items = [
                        [
                            "name" => "Bicicleta",
                            "owner" => "João",
                            "return_date" => "10/12/2022",
                        ],
                        [
                            "name" => "Play Station",
                            "owner" => "Luis",
                            "return_date" => "10/12/2022",
                        ]
                    ];
                    foreach ($items as $item) {
                        $name = $item['name'];
                        $owner = $item['owner'];
                        $return_date = $item['return_date'];

                        echo '<tr class="borrowed-item">';
                            echo '<td class="item-name">$name</td>';
                            echo '<td class="owner">$owner</td>';
                            echo '<td class="return-date">$return_date</td>';
                            echo '<td class="actions">';
                                echo '<button class="btn borrow-item">Emprestar</button>';
                            echo '</td>';
                        echo '</tr>';
                    }
                ?>
                <tr class="borrowd-item">
                    <td class="item-name">Bicicleta</td>
                    <td class="borrower-name">João das Neves</td>
                    <td class="return-date">01/01/2023</td>
                    <td class="actions">
                        <button class="btn return-item">Emprestar</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </main>
    
</body>
</html>
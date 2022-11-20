<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css" >
    <link rel="stylesheet" href="principal.css" >
</head>
<body>
    <!-- <header class="header" id="header">
        <button class="logout-btn btn" id="logout-btn">Logout</button>
        
    </header> -->
    <aside>
        <h2>Ações:</h2>
        <nav>
            <ul>
                <li class="selected"><a href="principal.php">Itens Cadastrados</a></li>
                <li class=""><a href="cadastro.php">Novo Item</a></li>
                <li class=""><a href="emprestimo.php">Novo Empréstimo</a></li>
                <!-- <li class=""><a href="emprestimo">Devolver Item</a></li> -->
                <li class=""><a href="logout">Deslogar</a></li>
            </ul>
        </nav>
    </aside>
    <main class="main" id="main">
        <section class="banner">
            <h1>Coisas Emprestadas</h1>
            <h2>Bem vindo {user.name}!</h2>
            <?php
                // const DB_NAME = 'borrower_db';
                // const DB_ADDRESS = 'locahost';
                // const DB_USER = 'root';
                // const DB_PASSWORD = 'root';

                // $con = mysql_connect($DB_ADDRESS, DB_USER, DB_PASSWORD);
                // if (!$con) {
                //     exit('Não foi possível conectar: ' . mysql_error());
                // }
                // if (!mysql_select_db (DB_NAME, $con)) {
                //     exit('Não foi possível selecionar a base de dados: ' . mysql_error());
                // }

                $get_items_query = 'SELECT * FROM ' . DB_NAME .
                'WHERE user.id = ' . ' $user["id"]' . ';';
                // $items = mysql_query($get_items_query, $con);

                $items = query_db($get_items_query);

                $own_items = [
                    [
                        "name" => "Bicicleta",
                        "lending" => false,
                        "lending_time" => 5,
                    ]
                ];

                echo '<p>Você atualmente possuí {items.length} itens cadastrados, dos quais {items.lended.length} estão emprestados.</p>';

                echo '<p>Você também está emprestando {items.lending} itens de outras pessoas.</p>';

                // mysql_close($con);
            ?>
            <p>Você atualmente possuí {items.length} itens cadastrados, dos quais {items.lended.length} estão emprestados.
                Você também está emprestando {items.lending} itens de outras pessoas.</p>
            <!-- <div class="banner-action">
                <h2>Cadastrar novo item</h2>
                <a href="/item.php" class="btn" id="new-item-btn">Novo Item</a>
                <h2>Cadastrar novo empréstimo</h2>
                <a href="/lending.php" class="btn" id="new-item-btn">Novo Empréstimo</a>
            </div> -->
        </section>
        <section class="borrow-items">
            <h2>Items Emprestados</h2>
            <table class="borrowed-items-table">
                <thead>
                    <tr>
                        <th>
                            Nome
                        </th>
                        <th>
                            Destinatário
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
                        $items = array();
                        foreach ($items as $item) {
                            $name = $item['name'];
                            $borrower = $item['borrower'];
                            $return_date = $item['return_date'];

                            echo '<tr class="borrowed-item">';
                                echo '<td class="item-name">$name</td>';
                                echo '<td class="borrower">$borrower</td>';
                                echo '<td class="return-date">$return_date</td>';
                                echo '<td class="actions">';
                                    echo '<button class="btn return-item">Devolver</button>';
                                echo '</td>';
                            echo '</tr>';
                        }
                    ?>
                    <tr class="borrowed-item">
                        <td class="item-name">Bicicleta</td>
                        <td class="borrower">João das Neves</td>
                        <td class="return-date">01/01/2023</td>
                        <td class="actions">
                            <button class="btn return-item">Devolver</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>

    </main>
    
</body>
</html>
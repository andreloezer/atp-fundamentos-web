<?php
    require_once('auth.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css" >
    <link rel="stylesheet" href="index.css" >
</head>
<body>
    <?php 
        require __DIR__ . '/nav.php';
        echo render_navigation('index');
    ?>
    <main class="main" id="main">
        <section class="banner">
            <h1>Coisas Emprestadas</h1>
            <h2>Bem vindo {user.name}!</h2>
            <?php

                // Items user is currently borrowing from someone else
                $get_borrowed_items_query = [
                    "query" => 'SELECT * FROM Items WHERE borrower_id = :user_id',
                    "params" => [
                        "user_id" => $_SESSION["id"],
                    ],
                ];
                $borrowed_items = query_db($get_borrowed_items_query);

                // Items owned by the user
                $get_own_items_query = [
                    "query" => 'SELECT * FROM Items WHERE owner_id = :user_id',
                    "params" => [
                        "user_id" => $_SESSION["id"],
                    ],
                ];
                $own_items = query_db($get_own_items_query);

                // $own_items = [
                //     [
                //         "name" => "Bicicleta",
                //         "lending" => false,
                //         "lending_time" => 5,
                //     ]
                // ];

                echo '<p>Você atualmente possuí '
                    .count($own_items).
                    ' itens cadastrados, dos quais '
                    .count(array_filter($own_items, fn($item) => $item["borrower"], ))
                    .' estão emprestados.</p>';

                echo '<p>Você também está emprestando '.count($borrowed_items).' itens de outras pessoas.</p>';

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
            <form class="hidden" id="return-item" name="return-item" method="POST" action="return_item.php"></form>
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
                        foreach ($borrowed_items as $item) {
                            $name = $item['name'];
                            $owner = $item['owner'];
                            $id = $item['id'];
                            $return_date = $item['return_date'];

                            echo '<tr class="borrowed-item">';
                                echo '<td class="item-name">'.$name.'</td>';
                                echo '<td class="owner">'.$owner.'</td>';
                                echo '<td class="return-date">'.$return_date.'</td>';
                                echo '<td class="actions">';
                                    echo '<button form="return-item" type="button" id='.$id.' name='.$id.' class="btn return-item">Devolver</button>';
                                echo '</td>';
                            echo '</tr>';
                        }
                    ?>
                    <!-- <tr class="borrowed-item">
                        <td class="item-name">Bicicleta</td>
                        <td class="borrower">João das Neves</td>
                        <td class="return-date">01/01/2023</td>
                        <td class="actions">
                            <button class="btn return-item">Devolver</button>
                        </td>
                    </tr> -->
                </tbody>
            </table>
        </section>

    </main>
    
</body>
</html>
<?php
    require_once('auth.php');
    require __DIR__ . '/helpers.php';
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
            
            <?php  
                echo '<h2>Bem vindo '.$_SESSION["name"].'!</h2>';

                $get_items_query = [
                    "query" => 'SELECT * FROM Items WHERE user_id = :user_id',
                    "params" => [
                        "user_id" => $_SESSION["id"],
                    ],
                ];
                $items = query_db($get_items_query)["data"];

                $pending_items = array_filter($items, fn($item) => !$item["return_date"]);
                $returned_items = array_filter($items, fn($item) => $item["return_date"]);
                echo '<p>Você atualmente possuí '
                    .count($pending_items).
                    ' itens emprestados e '
                    .count($returned_items)
                    .' já devolvidos.</p>';
            ?>
        </section>
        <?php
            if (count($pending_items) == 0)
                echo '<p class="no-item">Você não tem nenhum item emprestado no momento.</p>';
            echo '<section class="borrow-items flex'.
            (count($pending_items) == 0 ? ' hidden' : '').'">'
        ?>
            <h2>Items Emprestados</h2>
            
            <form class="" id="return-item" name="return-item" method="POST" action="return_item.php">

            <table class="borrowed-items-table">
                <thead>
                    <tr>
                        <th>
                            Item
                        </th>
                        <th>
                            Data de Empréstimo
                        </th>
                        <th>
                            Previsão de Retorno
                        </th>
                        <th>
                            Comodante
                        </th>
                        <th>
                            Tel Contato
                        </th>
                        <th>
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $today = date("Y-m-d");

                        foreach ($pending_items as $item) {
                            $id = $item['id'];
                            $name = $item['name'];
                            $borrow_date = $item['borrow_date'];
                            $schedule_date = $item['schedule_date'];
                            $borrower_name = $item['borrower_name'];
                            $borrower_tel = $item['borrower_tel'];

                            echo '<tr class="borrowed-item'.
                                ($schedule_date <= $today ? ' overdue' : '').'">';
                                echo '<td class="item-name">'.$name.'</td>';
                                echo '<td class="borrow-date">'.$borrow_date.'</td>';

                                echo '<td class="schedule-date">'.
                                    ($schedule_date ? $schedule_date : 'Indeterminada').
                                    '</td>';
                                echo '<td class="borrower-name">'.$borrower_name.'</td>';
                                echo '<td class="borrower-tel">'.$borrower_tel.'</td>';
                                echo '<td class="actions">';
                                    echo '<input type="hidden" name="item_id" value="'.$id.'">';
                                    echo '<button form="return-item" type="submit" class="btn return-item">Devolver</button>';
                                echo '</td>';
                            echo '</tr>';
                        }
                    ?>
                </tbody>
            </table>
        </section>

    </main>
    
</body>
</html>
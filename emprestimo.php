<?php
    require_once('auth.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registar Empréstimo</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="form.css" >
</head>
<body>
    <?php 
        require __DIR__ . '/nav.php';
        echo render_navigation('emprestimo');
    ?>
    <main class="main">
        <h1>Registrar Empréstimo</h1>
        <form action="borrow.php" method="POST">
            <label for="item_name">
                <span>Item</span>
                <input required type="text" name="item_name" id="item_name" placeholder="Nome do Item">
            </label>
            <label for="borrower_name">
                <span>Comodante</span>
                <input required type="text" name="borrower_name" id="borrower_name" placeholder="Comodante">
            </label>
            <label for="borrower_tel">
                <span>Telefone de Contato</span>
                <input required type="text" name="borrower_tel" id="borrower_tel" placeholder="(99) 9 9999-9999">
            </label>
            <label for="schedule_date">
                <span>Limite de retorno</span>
                <input type="date" name="schedule_date" id="schedule_date">
            </label>
            <button class="btn btn-invert" type="submit">Registrar Empréstimo</button>
        </form>
    </main>
    
</body>
</html>
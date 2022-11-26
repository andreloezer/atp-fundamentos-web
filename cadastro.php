<?php
    require_once('auth.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registar item</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="form.css" >
</head>
<body>
    <?php 
        require __DIR__ . '/nav.php';
        echo render_navigation('cadastro');
    ?>
    <main class="main">
        <h1>Registrar Item</h1>
        <form action="item.php" method="POST">
            <label for="">
                <span>Nome do Item</span>
                <input type="text" name="name" id="name" placeholder="Nome do Item">
            </label>
            <label for="">
                <span>Limite de retorno</span>
                <input type="number" name="time_limit" id="time_limit" placeholder="Dias até devolução">
            </label>
            <button class="btn btn-invert" type="submit">Cadastrar</button>
        </form>
    </main>
    
</body>
</html>
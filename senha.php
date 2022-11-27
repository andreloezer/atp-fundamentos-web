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
    <title>Alterar Senha</title>
    <link rel="stylesheet" href="style.css" >
    <link rel="stylesheet" href="form.css" >
</head>
<body>
    <?php 
        require __DIR__ . '/nav.php';
        echo render_navigation('senha');
    ?>
    <main>
        <h1>Alterar Senha</h1>
        <form action="password.php" method="POST">
            <label for="password">
                <span>Senha Atual</span>
                <input required type="password" placeholder="Senha Atual" name="password" id="password">
            </label>
            <label for="new_password">
                <span>Nova Senha</span>
                <input required type="password" placeholder="Nova Senha" name="new_password" id="new_password">
            </label>
            <div class="flex center">
                <button class="btn btn-invert" type="submit">Salvar</button>
            </div>
        </form>
        <?php
            if (isset($_GET["error"])) {
                echo '<p class="error">Senha atual invalida</p>';
            }
        ?>
    </main>
    
</body>
</html>
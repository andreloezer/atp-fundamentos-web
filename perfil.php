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
    <title>Meu Perfil</title>
    <link rel="stylesheet" href="style.css" >
    <link rel="stylesheet" href="form.css" >
</head>
<body>
    <?php 
        require __DIR__ . '/nav.php';
        echo render_navigation('index');

        $name = $_SESSION["name"];
        $email = $_SESSION["email"];
    ?>
    <main>
        <h1>Meu Perfil</h1>
        <form action="user.php" method="POST">
            <label for="name">
                <span>Nome</span>
                <?php
                    echo '<input required type="text" placeholder="Nome" name="name" id="name" value="'.$name.'">';
                ?>
            </label>
            <label for="email">
                <span>Email</span>
                <?php
                    echo '<input required type="email" placeholder="Email" name="email" id="email" value="'.$email.'">';
                ?>
            </label>
            <div class="flex">
                <button class="btn btn-invert" type="submit">Salvar</button>
            </div>
        </form>
    </main>
</body>
</html>
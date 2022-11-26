<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuário</title>
    <link rel="stylesheet" href="style.css" >
    <link rel="stylesheet" href="form.css" >
</head>
<body>
    <main>
        <h1>Registre-se</h1>
        <form action="register.php" method="post">
            <label for="">
                <span>Nome</span>
                <input type="text" placeholder="Nome" id="name" name="name">
            </label>
            <label>
                <span>E-mail</span>
                <input type="email" placeholder="E-mail" name="email" id="email">
            </label>
            <label>
                <span>Senha</span>
                <input type="password" placeholder="Senha" name="password" id="password">
            </label>
            <button type="submit" class="btn btn-invert">Registrar</button>
        </form>
        <?php
            if (isset($_GET["error"])) {
                echo '<p class="error">Email já resgistrado</p>';
            }
        ?>
    </main>
    
</body>
</html>
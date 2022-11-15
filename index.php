<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autenticação</title>
    <link rel="stylesheet" href="style.css" >
    <link rel="stylesheet" href="index.css" >
</head>
<body>
    <main>
        <h1>Autenticação</h1>
        <form action="login.php" method="post">
            <label>
                <span>Login</span>
                <input type="text" placeholder="Login" name="login" id="login">
            </label>
            <label>
                <span>Senha</span>
                <input type="password" placeholder="Senha" name="password" id="password">
            </label>
            <div class="flex">
                <a href="registrar.php" class="btn btn-invert">Registrar</a>
                <button class="btn btn-invert" type="submit">Entrar</button>
            </div>
        </form>
    </main>
</body>
</html>
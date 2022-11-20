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
                <li class="selected"><a href="cadastro.php">Novo Item</a></li>
                <li class=""><a href="emprestimo.php">Novo Empréstimo</a></li>
                <!-- <li class=""><a href="emprestimo">Devolver Item</a></li> -->
                <li class=""><a href="logout">Deslogar</a></li>
            </ul>
        </nav>
    </aside>
    <main class="main">
        <h1>Registrar Item</h1>
        <form action="item.php" method="post">
            <label for="">
                <span>Nome do Item</span>
                <input type="text" name="name" id="name" placeholder="Nome do Item">
            </label>
            <label for="">
                <span>Limite de retorno</span>
                <input type="number" name="tempo" id="tempo" placeholder="Dias até devolução">
            </label>
            <button class="btn btn-invert" type="submit">Cadastrar</button>
        </form>
    </main>
    
</body>
</html>
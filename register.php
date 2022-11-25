<?php
    require __DIR__ . '/helpers.php';
    // echo "Dados enviados<br>";
    // var_dump($_POST);
    // echo "<br >";
    // echo "Login: " . $_POST["login"];
    // echo "<br >";
    // echo "E-mail: " . $_POST["email"];
    // echo "<br >";
    // echo "Password: " . $_POST["password"];

    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = hash_it($_POST["password"]);

    $register_user_query = [
        "query" => 'INSERT INTO users (name, email, password) VALUES (:name, :email, :password);',
        "params" => [
            "name" => $name,
            "email" => $email,
            "password" => $password,
        ],
    ];

    $id = query_db($register_user_query);

    $user = [
        "name" => $name,
        "email" => $email,
        "id" => $id,
    ];
    $_SESSION["user"] = $user;
    setcookie("user_id", $id, time()+60*60*24);

?>
<?php

    echo "Dados enviados<br>";
    var_dump($_POST);
    echo "<br >";
    echo "Login: " . $_POST["login"];
    echo "<br >";
    echo "Password: " . $_POST["password"];

    const SALT = '123';  // Should be an .env

    $get_user_query = [
        "query" => 'SELECT * FROM Users WHERE login = :user_login',
        "params" => [
            "user_login" => $_POST["login"],
        ],
    ];

    $res = query_db($get_user_query);

    if ($res["password"] == crypt($_POST["password"], SALT))

    $user = [
        "name" => $res["name"],
        "id" => $res["id"],
    ];
    $_SESSION["user"] = $user;
    setcookie("user_id", $res["id"], time()+60*60*24);
?>
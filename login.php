<?php

    // echo "Dados enviados<br>";
    // var_dump($_POST);
    // echo "<br >";
    // echo "Login: " . $_POST["login"];
    // echo "<br >";
    // echo "Password: " . $_POST["password"];

    require __DIR__ . '/helpers.php';

    

    $get_user_query = [
        "query" => 'SELECT * FROM Users WHERE login = :user_login',
        "params" => [
            "user_login" => $_POST["login"],
        ],
    ];

    $res = query_db($get_user_query);
    $data = $res["data"];

    echo var_dump($data);
    echo 'nigger';

    if ($data["password"] == hash_it($_POST["password"]))

    $user = [
        "name" => $data["name"],
        "id" => $data["id"],
    ];
    $_SESSION["user"] = $user;
    setcookie("user_id", $data["id"], time()+60*60*24);
?>
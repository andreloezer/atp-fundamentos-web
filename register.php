<?php
    // echo "Dados enviados<br>";
    // var_dump($_POST);
    // echo "<br >";
    // echo "Login: " . $_POST["login"];
    // echo "<br >";
    // echo "E-mail: " . $_POST["email"];
    // echo "<br >";
    // echo "Password: " . $_POST["password"];

    $register_user_query = [
        "query" => 'INSERT (login, email, password) INTO Users VALUES :login, :email, :password',
        "params" => [
            "login" => $_POST["login"],
            "email" => $_POST["email"],
            "password" => hash_it($_POST["password"]),
        ],
    ];

    $res = query_db($register_user_query);

    $user = [
        "name" => $res["name"],
        "id" => $res["id"],
    ];
    $_SESSION["user"] = $user;
    setcookie("user_id", $res["id"], time()+60*60*24);

?>
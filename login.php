<?php
    echo "Dados enviados<br>";
    var_dump($_POST);
    echo "<br >";
    echo "Login: " . $_POST["login"];
    echo "<br >";
    echo "Password: " . $_POST["password"];

    $res;

    $user = [
        "name" => $res["name"],
        "id" => $res["id"],
    ];
    $_SESSION["user"] = $user;
?>
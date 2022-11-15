<?php
    echo "Dados enviados<br>";
    var_dump($_POST);
    echo "<br >";
    echo "Login: " . $_POST["login"];
    echo "<br >";
    echo "E-mail: " . $_POST["email"];
    echo "<br >";
    echo "Password: " . $_POST["password"];
?>
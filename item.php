<?php
    echo "Dados enviados<br >";
    echo "<br >";
    echo "Nome do Item: " . $_POST["name"];
    echo "<br >";
    echo "Dias até devolução: " . $_POST["tempo"];
    session_start();
?>
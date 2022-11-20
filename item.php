<?php
    // echo "Dados enviados<br >";
    // echo "<br >";
    // echo "Nome do Item: " . $_POST["name"];
    // echo "<br >";
    // echo "Dias até devolução: " . $_POST[""];
    // session_start();

    $add_item_query = [
        "query" => 'INSERT INTO Items (name, time_limit) VALUES (:name, :time_limit);',
        "params" => [
            "name" => $_POST["name"],
            "time_limit" => $_POST["time_limit"],
        ],
    ];

    query_db($add_item_query);
?>
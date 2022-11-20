<?php

    const ITEM_ID = $_POST["borrow-item"];

    $borrow_item_query = [
        "query" => 'UPDATE Items SET borrower_id = :user_id WHERE id = :item_id',
        "params" => [
            "item_id" => ITEM_ID,
            "user_id" => $_SESSION["id"],
        ],
    ];

    query_db($borrow_item_query);
?>
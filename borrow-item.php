<?php

// ADD return_date LOGIC,

    $borrow_item_query = [
        "query" => 'UPDATE Items SET borrower_id = :user_id WHERE id = :item_id',
        "params" => [
            "item_id" => $_POST["borrow-item"],
            "user_id" => $_SESSION["id"],
        ],
    ];

    query_db($borrow_item_query);
?>
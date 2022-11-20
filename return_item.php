<?php

    const ITEM_ID = $_POST["return-item"];

    $return_item_query = [
        "query" => 'UPDATE Items SET borrower_id = null WHERE id = :item_id',
        "params" => [
            "item_id" => ITEM_ID,
        ],
    ];

    query_db($return_item_query);
?>
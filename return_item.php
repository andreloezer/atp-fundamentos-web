<?php
    require __DIR__ . '/helpers.php';
    
    $item_id = $_POST["item_id"];
    $today = date("Y-m-d");

    // Soft delete item
    $return_item_query = [
        "query" => 'UPDATE Items SET return_date = :return_date WHERE id = :item_id;',
        "params" => [
            "return_date" => $today,
            "item_id" => $item_id,
        ],
    ];
    query_db($return_item_query);

    // Redirect to the main page
    redirect('index.php');
?>
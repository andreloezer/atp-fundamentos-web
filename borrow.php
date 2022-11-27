<?php
    require __DIR__ . '/helpers.php';

    // Get form data
    $name = $_POST["item_name"];
    $borrower_name = $_POST["borrower_name"];
    $borrower_tel = $_POST["borrower_tel"];
    $schedule_date = (!empty($_POST["schedule_date"]) ? $_POST["schedule_date"] : NULL);

    session_start();
    $user_id = $_SESSION["id"];
    $today = date("Y-m-d");

    // Register item borrow in DB
    $register_item_borrow_query = [
        "query" => 'INSERT INTO Items '.
            '(name, user_id, borrow_date, schedule_date, borrower_name, borrower_tel) '.
            'VALUES '.
            '(:name, :user_id, :borrow_date, :schedule_date, :borrower_name, :borrower_tel)',
        "params" => [
            "name" => $name,
            "user_id" => $user_id,
            "borrow_date" => $today,
            "schedule_date" => $schedule_date,
            "borrower_name" => $borrower_name,
            "borrower_tel" => $borrower_tel,
        ],
    ];
    $res = query_db($register_item_borrow_query);

    // Redirect to the main page
    redirect('index.php');
?>
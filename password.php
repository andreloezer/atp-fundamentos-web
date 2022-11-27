<?php
    require __DIR__ . '/helpers.php';

    // Get form data
    $password = $_POST["password"];
    $new_password = hash_it($_POST["new_password"]);

    session_start();
    $user_id = $_SESSION["id"];

    // Fetch user password
    $get_password_query = [
        "query" => 'SELECT password FROM Users WHERE id = :user_id;',
        "params" => [
            "user_id" => $user_id,
        ],
    ];
    $res = query_db($get_password_query);
    $user_password = $res["data"][0]["password"];

    // Check if password match
    if (!check_it($password, $user_password)) {
        redirect('senha.php?error');
        return;
    }

    // Update user password in the DB
    $update_password_query = [
        "query" => 'UPDATE Users SET password = :new_password WHERE id = :user_id;',
        "params" => [
            "user_id" => $user_id,
            "new_password" => $new_password,
        ],
    ];
    query_db($update_password_query);
    
    // Redirect to the main page
    redirect('index.php');
?>
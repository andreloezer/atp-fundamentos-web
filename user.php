<?php
    require __DIR__ . '/helpers.php';

    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];

    session_start();
    $user_id = $_SESSION["id"];

    $update_user = [
        "query" => 'UPDATE Users SET name = :name, email = :email WHERE id = :user_id;',
        "params" => [
            "user_id" => $user_id,
            "name" => $name,
            "email" => $email,
        ],
    ];
    query_db($update_user);

    // Update section with new user info 
    $_SESSION["email"] = $email;
    $_SESSION["name"] = $name;

    // Redirect to the main page
    redirect('index.php');
?>
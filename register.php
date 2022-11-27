<?php
    require __DIR__ . '/helpers.php';

    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = hash_it($_POST["password"]);

    // Check if email is already registered and redirect back to the register page
    $check_email_query = [
        "query" => "SELECT * FROM users WHERE email = :email;",
        "params" => [
            "email" => $email,
        ]
    ];
    $res = query_db($check_email_query);
    if (count($res["data"]) == 1)
        redirect('registrar.php?error');

    // Register the new user in the DB
    $register_user_query = [
        "query" => 'INSERT INTO users (name, email, password) VALUES (:name, :email, :password);',
        "params" => [
            "name" => $name,
            "email" => $email,
            "password" => $password,
        ],
    ];
    $res = query_db($register_user_query);
    $id = $res["id"];

    // Start new user session
    session_start();
    $_SESSION["id"] = $id;
    $_SESSION["email"] = $email;
    $_SESSION["name"] = $name;
    setcookie("user_id", $id, time()+60*60*24);

    // Redirect to the main page
    redirect('index.php');
?>
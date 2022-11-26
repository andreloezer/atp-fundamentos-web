<?php
    require __DIR__ . '/helpers.php';

    // Get form data
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    // Fetch user data
    $get_user_query = [
        "query" => 'SELECT * FROM Users WHERE email = :email',
        "params" => [
            "email" => $email,
        ],
    ];
    $res = query_db($get_user_query);
    $data = $res["data"][0];

    // Check if password match
    if (!check_it($password, $data["password"]))
        redirect('entrar.php?error=1');

    // Start user session
    session_start();
    $_SESSION["id"] = $data["id"];
    $_SESSION["email"] = $data["email"];
    $_SESSION["name"] = $data["name"];
    setcookie("user_id", $data["id"], time()+60*60*24);

    // Redirect to the main page
    redirect('index.php');
?>
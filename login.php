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
    if (!check_it($password, $data["password"])) {
        redirect('index.php');
    }

    // Get user data
    $user = [
        "name" => $data["name"],
        "email" => $data["email"],
        "id" => $data["id"],
    ];

    // Start user session
    $_SESSION["user"] = $user;
    setcookie("user_id", $data["id"], time()+60*60*24);

    // Redirect to the main page
    redirect('index.php');
?>
<?php

    const DSN = 'mysql';
    const DB_NAME = 'atp_fundamentos_web';
    const DB_ADDRESS = 'localhost';
    const DB_USER = 'root';
    const DB_PASSWORD = '';
    const HASH_ALGO = PASSWORD_BCRYPT;

    function query_db($query) {
        try {
            $pdo = new PDO (DSN.':host='.DB_ADDRESS.';dbname='.DB_NAME, DB_USER, DB_PASSWORD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $pdo->prepare($query["query"]);
            $stmt->execute($query["params"]);

            $res = [
                "result" => true,
                "id" => $pdo->lastInsertId(),
                "data" => $stmt->fetchAll(),
            ];

            return $res;
        } catch(PDOException $e) {
            echo 'Erro ao conectar: '.$e->getMessage();
        }
    }

    function hash_it($password) {
        return password_hash($password, HASH_ALGO);
    }

    function check_it($password, $hash) {
        return password_verify($password, $hash);
    }

    function logout() {
        session_start();
        $_SESSION = array();
    }

    function redirect($url) {
        header('location: ' . $url);
    }

    function log_arr($arr) {
        echo '<br>';
        foreach ($arr as $value) {
            echo $value;
            echo '<br>';
        }
        echo '<br>';
    }

?>
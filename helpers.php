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
            $stmt = $pdo->prepare($query["query"]);
            foreach($query["params"] as $param => $value) {
                echo $param . ' -> ' . $value . '<br/>';
                // $stmt->bindParam(':'.$param, $value);
            }
            $stmt->execute($query["params"]);

            echo var_dump($stmt);
            echo var_dump($stmt->fetch());
    
            return $stmt->fetch();
        } catch(PDOException $e) {
            echo 'Erro ao conectar: '.$e->getMessage();
        }
    }

    function hash_it($string) {
        return password_hash($string, HASH_ALGO);
    }

    function logout() {
        $_SESSION = array();
    }

?>
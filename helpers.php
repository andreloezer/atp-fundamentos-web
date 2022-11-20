<?php

    const DSN = 'mysql';
    const DB_NAME = 'borrower_db';
    const DB_ADDRESS = 'locahost';
    const DB_USER = 'root';
    const DB_PASSWORD = 'root';

    const SALT = '123';  // Should be an .env

    function query_db($query) {
        try {
            $connection = new PDO (DSN.':host='.DB_ADDRESS.'dbname='.DB_NAME, DB_USER, DB_PASSWORD);
            $data = $connection->prepare($query["query"]);
            foreach($query["params"] as $param => $value) {
                $data->bindParam(':'.$param, $value);
            }
            $data->execute();
    
            return $data->fetch();
        } catch(PDOException $e) {
            echo 'Erro ao conectar: '.$e->getMessage();
        }
    }

    function hash_it($string) {
        return crypt($string, SALT);
    }

    function logout() {
        $_SESSION = array();
    }

?>
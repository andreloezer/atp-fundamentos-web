<?php

    const DB_NAME = 'borrower_db';
    const DB_ADDRESS = 'locahost';
    const DB_USER = 'root';
    const DB_PASSWORD = 'root';

    function query_db($query) {
        $con = mysql_connect($DB_ADDRESS, DB_USER, DB_PASSWORD);
        if (!$con) {
            exit('Não foi possível conectar: ' . mysql_error());
        }
        if (!mysql_select_db (DB_NAME, $con)) {
            exit('Não foi possível selecionar a base de dados: ' . mysql_error());
        }

        $data = mysql_query($query, $con);

        mysql_close($con);

        return $data;
    }

    function sanitize($query) {
        return $query;
    }

    function logout() {
        $_SESSION = array();
    }

?>
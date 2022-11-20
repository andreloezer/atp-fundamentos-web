<?php
    session_start();
    if (isset($_SESSION["user"]) == false)
        header('location: index.php');
?>
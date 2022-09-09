<?php
    $dbHost = 'localhost';
    $dbUser = 'root';
    $dbUserPass = '';
    $dbName = 'database_template';

    $db = mysqli_connect($dbHost, $dbUser, $dbUserPass, $dbName);

    if (!$db)
        exit();
?>
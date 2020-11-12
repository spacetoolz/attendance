<?php

    // DEVELOPMENT CONNECTION////////
    // $host = '127.0.0.1';
    // $db = 'attendance';
    // $user = 'root';// authetication credettials for 
    // $pass = '';
    // $charset = 'utf8mb4';


    // REMOTE SQLDATABASE CONNECTION
    $host = 'remotemysql.com';
    $db = 'ILQ1WvC77t';
    $user = 'ILQ1WvC77t';// authetication credettials for 
    $pass = 'HuvaZA63hz';
    $charset = 'utf8mb4';


    // calls the host to launch ip address, calls the db and the charset
    $dsn ="mysql:host=$host;dbname=$db;charset=$charset"; // interpolation
    
    try{
        $pdo = new PDO($dsn, $user, $pass);
        //echo 'Connection Successful';
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){ 
        throw new PDOException( $e->getMessage());


    };
    
    require_once 'crud.php';

    $crud = new crud($pdo);


    
  


?>
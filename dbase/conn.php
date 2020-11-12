<?php

    $host= '127.0.0.1:3307';
    $dbase= 'attendance_dbase';
    $user= 'root';
    $pass= '';
    $charset= 'utf8mb4';

    $dsn= "mysql:host=$host;dbname=$dbase;charset=$charset";

    try{
        $pdo = new PDO($dsn, $user, $pass);
        echo 'Welcome to my Database';

        $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOexception $e){
        throw new PDOexception($e->getMessage());

    }

    require_once 'dbase/crud.php';
    $crud=new crud($pdo)



?>
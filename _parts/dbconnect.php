<?php
    try{
        $pdo = new PDO(
            'mysql:host=localhost;dbname=mylogin;charset=utf8mb4',
            'root',
            'root',
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]
        );
    } catch (PDOException $e) {
        echo $e->getMessage() . PHP_EOL;
        exit();
    }
?>
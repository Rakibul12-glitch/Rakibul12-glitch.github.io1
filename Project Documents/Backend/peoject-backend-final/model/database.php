<?php
    $dsn = 'mysql:host=localhost;dbname=course_enrolment_management';
    $username = 'root';
    $password = 'pagolmon';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>
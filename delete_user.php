<?php
session_start();

if (!isset($_SESSION['id'], $_SESSION['email'], $_SESSION['role']) && $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit();
}

require_once 'database/connection.php';

$id = (int)$_GET['id'];

if ($id > 0) {
    $query = 'DELETE FROM users WHERE id=:id';
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

header('Location: users.php');


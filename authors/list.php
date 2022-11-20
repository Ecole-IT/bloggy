<?php
require_once "database.php";

function listAuthors() {
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM users;");
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_ASSOC);

    return $results;
}


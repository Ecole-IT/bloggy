<?php
require_once "database.php";

function checkIfAuthorExist($id): bool {
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM users WHERE id = :id;");
    $query->execute([
        "id" => $id
    ]);

    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    if(count($result) == 0 ){
        return false;
    }

    return true;
}


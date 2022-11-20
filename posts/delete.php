<?php
require_once "database.php";

function deletePost($studentID, $id) {
    global $pdo;
    $query = $pdo->prepare("DELETE FROM posts WHERE id = :id AND student_id = :student_id;");
    $query->execute([
        "id" => $id,
        "student_id" => $studentID
    ]);
    $results = $query->fetchAll(PDO::FETCH_ASSOC);

    if(isset($results[0])) {
        return $results[0];
    }

    return null;
}


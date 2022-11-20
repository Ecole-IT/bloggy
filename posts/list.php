<?php
require_once "database.php";

function listPosts($studentID) {
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM posts WHERE student_id = :student_id;");
    $query->execute([
        "student_id" => $studentID
    ]);
    $results = $query->fetchAll(PDO::FETCH_ASSOC);

    return $results;
}


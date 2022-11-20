<?php
require_once "database.php";

function createPost($studentID, $title, $resume, $content, $image_url, $author_id) {
    global $pdo;
    $query = $pdo->prepare("INSERT INTO posts (title, resume, content, image_url, author_id, student_id) VALUES (:title, :resume, :content, :image_url, :author_id, :student_id);");
    $query->execute([
        "student_id" => $studentID,
        "title" => $title,
        "resume" => $resume,
        "content" => $content,
        "image_url" => $image_url,
        "author_id" => $author_id,
    ]);
}


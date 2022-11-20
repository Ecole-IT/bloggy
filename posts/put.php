<?php
require_once "database.php";

function updatePost($studentID, $id, $title, $resume, $content, $image_url, $author_id) {
    global $pdo;
    $query = $pdo->prepare("UPDATE posts SET title = :title, resume = :resume, content = :content, image_url = :image_url, author_id = :author_id WHERE id = :id AND student_id = :student_id;");
    $query->execute([
        "id" => $id,
        "student_id" => $studentID,
        "title" => $title,
        "resume" => $resume,
        "content" => $content,
        "image_url" => $image_url,
        "author_id" => $author_id,
    ]);

    return getPost($studentID, $id);
}


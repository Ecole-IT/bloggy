<?php
require_once "authors/list.php";
require_once "posts/list.php";
require_once "posts/get.php";
require_once "posts/delete.php";
require_once "posts/put.php";
require_once "posts/post.php";
require_once "posts/verify_form.php";

$studentID = explode(".", $_SERVER['HTTP_HOST'])[0];
$json = file_get_contents('php://input');

$data = json_decode($json, true);

switch ($_GET["section"]) {
    case "authors":
        echo json_encode(listAuthors());
        break;
    case "posts":
        $id = $_GET["id"];

        if($id !== "")
        {
            switch ($_SERVER['REQUEST_METHOD']) {
                case "GET":
                    $post = getPost($studentID, $id);
                    if($post === null) {
                        http_response_code(404);
                        return;
                    }

                    echo json_encode(getPost($studentID, $id));
                    break;

                case "DELETE":
                    $post = deletePost($studentID, $id);
                    if($post === null) {
                        http_response_code(404);
                        return;
                    }

                    echo "OK";
                    break;

                case "PUT":
                    $post = getPost($studentID, $id);
                    if($post === null) {
                        http_response_code(404);
                        return;
                    }

                    if(!verify_form($data)) {
                        http_response_code(400);
                        return;
                    }

                    $post = updatePost(
                        $studentID,
                        $id,
                        $data["title"],
                        $data["resume"],
                        $data["content"],
                        $data["image_url"],
                        $data["author_id"],
                    );

                    json_encode($post);
                    break;
            }
            return;
        }

        switch ($_SERVER['REQUEST_METHOD']) {
            case "GET":
                echo json_encode(listPosts($studentID));
                break;
            case "POST":
                if(!verify_form($data)) {
                    http_response_code(400);
                    return;
                }

                createPost($studentID,
                    $data["title"],
                    $data["resume"],
                    $data["content"],
                    $data["image_url"],
                    $data["author_id"]
                );
                break;
        }
}


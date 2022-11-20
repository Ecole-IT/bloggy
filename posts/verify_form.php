<?php

require "../authors/find.php";

function verify_form($form): bool {
    if(!array_key_exists("title", $form) or $form["title"] == "" or strlen($form["title"]) >= 64) {
        echo "invalid title";
        return false;
    }

    if(!array_key_exists("resume", $form) or $form["resume"] === "" or strlen($form["resume"]) >= 256) {
        echo "invalid resume";
        return false;
    }

    if(!array_key_exists("image_url", $form) or $form["image_url"] === "" or strlen($form["image_url"]) >= 2048) {
        echo "invalid image_url";
        return false;
    }

    if(!array_key_exists("content", $form) or $form["content"] === "") {
        echo "invalid content";
        return false;
    }

    if(!array_key_exists("author_id", $form) or $form["author_id"] === "") {
        echo "invalid author_id";
        return false;
    }

    if (!checkIfAuthorExist($form["author_id"])) {
        echo "author '".$form["author_id"]."' does'nt exist";
        return false;
    }


    return true;
}

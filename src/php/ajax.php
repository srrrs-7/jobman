<?php
    $id = (int)$_GET("id");

    try {
        switch($_GET['action']) {
            case "create":
                Todo::create($_GET['text']);
                break;
            case "edit":
                Todo::edit($_GET['text'], $id);
                break;
            case "rearrange":
                Todo::rearrange($_GET['position']);
                break;
            case "delete":
                Todo::delete($_GET['id']);
                break;
        }
    }
    catch(Exception $e) {
        echo $e->getMessage();
        die("0");
    }
    echo "1";
;
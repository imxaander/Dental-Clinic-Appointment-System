<?php
include '../includes/con_db.inc.php';
if($_POST["type"] == ''){
    $timestamp = date("U");
    $message_content = addslashes($_POST["message_content"]);
    $chat_id = $_POST["chat_id"];
    $author_id = $_POST["author_id"];
    $message_id = uniqid("MSG");
    $display_name = $_POST["display_name"];
    $sql = "INSERT INTO chat_app (message_id, chat_id, author_id, message_content, timestamp, display_name) VALUES('$message_id', '$chat_id', '$author_id', '$message_content', '$timestamp', '$display_name')";
    mysqli_query($con, $sql);
}
if($_POST["type"] == 'image'){

    $imageFileName = $_FILES["message_content"]["name"];
    $imageTempName = $_FILES["message_content"]["tmp_name"];
    $folder = "../img/messages/".$imageFileName;

    if(move_uploaded_file($imageTempName, $folder)){
        $timestamp = date("U");
        $message_content = $imageFileName;
        $chat_id = $_POST["chat_id"];
        $author_id = $_POST["author_id"];
        $message_id = uniqid("MSG");
        $display_name = $_POST["display_name"];
        $type = $_POST["type"];
        $sql = "INSERT INTO chat_app (message_id, chat_id, author_id, message_content, timestamp, display_name, type) VALUES('$message_id', '$chat_id', '$author_id', '$message_content', '$timestamp', '$display_name', '$type')";
        mysqli_query($con, $sql);
    }
}


?>

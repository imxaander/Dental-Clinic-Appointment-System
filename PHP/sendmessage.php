<?php
include '../includes/con_db.inc.php';

$timestamp = date("U");
$message_content = addslashes($_POST["message_content"]);
$chat_id = $_POST["chat_id"];
$author_id = $_POST["author_id"];
$message_id = uniqid("MSG");
$display_name = $_POST["display_name"];
$sql = "INSERT INTO chat_app (message_id, chat_id, author_id, message_content, timestamp, display_name) VALUES('$message_id', '$chat_id', '$author_id', '$message_content', '$timestamp', '$display_name')";
mysqli_query($con, $sql);

?>

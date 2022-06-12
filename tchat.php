<?php
require_once('pdo.php');

$chat= 'INSERT INTO  message (name, message) values(:name, :message)';
$statement=$pdo->prepare($chat);
$statement->execute([
    'name' => strip_tags($_POST['name']),
    'message' => strip_tags($_POST['message'])
]);
$_SESSION['name'] = strip_tags($_POST['name']);
header("Location: /");


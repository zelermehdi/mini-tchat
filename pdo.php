<?php 
session_start();

$pdo = new PDO(
    //  on donne le nom de l'hôte, de la base
    'mysql:host=localhost;dbname=mini_tchat;charset=utf8',
    'root',
    ''
);

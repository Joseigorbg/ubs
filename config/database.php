<?php

$pdo = new PDO('mysql:host=localhost;dbname=connectubs', 'root', 'admin');

function db()
{
    global $pdo;
    return $pdo;
}

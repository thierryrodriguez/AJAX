<?php

function get_total_all_records(){
    include 'db.php';
    $statement = $connection->prepare("SELECT * FROM users");
    $statement->excecute();
    $result = $statement->fetchAll();
    return $statement->rowCount();
}
<?php
require_once('Model/PdoManager.php');

function connectBase(){
    $connection = new PdoManager();
    $db = $connection->baseConnection();
    return $db;
}
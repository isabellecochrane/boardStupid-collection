<?php

require_once 'game_function.php';

if (isset($_GET['id'])) {
    $db = getDB();
    deleteGame($db, $_GET['id']);
    header("Location: boardStupid.php");
    exit;
}



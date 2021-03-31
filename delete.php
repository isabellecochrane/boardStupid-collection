<?php

require_once 'game_function.php';
require_once 'bs_update_db.php';



if (isset($_GET['id'])) {
    $db = getDB();
    deleteGame($db, $_GET['id']);
    header("Location: boardStupid.php");
    exit;
}



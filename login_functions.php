<?php
session_start();

require_once 'game_function.php';

if (isset($_POST['username']) &&  isset($_POST['password'])) {
    $db = getDb();

    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = getUser($db, $username);

    if ($user && $password) {

        $_SESSION['username'] = $username;

        header('Location: boardStupid.php');
        exit;
    } else {
        header('Location: log_in.php');
        esit;
    }
}

/**
 * @param $db
 * @param $username
 * @return mixed - returns the first item that matches the query
 */
function getUser($db, $username) {
    $query= $db->prepare('SELECT `username`, `password` FROM `users` WHERE `username` = :username');
    $query->bindParam('username', $username);
    $query->execute();
    $result = $query->fetch();
    return $result;

}
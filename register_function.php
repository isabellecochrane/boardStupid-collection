<?php
session_start();

require_once 'game_function.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $db = getDB();

    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = insertUser($db, $username, $password);
    //if successful new user inserted into db save username in sessino so we know they are logged in
    if($user) {
        $_SESSION['username'] = $username;

        header('Location: boardStupid.php');
        exit;
    } else {
        header('Location: log_in.php');
        exit;
    }
}

/**
 * @param $db
 * @param $username
 * @param $password
 * @return bool
 */
function insertUser($db, $username, $password) {
        $query = $db->prepare('INSERT INTO `users` (`username`, `password`) VALUES (:username, :password);');
        $query->bindParam('username', $username);
        $query->bindParam('password', $password);
        $query->execute();
        return true;
}
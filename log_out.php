<?php
session_start();
if(isset($_POST['username'])) {

    unset($_SESSION['id']);
    unset($_SESSION['name']);
}
header('Location: boardStupid_prelog.php');
exit;
<?php
session_start();
require_once 'game_function.php';

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="normalize.css">
        <link rel="stylesheet" href="boardStupid.css">
    </head>
    <body>
    <h2>Login</h2>
    <form method="post" action="login_functions.php">
        <label>Username:
            <input type="text" name="username">
        </label>
        <label>Password:
            <input type="password" name="password">
        </label>
        <input type="submit"/>
    </form>
    <h2>Don't have an account? Register:</h2>
    <form method="post" actoin="register_function.php">
        <label>Username:
            <input type="text" name="username"/>
        </label>
        <label>Password:
            <input type="password" name="password"/>
        </label>
        <input type="submit"/>
    </form>

    </body>
</html>
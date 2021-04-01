<?php
session_start();
require_once 'delete.php';
require_once 'game_function.php';

if (isset($_SESSION['username'])) {
    // So we redirect them to their account page
    header('Location: boardStupid.php');
    exit;
}
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="normalize.css">
        <link rel="stylesheet" href="boardStupid.css">
        <title>boardStupid</title>
    </head>
    <body>
    <nav>
        <h1>boardStupid</h1>
        <div class="login">
            <a href="log_in.php">Log In</a>
        </div>
    </nav>


    <section>
        <?php
        $db = getDB();
        $result = getBoardStupid($db);
        echo printJustStats($result);
        ?>
    </section>


    </body>
    </html>
<?php

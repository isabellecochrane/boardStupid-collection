<?php
require_once 'delete.php';
require_once 'game_function.php';

if(isset($_SESSION[NULL])) {
    header('Location: boardStupid_prelog.php');
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
        <a href="log_out.php">Log out</a>
    </div>
    </nav>


    <section>
        <?php
        $db = getDB();
        $result = getBoardStupid($db);
        echo printStats($result);
        ?>
        </section>
    <form action="game_function.php" method="post">

        <label>Game:
                <input type="text" name="name"/></label>
        <label>Rating: <input type="text" name="rating"/></label>
        <label>Duration: <input type="text" name="playing_time"/></label>
        <label>Minimum Players: <input type="text" name="min_players"/></label>
        <label>Maximum Players: <input type="text" name="max_players"</label>
        <div class="button"><input type="submit" value="Add Game"/></div>
        </form>
     <?php
        if (isset($_GET['error'])) {
            echo '<p>Please fill in all fields!</p>';
        }
        ?>

    </body>
    </html>
<?php


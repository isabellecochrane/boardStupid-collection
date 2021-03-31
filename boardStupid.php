<?php
require_once 'delete.php';
require_once 'game_function.php';
$db = getDB();
$result = getBoardStupid($db);

echo printStats($result);
?>
<html>
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="boardStupid.css">
        <title>boardStupid</title>
    </head>

    <body>
    <form action="bs_update_db.php" method="post">
        <h2>Add a new game:</h2>
        <div><label>Game:<div><input type="text" name="name"/></label></div></div>
        <div><label>Rating:<div><input type="text" name="rating"/></label></div></div>
        <div><label>Duration:<div><input type="text" name="playing_time"/></label></div></div>
        <div><label>Minimum Players:<div><input type="text" name="min_players"/></label></div></div>
        <div><label>Maximum Players:<div><input type="text" name="max_players"</label></div></div>
        <div><input type="submit" value="Add Game"/></div>
        </form>

    </body>
    </html>
<?php


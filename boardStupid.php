<?php
session_start();

require_once 'game_function.php';
$db = getDB();
$result = getBoardStupid($db);

?>

    <html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="normalize.css">
        <title>boardStupid</title>
    </head>
    <body>
    <form action="bs_update_db.php" method="post">
        <label>Game:<br /> <input type="text" name="name"/></label><br />
        <label>Rating:<br /> <input type="text" name="rating"/></label><br />
        <label>Duration:<br /> <input type="text" name="playing_time"/></label><br />
        <label>Minimum Players:<br /> <input type="text" name="min_players"/></label><br />
        <label>Maximum Players:<br /> <input type="text" name="max_players"</label><br />
            <input type="submit" value="Add Game"/>
        </form>
    <form action="game_function.php" method="delete">
        <label>Name of game you would like to remove:<br/> <input type="text" name="name"/></label>
        <input type="submit" value="Delete"/>
    </form>

    <h1>boardStupid</h1>
    </body>
    </html>
<?php





echo printStats($result);
<?php
session_start();

$db = new PDO('mysql:host=db; dbname=boardStupid', 'root', 'password');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$query = $db->prepare('SELECT *  FROM `boardStupid`;');
$query->execute();
$result = $query->fetchAll();

require_once 'game_function.php'

?>

    <html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="normalize.css">
        <title>boardStupid</title>
    </head>
    <body>
    <form method="post">
        <label>Game:<br /> <input type="text" name="name"/></label><br />
        <label>Rating:<br /> <input type="text" name="rating"/></label><br />
        <label>Duration:<br /> <input type="text" name="playing_time"/></label><br />
        <label>Minimum Players:<br /> <input type="text" name="min_players"/></label><br />
        <label>Maximum Players:<br /> <input type="text" name="max_players"</label><br />
            <input type="submit"/>
        </form>

    <h1>boardStupid</h1>
    </body>
    </html>
<?php



if (isset($result[null])) {
    echo 'There are no games to display';
}

echo printStats($result);
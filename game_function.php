<?php
/**
* @param object $db
* @return array of games
*/
function getDB(): PDO
{
    $db = new PDO('mysql:host=db;dbname=boardStupid', 'root', 'password');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
}

/**
 * @param $db
 * @return mixed
 */
function getBoardStupid(object $db): array
{
    $query = $db->prepare('SELECT *  FROM `boardStupid` WHERE `deleted` = 0;');
    $query->execute();
    $result = $query->fetchAll();
    return $result;
}

/**
* @param array $result
* @return string
* loops through all data from boardStupid db and presents it
*/
function printStats(array $result): string
{
$game_data = '';
if (empty($result)) {
    return 'There are no games to display';
}
foreach ($result as $data) {
        $game_data .= '<div class="game">';
            $game_data .= '<h3>' . $data['name'] . '</h3>';
            $game_data .= '<div class="info">';
                $game_data .= '<div>Rating: ' . $data['rating'] . '/5' . '</div>';
                $game_data .= '<div>Game duration: ' . $data['playing_time'] . ' minutes' . '</div>';
                $game_data .= '<div>Minimum players: ' . $data['min_players'] . '</div>';
                $game_data .= '<div>Maximum players: ' . $data['max_players'] . '</div>';
            $game_data .= '</div>';
            $game_data .= '<a href="delete.php?id=' . $data['id'] . '">Remove</a>';
        $game_data .= '</div>';
}
    return $game_data;

}


if (count($_POST)=== 5)
{
    if (array_search('', $_POST)) {
        header('Location: boardStupid.php?error=Enter all values');
        exit;
    }
    $db = getDB();
    $name = $_POST['name'];
    $rating = $_POST['rating'];
    $playing_time = $_POST['playing_time'];
    $min_players = $_POST['min_players'];
    $max_players = $_POST['max_players'];

    $games = addGame($db, $name, $rating, $playing_time, $min_players, $max_players);
    header("Location: boardStupid.php");
    exit;

}
/**
 * @param object $db
 * @param string $name
 * @param string $rating
 * @param string $playing_time
 * @param string $min_players
 * @param string $max_players
 * @return bool
 */
function addGame(object $db, string $name, string $rating, string $playing_time, string $min_players, string $max_players ) :bool
{
    $query = $db->prepare('INSERT INTO `boardStupid` (`name`, `rating`, `playing_time`, `min_players`, `max_players`) VALUES (:name, :rating, :playing_time, :min_players, :max_players);');
    $query->execute(['name'=>$name, 'rating'=>$rating, 'playing_time'=>$playing_time, 'min_players'=>$min_players, 'max_players'=>$max_players]);
    return true;
}
/**
 * @param $db
 * @return bool
 */
function deleteGame(PDO $db) :bool
{
    $query = $db->prepare('UPDATE `boardStupid` SET `deleted`  = 1 WHERE `id` = :id');
    $query->bindParam('id', $_GET['id']);
    $query->execute();
    return true;
}


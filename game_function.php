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
            $game_data .= '<h3>Game: ' . $data['name'] . '</h3>';
            $game_data .= '<div class="info">';
                $game_data .= '<div>Rating: ' . $data['rating'] . '/5' . '</div>';
                $game_data .= '<div>game duration: ' . $data['playing_time'] . ' minutes' . '</div>';
                $game_data .= '<div>minimum players: ' . $data['min_players'] . '</div>';
                $game_data .= '<div>maximum players: ' . $data['max_players'] . '</div>';
            $game_data .= '</div>';
            $game_data .= '<a href="delete.php?id=' . $data['id'] . '">delete</a>';
        $game_data .= '</div>';
}
    return $game_data;
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


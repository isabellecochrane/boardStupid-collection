<?php

require_once 'game_function.php';

if (count($_POST)=== 5)
{

    $db = getDB();
    $name = $_POST['name'];
    $rating = $_POST['rating'];
    $playing_time = $_POST['playing_time'];
    $min_players = $_POST['min_players'];
    $max_players = $_POST['max_players'];

    $games = addGame($db, $name, $rating, $playing_time, $min_players, $max_players);

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


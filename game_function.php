
<?php


/**
 * @param array $result
 * @return string
 * loops through all data from boardStupid db and presents it
 */
function printStats(array $result): string
{

    $game_data = '';
if (empty($result)){
    return 'There are no games to display';
} else {
    foreach ($result as $data) {
        $game_data .='<div class="game">';
            $game_data .= '<h3>Game: ' . $data['name'] . '</h3>';
            $game_data .='<div class="info">';
                $game_data .= '<div>Rating: ' . $data['rating'] . '/5' . '</div>';
                $game_data .= '<div>game duration: ' . $data['playing_time'] . ' minutes' . '</div>';
                $game_data .= '<div>minimum players: ' . $data['min_players'] . '</div>';
                $game_data .= '<div>maximum players: ' . $data['max_players'] . '</div>';
            $game_data .='</div>';
        $game_data .='</div>';
    }

    return $game_data;
}
}




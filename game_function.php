
<?php

function printStats(array $result): string
{

    $game_data = '';

    foreach ($result as $data) {
        '<div class="game">';
        $game_data .= '<h3>Game: ' . $data['name'] . '</h3>';
        '<div class="info">';
        $game_data .= '<span>Rating: ' . $data['rating'] . '/5' . '</span><br />';
        $game_data .= '<span>game duration: ' . $data['playing_time'] . ' minutes' . '</span><br />';
        $game_data .= '<span>minimum players: ' . $data['min_players'] . '</span><br />';
        $game_data .= '<span>maximum players: ' . $data['max_players'] . '</span><br />';
        '</div>';
        '</div>';
    }

    return $game_data;
}



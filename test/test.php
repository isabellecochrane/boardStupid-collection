<?php
use PHPUnit\Framework\TestCase;


require_once '../game_function.php';


class Test extends Testcase {
    public function testPrintStats_success1()
    {
        $practice_array = [[
            'name' => 'boardgame',
            'rating' => '5',
            'playing_time' => '30',
            'min_players' => '2',
            'max_players' => '3'
        ]];
        $result = printStats($practice_array);
        $expected = '<h3>Game: boardgame' . '</h3>' . '<span>Rating: 5' . '/5'. '</span><br />' . '<span>game duration: 30 minutes' . '</span><br />'
        . '<span>minimum players: 2' . '</span><br />' . '<span>maximum players: 3' . '</span><br />';

        $this->assertEquals($result, $expected);
    }
}
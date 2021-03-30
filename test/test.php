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
        $expected = '<div class="game">' . '<h3>Game: boardgame</h3>' . '<div class="info">'  . '<div>Rating: 5' . '/5'. '</div>' . '<div>game duration: 30 minutes' . '</div>'
        . '<div>minimum players: 2' . '</div>' . '<div>maximum players: 3' . '</div>' . '</div>' . '</div>';

        $this->assertEquals($result, $expected);
    }

    public function testPrintStats_success2(){
        $empty_array = [];
        $result = printStats($empty_array);
        $expected = 'There are no games to display';
        $this->assertEquals($result, $expected);
    }

    public function testPrintStats_malformed1()
    {
        $this->expectException(TypeError::class);
        printStats('this isa  string');
    }
}
<?php

use PHPUnit\Framework\TestCase;

/*
* Running just 3 simple tests to demonstrate the concept. 
*/
class GameTest extends TestCase {
    public function testReturnsIfNumberWasSet() {
        require_once 'Game.php';
        $game = new Game();

        $this->assertEquals(true, $game->setNumber(3));
    }
    public function testNumberIsOutOfRange() {
        require_once 'Game.php';
        $game = new Game();

        $this->assertEquals(false, $game->setNumber(1002));
    }

    /*
    * I prefer to run 1 assertion per test, 
    * but this time it was more convenient to run multiple tests
    */
    public function testReturnsResponseToDisplay() {
        require_once 'Game.php';

        $words = array('test', 'book', 'apple', 'car', 'office');
        $game = new Game($words);
        
        $result = array (
            'test',
            'test book apple car office',
            'test book apple car office',
            'book car',
            'test book apple car office',
            'book apple',
            'test book apple car office',
            'book car',
            'apple',
            'book office',
            'test book apple car office',
            'book apple car',
            'test book apple car office',
            'book',
            'apple office',
        );

        for($i = 1; $i < 16; $i++) {
            $game->setNumber($i);

            $this->assertEquals($result[$i - 1], $game->getResponseToDisplay());
        }
    }
}
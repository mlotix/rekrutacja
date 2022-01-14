<?php

require_once('Game.php');

$game = new Game;

//casting type, when entering string, value is 0, so it's out of range and invalid
$number = (int)readline('Enter your number: ');

if(!$game->setNumber($number)) {
    if($game->getInvalid() >= 3) {
        echo 'The game has ended\n';

        //logika końca gry
    } else {
        $game->increaseInvalid();
        echo 'Value is invalid\n';

    }
} else {
    echo $game->getNumber() . " <--- twoj poprawny numer";
}
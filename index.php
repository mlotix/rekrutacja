<?php

require_once('Game.php');


function addWords() {

    do {
        $input = readline('Enter 1-10 words to start the game: ');

        if(!empty($input))
            $words = explode(" ", $input);
    } while (empty($input) || sizeof($words) > 10);

    return $words;

}

/*
* Currently not used. Allows to add words to the game one by one. 
*/
function addWordsSeparately() {
    $i = 0;

    do {
        $input = readline('Enter the next word or hit enter to start the game: ');
        if(!empty($input)) {
            array_push($words, $input);
            $i++;
        } else if ($i < 1)
            echo "You have to add at least one word to start the game.\n";
    } while( $i < 1 || ( $i < 10 &&  !empty($input) ) );

    return $words;
}
function readNumber() {
    return (int)readline('Enter your number: ');
}

function startGame() {
    $words = addWords();
    $game = new Game($words);


    do {
        $number = readNumber();

        if(!$game->setNumber($number)) {
            $game->increaseInvalid();
            echo "Number is invalid \n";
        } else {
            $game->setInvalid(0);
            echo $game->getResponseToDisplay() . "\n";
        }

    } while( $game->getInvalid() < 3 );

    echo "The game has ended\n";

}

startGame();


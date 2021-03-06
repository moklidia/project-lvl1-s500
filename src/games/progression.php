<?php

namespace BrainGames\games\progression;

use function BrainGames\flow\playGame;

const TASK = 'What number is missing in the progression?';
const PROGRESSION_LENGTH = 10;

function playProgression()
{
    $generateGameData = function () {
        $progression = [];
        $start = rand(1, 100);
        $step = rand(1, 10);
        for ($i = 1; $i < PROGRESSION_LENGTH; $i++) {
            $progression[] = $start + $i * $step;
        }
        $missingKey = array_rand($progression);
        $correctAnswer = $progression[$missingKey];
        $progression[$missingKey] = '..';
        $question = implode(' ', $progression);
        return [$question, $correctAnswer];
    };
    return playGame(TASK, $generateGameData);
}

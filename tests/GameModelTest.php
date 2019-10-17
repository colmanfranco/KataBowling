<?php

use PHPUnit\Framework\TestCase;
use App\Model\Game;
use App\Model\Round;

class GameModelTest extends TestCase
{
    public function testIfFunctionGetTotalScoreReturnsNumber()
    {
        $game = new Game();
        $round = new Round();
        $roundScore = $round->getRoundScore();
        $total = $game->getTotalScore($roundScore);

        $this->assertIsNumeric($total);
    }

}
<?php

use PHPUnit\Framework\TestCase;
use App\Model\Round;

class RoundModelTest extends TestCase
{
    public function testIfFunctionRandomNumberReturnsNumberBetween1and10()
    {
        $maxPin = range(0,10);
        $game = new Round();
        $randomNumber = $game->randomNumber();
        $this->assertContains($randomNumber, $maxPin);
    }

    public function testIfFunctionRandomNumberReturnsNumberBetween10MinusPreviousNumber()
    {
        $game = new Round();
        $randomNumber1 = $game->randomNumber();
        $remainingPins = range(0,(10-$randomNumber1));
        $randomNumber2 = $game->randomNumber();

        $this->assertContains($randomNumber2, $remainingPins);

    }

    public function testIfFunctionGetRoundScoreReturnsArray()
    {
        $round = new Round();
        $randomNumber1 = $round->randomNumber();
        $remainingPins = range(0,(10-$randomNumber1));
        $randomNumber2 = $round->randomNumber();
        $array = $round->getRoundScore();

        $this->assertIsArray($array );
    }
}
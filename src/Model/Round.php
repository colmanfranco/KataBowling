<?php

namespace App\Model;

class Round implements \SplObserver
{
    public $secondShot = false;
    private $firstRandomPin;
    private $secondRandomPin;
    protected $roundScore = [];

    public function update(\SplSubject $subject, $event = '')
    {

    }

    function randomNumber()
    {
        $totalPins = range(0,10);
        $select="1";
        
        if($this->secondShot)
        {
            $remainingPins = range(0,(10-$this->firstRandomPin));
            $this->secondRandomPin = array_rand($remainingPins, $select);
            $this->secondShot = false;

            return $this->secondRandomPin;
        }

        $this->firstRandomPin=array_rand($totalPins, $select);
        $this->secondShot = true;
        return $this->firstRandomPin;
    }

    public function getRoundScore()
    {
        if (!$this->secondShot)
        {
            return $this->roundScore;
        }

        for ($i=1; $i <= $this->rounds; $i++)
        {
            $this->roundScore[$i] = $this->firstRandomPin + $this->secondRandomPin;
        }
        
        return $this->roundScore;

    }
}
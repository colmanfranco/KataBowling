<?php

namespace App\Model;

class Game implements \SplSubject /*Empezamos importando la interfaz del sujeto*/
{
    private $totalScore = 0;
    private $rounds = 10;
    protected $storage;
 
    public function __construct(\SplObjectStorage $storage)
    {
        $storage = new \SplObjectStorage;
        $this->storage = $storage;
    }

    public function notifiesEndOfRound()
    {
        $this->notify();
    }
 
    public function setNextTurn()
    {
        $this->notify();
    }
 
    public function attach(\SplObserver $observer)
    {
        $this->storage->attach($observer);
    }
 
    public function detach(\SplObserver $observer)
    {
        $this->storage->detach($observer);
    }
 
    public function notify()
    {
        foreach ($this->storage as $observer)
            $observer->update($this);
    }

    public function getTotalScore($roundScore)
    {
        for ($i=1; $i <= $this->rounds; $i++) 
        {
            if ($i==1) 
            {
                $this->totalScore = $roundScore[$i];
                continue;
            }
            
            $this->totalScore = $roundScore[$i] + $roundScore[$i-1];
        }
        return $this->totalScore;
    }
}

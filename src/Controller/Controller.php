<?php

namespace App\Controller;
use App\Model\Game;
use App\Model\User;
// require '../Model/Game.php';


class Controller
{
    private $playingUsers;

    public function getUsersList()
    {
        $user = new User();
        $userList = $user->getAllUsers();
        return $userList;
    }

    public function setPlayingUsers($id)
    {
        $user = new User();
        $user->changeUserStatus($id);
    }

    public function getPlayingUsers()
    {
        $user = new User();
        $this->playingUsers = $user->selectPlayingUsers();

        return $this->playingUsers;
    }

    public function getRandomPinNumber()
    {
        $game = new Game();
        $rounds = 10;

        for ($i=1; $i <= $rounds; $i++) {
            
            if ($game->secondShot)
            {
                echo ("Realizar segundo tiro");
            }
        }
            
            $randomPin = $game->randomNumber();
            

        $this->view();
        return $randomPin;
    }

    function view()
    {
        header('Location:../View/main.php');
    }


}

if($_SERVER['REQUEST_METHOD'] == "GET" and isset($_GET['Lanzar']))
    {
        $pinNumber = new Controller();
        $pinNumber->getRandomPinNumber();

    };
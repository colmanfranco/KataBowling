<?php

namespace App\Model;

use App\Repository\IRepository;
use App\Repository\UserRepo;

class User 
{
    public $userName;
    public $userId;
    public $state;
    private $usersPlaying;

    public function __construct()
    {
    }

    public function getId()
    {
        return $this->userId;
    }

    public function getName()
    {
        return $this->userName;
    }

    public function getAllUsers()
    {
        $userRepo = new UserRepo();
        $allUsersArray = $userRepo->selectAllUsers();
        return $allUsersArray;
    }

    public function changeUserStatus($id)
    {
        $userRepo = new UserRepo();
        $updatedStatus = $userRepo->updateStateById($id);
        if ($updatedStatus)
        {
            return true;
        }
        return false;
    }

    public function selectPlayingUsers()
    {
        $userRepo = new UserRepo();
        $this->usersPlaying = $userRepo->selectUserPlaying();
        return $this->usersPlaying;
    }

    public function resetAllUsers()
    {
        $userRepo = new UserRepo();
        $allReseted = $userRepo->updateAllUsers();

        return $allReseted;
    }

    public function assignScoreToPlayer()
    {
        $players = $this->playingUsers;

        foreach ($players as $player) 
        {
            # code...
        }
    }

}
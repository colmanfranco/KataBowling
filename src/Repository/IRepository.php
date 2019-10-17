<?php
namespace App\Repository;

interface IRepository
{
    public function connectDB();

    public function selectAllUsers();
    
    public function updateStateById($id);

    public function updateAllUsers();
}
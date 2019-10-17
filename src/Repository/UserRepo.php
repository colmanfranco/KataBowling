<?php
namespace App\Repository;

class UserRepo implements IRepository
{
    private $table = 'users';
    private $conexion;
    private $server = "localhost";
    private $user = "root";
    private $password = "";
    private $db = "kata_bowling_db";

    public function connectDB()
    {
        try 
        {
            $this->conexion = mysqli_connect($this->server, $this->user, $this->password);
            $dbSelected = mysqli_select_db($this->conexion, $this->db);

            return $this->conexion;
        }

        catch (Exception $e) 
        {
            echo 'Connection failed: ' . $e->getMessage();
            exit;
        }
    }

    public function selectAllUsers()
    {
        $this->connectDB();
        $conn = $this->conexion;
        $query = 'SELECT * FROM '.$this->table.'';
        $respuestas = mysqli_query($conn, $query);

        $usersArray = array();
        while ($row = mysqli_fetch_array( $respuestas ))
        {
            $usersArray[] = array 
            (
            "id" => $row['id_user'],
            "userName" => $row['user_name'],
            "state"=> $row['playing']
        );
        }
        return $usersArray;
    }
    
    public function updateStateById($id)
    {
        $this->connectDB();
        $conn=$this->conexion;
        $query='UPDATE '.$this->table.' SET playing=1 WHERE id_user='.$id.'';
        $updatedId = mysqli_query($conn, $query);
        
        return $updatedId;

    }

    public function selectUserPlaying()
    {
        $this->connectDB();
        $conn = $this->conexion;
        $query = 'SELECT * FROM '.$this->table.' WHERE id_user=1';
        $respuestas = mysqli_query($conn, $query);

        $userPlaying = array();
        while ($row = mysqli_fetch_array( $respuestas ))
        {
            $userPlaying[] = array 
            (
            "id" => $row['id_user'],
            "userName" => $row['user_name'],
            "state"=> $row['playing']
        );
        }
        return $userPlaying;
    }

    public function updateAllUsers()
    {
        $this->connectDB();
        $conn=$this->conexion;
        $query='UPDATE '.$this->table.' SET playing=0';
        $allUsersUpdated = mysqli_query($conn, $query);
        return $allUsersUpdated;
    }
}
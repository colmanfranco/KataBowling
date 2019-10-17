<?php
namespace App\View;
use App\Controller\Controller; 

require "../../vendor/autoload.php";

$init = new Controller();
$players = $init->getUsersList();
$i=1;
$stateStyle = '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kata Bowling</title>
</head>
<body>
    <div>
        <h1>Bowling Game</h1>
    </div>
    <div>
        <h3>Select 1 Players and then press Add Player</h3>
        <form action="main.php" method="POST" accept-charset="UTF-8">
            
            <?php
            foreach ($players as $player) 
            {
                $tag = '<input type="checkbox" name="player" value=' . $player['id'] . '>'; 
                echo $tag . ($player['userName'] ) . '</input>' . '<br>';
            } 
            ?>
            <input type="submit" value="Begin">
            <button type="submit" formaction="changeStatus.php">Add Player</button>
        </form>
        
    </div>

</body>
</html>
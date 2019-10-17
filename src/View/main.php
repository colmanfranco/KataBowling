<?php
namespace App\View;
use App\Controller\Controller; 
require "../../vendor/autoload.php";

$init = new Controller();
$usersPlaying = $init->setPlayingUsers();
// $pinNumber = $init->getRandomPinNumber();
$i=1;
$stateStyle = '';
?>

<div>
        <h2><?php echo $usersPlaying ;
        // echo $pinNumber;
         ?></h2>
        
        <form action="../Controller/Controller.php" method="get">
            <input type="submit" name="Lanzar" value="GO" />
        </form>
    </div>
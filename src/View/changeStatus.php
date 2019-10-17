<?php

use App\Controller\Controller;
use phpDocumentor\Reflection\Location;
require "../../vendor/autoload.php";


$changeStatus = new Controller();
$playingUserId = $_POST['player'];
$changeStatus->setPlayingUsers($playingUserId);

header('Location: index.php');
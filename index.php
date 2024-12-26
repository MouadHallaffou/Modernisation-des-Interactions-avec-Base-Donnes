<?php
require_once 'Database.php';
require_once 'Player.php';

$player = new Player();

$name = "Lionel Messi";
$photo = "messi.jpg"; 
$position = "RW";
$rating = 94;
$pace = 85;
$shooting = 92;
$passing = 91;
$dribbling = 96;
$defending = 38;
$physical = 65;

$player->insertPlayer($name, $photo, $position, $rating, $pace, $shooting, $passing, $dribbling, $defending, $physical);

$db = new Database();
$conn = $db->connect();

$player = new Player($conn);

$players = $player->getPlayers();

var_dump($players);

?>

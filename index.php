<?php
require_once __DIR__.'/./config/Database.php';
require_once __DIR__.'/./includes/Player.php';

$db = new Database();
$pdo = $db->connect();

$player = new Player($pdo);

// $newPlayer = [
//     'name_player' => 'Mouad Hallaffou',
//     'photo' => 'Mouad.jpg',
//     'position' => 'ST',
//     'rating' => 94,
//     'pace' => 91,
//     'shooting' => 93,
//     'passing' => 82,
//     'dribbling' => 88,
//     'defending' => 35,
//     'physical' => 77
// ];
// $player->create($newPlayer);


$allPlayers = $player->read();
print_r($allPlayers);



// $updateData = [
//     'name_player' => 'Lionel Messi',
//     'photo' => 'messi.jpg',
//     'position' => 'RW',
//     'rating' => 93,
//     'pace' => 85,
//     'shooting' => 92,
//     'passing' => 91,
//     'dribbling' => 95,
//     'defending' => 35,
//     'physical' => 70
// ];
// $player->update(23, $updateData);


$player->delete(22);

?>

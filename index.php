<?php
require_once __DIR__ . '/config/Database.php';
require_once __DIR__ . '/includes/Player.php';

$db = new Database();
$pdo = $db->connect();

$player = new Player($pdo);

$data = [
    'name_player' => 'mouad',
    'photo' => 'image.jpg',
    'position' => 'ST',
    'rating' => 85,
    'pace' => 90,
    'shooting' => 85,
    'passing' => 80,
    'dribbling' => 87,
    'defending' => 40,
    'physical' => 75
];

$player->createPlayer($data);

$playerDetails = $player->getPlayer();

if ($playerDetails) {
    echo "<table border='1'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Photo</th>
                    <th>Position</th>
                    <th>Rating</th>
                    <th>Pace</th>
                    <th>Shooting</th>
                    <th>Passing</th>
                    <th>Dribbling</th>
                    <th>Defending</th>
                    <th>Physical</th>
                </tr>
            </thead>
            <tbody>";

    foreach ($playerDetails as $player) {
        echo "<tr>
                <td>{$player['player_id']}</td>
                <td>{$player['name_player']}</td>
                <td>{$player['photo']}</td>
                <td>{$player['position']}</td>
                <td>{$player['rating']}</td>
                <td>{$player['pace']}</td>
                <td>{$player['shooting']}</td>
                <td>{$player['passing']}</td>
                <td>{$player['dribbling']}</td>
                <td>{$player['defending']}</td>
                <td>{$player['physical']}</td>
            </tr>";
    }

    echo "</tbody></table>";
} else {
    echo "Aucun joueur trouvé.";
}

$updateData = ['rating' => 99, 'pace' => 99];
$player->updatePlayer(30, $updateData);

$player->deletePlayer(29);

?>

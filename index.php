<?php
require_once __DIR__ . '/config/Database.php';
require_once __DIR__ . '/includes/Player.php';

$db = new Database();
$pdo = $db->connect();

$player = new Player($pdo);

$insertData = [
    'name_player' => 'Mouad',
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
$playerId = $player->insertEntry('Players', $insertData);

$updateData = ['rating' => 99, 'pace' => 95];
$rowsUpdated = $player->updateEntry('Players', $updateData, 'player_id', $playerId);

$players = $player->selectEntries('Players', '*', 'rating > ?', [90]);

if (!empty($players)) {
    echo "<table border='1' style='border-collapse: collapse; width: 50%; text-align: center;'>";
    echo "<thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Photo</th>
                <th>Position</th>
                <th>Note</th>
                <th>Vitesse</th>
                <th>Tir</th>
                <th>Passe</th>
                <th>Dribble</th>
                <th>Défense</th>
                <th>Physique</th>
            </tr>
          </thead>";
    echo "<tbody>";

    foreach ($players as $p) {
        echo "<tr>
                <td>{$p['player_id']}</td>
                <td>{$p['name_player']}</td>
                <td><img src='{$p['photo']}' alt='mouad'></td>
                <td>{$p['position']}</td>
                <td>{$p['rating']}</td>
                <td>{$p['pace']}</td>
                <td>{$p['shooting']}</td>
                <td>{$p['passing']}</td>
                <td>{$p['dribbling']}</td>
                <td>{$p['defending']}</td>
                <td>{$p['physical']}</td>
              </tr>";
    }

    echo "</tbody></table>";
}

$rowsDeleted = $player->deleteEntry('Players', 'player_id', 57);

?>

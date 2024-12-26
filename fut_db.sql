DROP DATABASE IF EXISTS fut_db;
CREATE DATABASE fut_db;
USE fut_db;

CREATE TABLE Players (
    player_id INT AUTO_INCREMENT PRIMARY KEY,
    name_player VARCHAR(255) NOT NULL,
    photo VARCHAR(255),
    position ENUM('GK', 'CBR', 'CBL', 'LB', 'RB', 'CML', 'CM', 'CMR', 'LW', 'RW', 'ST') NOT NULL,
    rating FLOAT NOT NULL CHECK (rating BETWEEN 10 AND 99),
    pace INT NOT NULL,
    shooting INT NOT NULL,
    passing INT NOT NULL,
    dribbling INT NOT NULL,
    defending INT NOT NULL,
    physical INT NOT NULL,
    CHECK (pace BETWEEN 10 AND 99),
    CHECK (shooting BETWEEN 10 AND 99),
    CHECK (passing BETWEEN 10 AND 99),
    CHECK (dribbling BETWEEN 10 AND 99),
    CHECK (defending BETWEEN 10 AND 99),
    CHECK (physical BETWEEN 10 AND 99)
);


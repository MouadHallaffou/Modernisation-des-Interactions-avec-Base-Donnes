<?php
/**
 * Class Player
 * 
 * This class provides methods to interact with a database using PDO.
 * It supports basic CRUD operations: Create, Read, Update, and Delete.
 */
class Player {
    /**
     * @var PDO $pdo PDO instance for database connection.
     */
    private $pdo;

    /**
     * Constructor to initialize the Player class with a PDO instance.
     * 
     * @param PDO $pdo The PDO connection instance.
     */
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    /**
     * Inserts a new entry into a table.
     * 
     * @param string $table The name of the table.
     * @param array $data An associative array where keys are column names and values are the corresponding values.
     * @return int The ID of the newly inserted entry.
     */
    public function insertEntry($table, $data) {
        $columns = implode(',', array_keys($data)); // Convert array keys into a comma-separated string
        $placeholders = implode(',', array_fill(0, count($data), '?')); // Create placeholders for prepared statement
        $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array_values($data)); // Bind and execute the statement with data values

        return $this->pdo->lastInsertId(); // Return the ID of the inserted entry
    }

    /**
     * Updates an entry in a table.
     * 
     * @param string $table The name of the table.
     * @param array $data An associative array of column-value pairs to update.
     * @param string $idColumn The name of the column to identify the entry (e.g., primary key).
     * @param mixed $idValue The value of the identifier column.
     * @return int The number of rows updated.
     */
    public function updateEntry($table, $data, $idColumn, $idValue) {
        // Generate "column = ?" pairs for the SET clause
        $setClause = implode(', ', array_map(fn($col) => "$col = ?", array_keys($data)));
        $sql = "UPDATE $table SET $setClause WHERE $idColumn = ?";

        $stmt = $this->pdo->prepare($sql);
        // Bind and execute the statement with data values and identifier value
        $stmt->execute([...array_values($data), $idValue]);

        return $stmt->rowCount(); // Return the number of affected rows
    }

    /**
     * Deletes an entry from a table.
     * 
     * @param string $table The name of the table.
     * @param string $idColumn The name of the column to identify the entry.
     * @param mixed $idValue The value of the identifier column.
     * @return int The number of rows deleted.
     */
    public function deleteEntry($table, $idColumn, $idValue) {
        $sql = "DELETE FROM $table WHERE $idColumn = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$idValue]); // Execute the statement with the identifier value

        return $stmt->rowCount(); // Return the number of affected rows
    }

    /**
     * Selects entries from a table with optional conditions.
     * 
     * @param string $table The name of the table.
     * @param string $columns The columns to retrieve (default: "*").
     * @param string|null $where Optional WHERE clause conditions (without the "WHERE" keyword).
     * @param array $params Optional parameters to bind to the WHERE clause.
     * @return array The fetched entries as an associative array.
     */
    public function selectEntries($table, $columns = "*", $where = null, $params = []) {
        $sql = "SELECT $columns FROM $table";
        if ($where) {
            $sql .= " WHERE $where"; // Add WHERE clause if provided
        }

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params); // Execute the statement with bound parameters

        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch and return all entries as an associative array
    }
}
?>

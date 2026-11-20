<?php
// Connects to the database and runs prepared queries.
class Database
{
    private $conn;

    // Connects to the lectern database.
    public function __construct()
    {
        // Errors become exceptions so a page can show a message.
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        // utf8mb4 keeps Greek letters correct.
        $this->conn->set_charset('utf8mb4');
    }

    // Runs a SELECT and returns every row.
    public function select($sql, $params)
    {
        $stmt = $this->run($sql, $params);
        $result = $stmt->get_result();
        $rows = [];
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        $stmt->close();
        return $rows;
    }

    // Runs a query that changes data and returns the new id.
    public function execute($sql, $params)
    {
        $stmt = $this->run($sql, $params);
        $id = $stmt->insert_id;
        $stmt->close();
        return $id;
    }

    // The values are sent apart from the SQL. This blocks SQL injection.
    private function run($sql, $params)
    {
        $stmt = $this->conn->prepare($sql);
        // Every value is bound as a string. MySQL converts it to the column type.
        $stmt->bind_param(str_repeat('s', count($params)), ...$params);
        $stmt->execute();
        return $stmt;
    }
}

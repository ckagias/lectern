<?php
/** Opens the database connection and runs prepared queries. */
class Database
{
    private $conn;

    /** Connects to the lectern database and throws an Exception if that fails. */
    public function __construct()
    {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $this->conn->set_charset('utf8mb4');
    }

    /** Runs a SELECT and returns all rows as an array. */
    public function select($sql, $types = '', $params = [])
    {
        $stmt = $this->run($sql, $types, $params);
        $result = $stmt->get_result();
        $rows = [];
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        $stmt->close();
        return $rows;
    }

    /** Runs an INSERT, UPDATE or DELETE and returns the id of the new row. */
    public function execute($sql, $types = '', $params = [])
    {
        $stmt = $this->run($sql, $types, $params);
        $id = $stmt->insert_id;
        $stmt->close();
        return $id;
    }

    /** Prepares the query, binds the values to the ? marks and runs it. */
    private function run($sql, $types, $params)
    {
        $stmt = $this->conn->prepare($sql);
        if ($types !== '') {
            $stmt->bind_param($types, ...$params);
        }
        $stmt->execute();
        return $stmt;
    }
}

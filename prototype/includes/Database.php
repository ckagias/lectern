<?php
/** Opens the database connection and runs prepared queries. */
class Database
{
    /** @var mysqli The open connection. */
    private $conn;

    /**
     * Connects to the lectern database.
     *
     * @throws mysqli_sql_exception When the database cannot be reached.
     */
    public function __construct()
    {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $this->conn->set_charset('utf8mb4');
    }

    /**
     * Runs a SELECT and returns all rows as an array.
     *
     * @param string $sql The query, with a ? for every value.
     * @param string $types One letter per value: s for text, i for a whole number.
     * @param array $params The values for the ? marks.
     * @return array The rows, each one an array of column values.
     */
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

    /**
     * Runs an INSERT, UPDATE or DELETE and returns the id of the new row.
     *
     * @param string $sql The query, with a ? for every value.
     * @param string $types One letter per value: s for text, i for a whole number.
     * @param array $params The values for the ? marks.
     * @return int The id of the inserted row, or 0 for an UPDATE or DELETE.
     */
    public function execute($sql, $types = '', $params = [])
    {
        $stmt = $this->run($sql, $types, $params);
        $id = $stmt->insert_id;
        $stmt->close();
        return $id;
    }

    /**
     * Prepares the query, binds the values to the ? marks and runs it.
     *
     * @param string $sql The query, with a ? for every value.
     * @param string $types One letter per value.
     * @param array $params The values for the ? marks.
     * @return mysqli_stmt The statement after it has run.
     */
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

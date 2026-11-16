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
     * @param array $params The values for the ? marks, in the same order.
     * @return array The rows, each one an array of column values.
     */
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

    /**
     * Runs an INSERT, UPDATE or DELETE and returns the id of the new row.
     *
     * @param string $sql The query, with a ? for every value.
     * @param array $params The values for the ? marks, in the same order.
     * @return int The id of the inserted row, or 0 for an UPDATE or DELETE.
     */
    public function execute($sql, $params)
    {
        $stmt = $this->run($sql, $params);
        $id = $stmt->insert_id;
        $stmt->close();
        return $id;
    }

    /**
     * Prepares the query and runs it with the values for the ? marks.
     *
     * @param string $sql The query, with a ? for every value.
     * @param array $params The values for the ? marks, in the same order.
     * @return mysqli_stmt The statement after it has run.
     */
    private function run($sql, $params)
    {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }
}

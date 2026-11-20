<?php
// Reads and writes users in the database.
class User
{
    private $db;

    // Keeps the database connection to use.
    public function __construct($db)
    {
        $this->db = $db;
    }

    // Finds a user by email or returns null.
    public function findByEmail($email)
    {
        $rows = $this->db->select('SELECT * FROM users WHERE email = ?', [$email]);
        if (isset($rows[0])) {
            return $rows[0];
        }
        return null;
    }

    // Finds a user by username or returns null.
    public function findByUsername($username)
    {
        $rows = $this->db->select('SELECT * FROM users WHERE username = ?', [$username]);
        if (isset($rows[0])) {
            return $rows[0];
        }
        return null;
    }

    // Saves a new user and returns the id.
    public function create($username, $email, $password, $roleId)
    {
        // Only the hash is saved. The password itself is never stored.
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = 'INSERT INTO users (username, email, password_hash, role_id, created_at) VALUES (?, ?, ?, ?, ?)';
        return $this->db->execute($sql, [$username, $email, $hash, $roleId, date('Y-m-d H:i:s')]);
    }

    // Returns the user if the login is right or null.
    public function checkLogin($email, $password)
    {
        $user = $this->findByEmail($email);
        // password_verify compares the typed text with the hash.
        if ($user !== null && password_verify($password, $user['password_hash'])) {
            return $user;
        }
        return null;
    }
}

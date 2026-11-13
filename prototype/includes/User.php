<?php
/** Reads and writes rows of the users table. */
class User
{
    private $db;

    /** Keeps the database connection to use. */
    public function __construct($db)
    {
        $this->db = $db;
    }

    /** Returns the user with this email, or null when there is none. */
    public function findByEmail($email)
    {
        $rows = $this->db->select('SELECT * FROM users WHERE email = ?', 's', [$email]);
        if (isset($rows[0])) {
            return $rows[0];
        }
        return null;
    }

    /** Returns the user with this username, or null when there is none. */
    public function findByUsername($username)
    {
        $rows = $this->db->select('SELECT * FROM users WHERE username = ?', 's', [$username]);
        if (isset($rows[0])) {
            return $rows[0];
        }
        return null;
    }

    /** Saves a new user with a hashed password and returns the new id. */
    public function create($username, $email, $password, $roleId)
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = 'INSERT INTO users (username, email, password_hash, role_id, created_at) VALUES (?, ?, ?, ?, ?)';
        return $this->db->execute($sql, 'sssis', [$username, $email, $hash, $roleId, date('Y-m-d H:i:s')]);
    }

    /** Returns the user when the email and password are right, otherwise null. */
    public function checkLogin($email, $password)
    {
        $user = $this->findByEmail($email);
        if ($user !== null && password_verify($password, $user['password_hash'])) {
            return $user;
        }
        return null;
    }
}

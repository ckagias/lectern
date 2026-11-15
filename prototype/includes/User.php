<?php
/** Reads and writes rows of the users table. */
class User
{
    /** @var Database The connection to the lectern database. */
    private $db;

    /**
     * Keeps the database connection to use.
     *
     * @param Database $db The connection to the lectern database.
     */
    public function __construct($db)
    {
        $this->db = $db;
    }

    /**
     * Returns the user with this email, or null when there is none.
     *
     * @param string $email The email to look for.
     * @return array|null The row of the user, or null.
     */
    public function findByEmail($email)
    {
        $rows = $this->db->select('SELECT * FROM users WHERE email = ?', 's', [$email]);
        if (isset($rows[0])) {
            return $rows[0];
        }
        return null;
    }

    /**
     * Returns the user with this username, or null when there is none.
     *
     * @param string $username The username to look for.
     * @return array|null The row of the user, or null.
     */
    public function findByUsername($username)
    {
        $rows = $this->db->select('SELECT * FROM users WHERE username = ?', 's', [$username]);
        if (isset($rows[0])) {
            return $rows[0];
        }
        return null;
    }

    /**
     * Saves a new user with a hashed password and returns the new id.
     *
     * @param string $username The username.
     * @param string $email The email.
     * @param string $password The password as typed, it is hashed before it is saved.
     * @param int $roleId The id of the role of the user.
     * @return int The id of the new user.
     */
    public function create($username, $email, $password, $roleId)
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = 'INSERT INTO users (username, email, password_hash, role_id, created_at) VALUES (?, ?, ?, ?, ?)';
        return $this->db->execute($sql, 'sssis', [$username, $email, $hash, $roleId, date('Y-m-d H:i:s')]);
    }

    /**
     * Returns the user when the email and password are right, otherwise null.
     *
     * @param string $email The email typed at login.
     * @param string $password The password typed at login.
     * @return array|null The row of the user, or null when the pair is wrong.
     */
    public function checkLogin($email, $password)
    {
        $user = $this->findByEmail($email);
        if ($user !== null && password_verify($password, $user['password_hash'])) {
            return $user;
        }
        return null;
    }
}

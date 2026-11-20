<?php
// Checks form values. A method returns an error key or an empty string.
class Validator
{
    // Only letters numbers and underscores. Length 3 to 30.
    public function username($value)
    {
        if (!preg_match('/^[A-Za-z0-9_]{3,30}$/', $value)) {
            return 'err_username';
        }
        return '';
    }

    // A valid email up to 100 characters.
    public function email($value)
    {
        if (strlen($value) > 100 || !filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return 'err_email';
        }
        return '';
    }

    // Length 8 to 72 with a letter and a number. The hash ignores more than 72.
    public function password($value)
    {
        $length = strlen($value);
        if ($length < 8 || $length > 72 || !preg_match('/[A-Za-z]/', $value) || !preg_match('/[0-9]/', $value)) {
            return 'err_password';
        }
        return '';
    }

    public function passwordsMatch($password, $confirm)
    {
        if ($password !== $confirm) {
            return 'err_password_match';
        }
        return '';
    }

    public function role($value)
    {
        if ($value !== 'member' && $value !== 'librarian') {
            return 'err_role';
        }
        return '';
    }

    // The code must belong to the chosen role.
    public function code($role, $code)
    {
        // Case does not matter.
        $code = strtoupper(trim($code));
        if ($code === '') {
            return 'err_code';
        }
        if ($role === 'member' && $code !== CODE_MEMBER) {
            return 'err_code_wrong_member';
        }
        if ($role === 'librarian' && $code !== CODE_LIBRARIAN) {
            return 'err_code_wrong_librarian';
        }
        return '';
    }

    // Login only needs a filled password. The strength rules apply at registration.
    public function loginPassword($value)
    {
        if ($value === '') {
            return 'err_password_empty';
        }
        return '';
    }
}

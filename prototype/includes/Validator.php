<?php
/** Checks form input. Every method returns an error key from the language files, or '' when the value is fine. */
class Validator
{
    /** Username: 3 to 30 letters, numbers or underscores. */
    public function username($value)
    {
        if (!preg_match('/^[A-Za-z0-9_]{3,30}$/', $value)) {
            return 'err_username';
        }
        return '';
    }

    /** Email: a valid address, at most 100 characters. */
    public function email($value)
    {
        if (strlen($value) > 100 || !filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return 'err_email';
        }
        return '';
    }

    /** Password: 8 to 72 characters with at least one letter and one number. */
    public function password($value)
    {
        $length = strlen($value);
        if ($length < 8 || $length > 72 || !preg_match('/[A-Za-z]/', $value) || !preg_match('/[0-9]/', $value)) {
            return 'err_password';
        }
        return '';
    }

    /** Both password fields must be the same. */
    public function passwordsMatch($password, $confirm)
    {
        if ($password !== $confirm) {
            return 'err_password_match';
        }
        return '';
    }

    /** Role: member or librarian. */
    public function role($value)
    {
        if ($value !== 'member' && $value !== 'librarian') {
            return 'err_role';
        }
        return '';
    }

    /** Registration code: it must be given and it must be the code of the chosen role. */
    public function code($role, $code)
    {
        $code = strtoupper(trim($code));
        if ($code === '') {
            return 'err_code';
        }
        $right = CODE_MEMBER;
        if ($role === 'librarian') {
            $right = CODE_LIBRARIAN;
        }
        if (!hash_equals($right, $code)) {
            return 'err_code_wrong';
        }
        return '';
    }
}

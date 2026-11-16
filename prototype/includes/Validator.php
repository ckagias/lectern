<?php
/** Checks form input. Every method returns an error key from the language files, or '' when the value is fine. */
class Validator
{
    /**
     * Username: 3 to 30 letters, numbers or underscores.
     *
     * @param string $value The username.
     * @return string An error key from the language files, or '' when the value is fine.
     */
    public function username($value)
    {
        if (!preg_match('/^[A-Za-z0-9_]{3,30}$/', $value)) {
            return 'err_username';
        }
        return '';
    }

    /**
     * Email: a valid address, at most 100 characters.
     *
     * @param string $value The email.
     * @return string An error key, or '' when the value is fine.
     */
    public function email($value)
    {
        if (strlen($value) > 100 || !filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return 'err_email';
        }
        return '';
    }

    /**
     * Password: 8 to 72 characters with at least one Latin letter and one number.
     *
     * @param string $value The password.
     * @return string An error key, or '' when the value is fine.
     */
    public function password($value)
    {
        $length = strlen($value);
        if ($length < 8 || $length > 72 || !preg_match('/[A-Za-z]/', $value) || !preg_match('/[0-9]/', $value)) {
            return 'err_password';
        }
        return '';
    }

    /**
     * Both password fields must be the same.
     *
     * @param string $password The first password field.
     * @param string $confirm The confirmation field.
     * @return string An error key, or '' when they match.
     */
    public function passwordsMatch($password, $confirm)
    {
        if ($password !== $confirm) {
            return 'err_password_match';
        }
        return '';
    }

    /**
     * Role: member or librarian.
     *
     * @param string $value The role from the form.
     * @return string An error key, or '' when the value is fine.
     */
    public function role($value)
    {
        if ($value !== 'member' && $value !== 'librarian') {
            return 'err_role';
        }
        return '';
    }

    /**
     * Registration code: it must be given and it must be the code of the chosen role.
     *
     * @param string $role The chosen role, member or librarian.
     * @param string $code The code typed in the form.
     * @return string An error key, or '' when the code is right.
     */
    public function code($role, $code)
    {
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

    /**
     * Password at login: it only has to be filled in. The strength rules are for registration.
     *
     * @param string $value The password.
     * @return string An error key, or '' when the value is fine.
     */
    public function loginPassword($value)
    {
        if ($value === '') {
            return 'err_password_empty';
        }
        return '';
    }
}

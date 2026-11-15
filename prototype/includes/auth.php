<?php
/**
 * Tells whether someone is logged in.
 *
 * @return bool True when the session holds a user id.
 */
function isLoggedIn()
{
    return isset($_SESSION['user_id']);
}

/**
 * Tells whether the logged in user has this role.
 *
 * @param int $roleId The role id to look for, ROLE_MEMBER or ROLE_LIBRARIAN.
 * @return bool True when someone is logged in with this role.
 */
function hasRole($roleId)
{
    return isLoggedIn() && $_SESSION['role_id'] == $roleId;
}

/**
 * Sends visitors who are not logged in to the login page. The browser is told not to keep the page, so the Back button after logout shows nothing private.
 *
 * @param string $base The path from the current page to the main folder.
 * @return void
 */
function requireLogin($base = '')
{
    if (!isLoggedIn()) {
        redirect($base . 'login.php');
    }
    header('Cache-Control: no-store');
}

/**
 * Lets only this role through. Other users are sent to the Forbidden Action page.
 *
 * @param int $roleId The role that may open the page.
 * @param string $base The path from the current page to the main folder.
 * @return void
 */
function requireRole($roleId, $base = '')
{
    requireLogin($base);
    if (!hasRole($roleId)) {
        redirect($base . 'forbidden.php');
    }
}

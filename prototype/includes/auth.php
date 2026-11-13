<?php
/** True when someone is logged in. */
function isLoggedIn()
{
    return isset($_SESSION['user_id']);
}

/** True when the logged in user has this role. */
function hasRole($roleId)
{
    return isLoggedIn() && $_SESSION['role_id'] == $roleId;
}

/** Sends visitors who are not logged in to the login page. */
function requireLogin($base = '')
{
    if (!isLoggedIn()) {
        redirect($base . 'login.php');
    }
}

/** Lets only this role through. Other users see Forbidden Action. */
function requireRole($roleId, $base = '')
{
    requireLogin($base);
    if (!hasRole($roleId)) {
        require __DIR__ . '/forbidden.php';
        exit;
    }
}

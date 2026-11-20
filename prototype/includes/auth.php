<?php
// A logged in visitor has a user id in the session.
function isLoggedIn()
{
    return isset($_SESSION['user_id']);
}

// True if the user has this role id.
function hasRole($roleId)
{
    return isLoggedIn() && $_SESSION['role_id'] == $roleId;
}

// The role is also the name of the layout.
function roleName()
{
    if (hasRole(ROLE_LIBRARIAN)) {
        return 'librarian';
    }
    return 'member';
}

// Logged out visitors go to the login page.
function requireLogin($base = '')
{
    if (!isLoggedIn()) {
        redirect($base . 'login.php');
    }
    // No caching so the Back button shows nothing private after logout.
    header('Cache-Control: no-store');
}

// Other roles go to the Forbidden Action page.
function requireRole($roleId, $base = '')
{
    requireLogin($base);
    if (!hasRole($roleId)) {
        redirect($base . 'forbidden.php');
    }
}

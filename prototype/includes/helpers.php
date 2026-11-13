<?php
/** Makes text safe to print inside HTML. */
function e($text)
{
    return filter_var($text, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}

/** Sends the browser to another page and stops the script. */
function redirect($path)
{
    header('Location: ' . $path);
    exit;
}

/** Returns a value sent by a form as text, or an empty string when it is missing. */
function post($name)
{
    if (isset($_POST[$name]) && is_string($_POST[$name])) {
        return $_POST[$name];
    }
    return '';
}

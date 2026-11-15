<?php
/**
 * Makes text safe to print inside HTML.
 *
 * @param string $text The text to print.
 * @return string The same text with the special characters escaped.
 */
function e($text)
{
    return filter_var($text, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}

/**
 * Sends the browser to another page and stops the script.
 *
 * @param string $path The page to open.
 * @return void
 */
function redirect($path)
{
    header('Location: ' . $path);
    exit;
}

/**
 * Returns a value sent by a form as text, or an empty string when it is missing.
 *
 * @param string $name The name of the form field.
 * @return string The value of the field.
 */
function post($name)
{
    if (isset($_POST[$name]) && is_string($_POST[$name])) {
        return $_POST[$name];
    }
    return '';
}

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

/** Prints an icon from the sprite in icons.php. */
function icon($name)
{
    return '<svg class="icon" aria-hidden="true"><use href="#ic-' . $name . '"/></svg>';
}

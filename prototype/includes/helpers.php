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

/** Link to this page with one query value changed, like ?lang=en. Other values stay. */
function switchLink($key, $value)
{
    return e('?' . http_build_query(array_merge($_GET, [$key => $value])));
}

/** Prints a label, an input and its message areas. Attributes is a list like ['autocomplete' => 'email']. */
function field($name, $label, $type = 'text', $value = '', $error = '', $attributes = [], $hint = '')
{
    $extra = '';
    foreach ($attributes as $key => $val) {
        $extra .= ' ' . $key . '="' . e($val) . '"';
    }
    $describedBy = $name . '-error';
    if ($hint !== '') {
        $describedBy = $name . '-hint ' . $describedBy;
    }
    $invalid = '';
    if ($error !== '') {
        $invalid = ' aria-invalid="true"';
    }
    $html = '<div class="field">';
    $html .= '<label for="' . $name . '">' . $label . '</label>';
    if ($hint !== '') {
        $html .= '<p class="hint" id="' . $name . '-hint">' . $hint . '</p>';
    }
    $html .= '<input class="input" id="' . $name . '" name="' . $name . '" type="' . $type . '" value="' . e($value) . '"' . $extra . $invalid . ' aria-describedby="' . $describedBy . '">';
    $html .= '<p class="error" id="' . $name . '-error">' . $error . '</p>';
    return $html . '</div>';
}

/** Keeps a message for the next page. The text key is translated when it is shown, type is success, error or info. */
function setFlash($type, $key)
{
    $_SESSION['flash'] = ['type' => $type, 'key' => $key];
}

<?php
// Escapes text so typed HTML cannot change the page.
function e($text)
{
    return filter_var($text, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}

// Sends the browser to another page and stops the script.
function redirect($path)
{
    header('Location: ' . $path);
    exit;
}

// Returns a form value or an empty string if it is missing.
function post($name)
{
    if (isset($_POST[$name]) && is_string($_POST[$name])) {
        return $_POST[$name];
    }
    return '';
}

// Gives the open and close time of a weekday. A closed day returns an empty array.
function openingHours($day)
{
    if ($day >= 1 && $day <= 5) {
        return ['open' => '09:00', 'close' => '21:00'];
    }
    if ($day == 6) {
        return ['open' => '09:00', 'close' => '14:00'];
    }
    return [];
}

// Says in the current language if the library is open now.
function openingStatus($day, $now)
{
    $hours = openingHours($day);
    if ($hours !== [] && $now >= $hours['open'] && $now < $hours['close']) {
        return t('dashboard_open') . ' ' . $hours['close'];
    }
    return t('dashboard_closed');
}

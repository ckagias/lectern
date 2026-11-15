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

/**
 * Returns the opening and closing time of a weekday, or an empty array when the library is closed that day.
 *
 * @param int $day The weekday, 1 for Monday to 7 for Sunday.
 * @return array The times as 'open' and 'close', for example 09:00 and 21:00.
 */
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

/**
 * Returns a sentence about the opening of the library at this moment, in the current language.
 *
 * @param int $day The weekday, 1 for Monday to 7 for Sunday.
 * @param string $now The time as hours and minutes, for example 18:30.
 * @return string For example "Open until 21:00" or "Closed now · Opens tomorrow at 09:00".
 */
function openingStatus($day, $now)
{
    $hours = openingHours($day);
    if ($hours !== [] && $now >= $hours['open'] && $now < $hours['close']) {
        return t('dashboard_open') . ' ' . $hours['close'];
    }
    if ($hours !== [] && $now < $hours['open']) {
        return t('dashboard_closed') . ' · ' . t('dashboard_opens_today') . ' ' . $hours['open'];
    }
    // The day is over or the library is closed all day, so the next opening is tomorrow, or Monday when tomorrow is Sunday.
    $next = $day + 1;
    $key = 'dashboard_opens_tomorrow';
    if ($next >= 7) {
        $next = 1;
        $key = 'dashboard_opens_monday';
    }
    $nextHours = openingHours($next);
    return t('dashboard_closed') . ' · ' . t($key) . ' ' . $nextHours['open'];
}

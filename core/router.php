<?php

function dispatch($url, $controllersPath, $baseUrl = null)
{
    if ($baseUrl) {
        $url = substr($url, strlen($baseUrl));
    }

    $getParamsStart = stripos($url, '?');
    if ($getParamsStart !== false) {
        $url = substr($url, 0, $getParamsStart);
    }

    $parts = explode('/', trim($url, '/'));
    $parts = isGuest() ? prepareGuestParts($parts) : prepareUserParts($parts);

    $controller = "{$controllersPath}/{$parts[0]}.php";
    if (!file_exists($controller)) {
        die("Controller '{$parts[0]}' is not defined");
    }

    require_once $controller;

    $action = 'action' . ucfirst($parts[1]);
    if (!function_exists($action)) {
        die("Action '{$parts[1]}' is not allowed in controller '{$parts[0]}'");
    }

    return $action();
}

/**
 * @param array $parts
 * @return array
 */
function prepareGuestParts(array $parts)
{
    $action = "{$parts[0]}/{$parts[1]}";
    if (!in_array($action, config('guestPages'))) {
        return ['guest', 'login'];
    }

    return $parts;
}

/**
 * @param array $parts
 * @return array
 */
function prepareUserParts(array $parts)
{
    return $parts;
}

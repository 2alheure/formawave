<?php

use App\FlashSession;

/**
 * Gets all the session flashes for given type 
 * (or all the flashes of all types if no type is provided)
 * 
 * @param string $type The type of flashes to get
 * @return array The flash messages
 */
function flashes(string $type = ''): array {
    if (!empty($type)) return FlashSession::getType($type);
    return FlashSession::all();
}

/**
 * Creates a new flash message
 * 
 * @param string $type The type of flash message (ex: error, success, ...)
 * @param string $message The message to store in flash
 * @return void
 */
function add_flash(string $type, string $message) {
    FlashSession::add($type, $message);
}

/**
 * Gets CSS classes for a given type of flash message
 * 
 * @param string $type The type to get the style of
 * @return string
 */
function flash_style(string $type): string {
    return FlashSession::getFullStyle($type);
}

/**
 * Gets name for a given type of flash message
 * 
 * @param string $type The type to get the name of
 * @return string
 */
function flash_name(string $type): string {
    return FlashSession::getName($type);
}

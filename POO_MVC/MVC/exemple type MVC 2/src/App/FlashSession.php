<?php

namespace App;

class FlashSession {
    /**
     * Empties the flash messages
     */
    static function clear() {
        $_SESSION['flashes'] = [];
    }

    /**
     * Gets all the session flashes of all the types
     * 
     * @return array The flash messages
     */
    static function all(): array {
        return $_SESSION['flashes'] ?? [];
    }

    /**
     * Gets all the session flashes for given type 
     * 
     * @param string $type The type of flashes to get
     * @return array The flash messages
     */
    static function getType(string $type): array {
        return $_SESSION['flashes'][$type] ?? [];
    }

    /**
     * Creates a new flash message
     * 
     * @param string $type The type of flash message (ex: error, success, ...)
     * @param string $message The message to store in flash
     * @return void
     */
    static function add(string $type, string $message) {
        $_SESSION['flashes'][$type][] = $message;
    }

    /**
     * Gets CSS classes for the background of a given type of flash message
     * 
     * @param string $type The type to get the background of
     * @return string
     */
    static function getBackground(string $type): string {
        switch ($type) {
            case 'error':
                return 'bg-red-100';

            case 'success':
                return 'bg-green-100';

            case 'info':
                return 'bg-blue-100';

            case 'warning':
                return 'bg-yellow-100';

            default:
                return 'bg-white';
        }
    }

    /**
     * Gets CSS classes for the text color of a given type of flash message
     * 
     * @param string $type The type to get the text color of
     * @return string
     */
    static function getTextColor(string $type): string {
        switch ($type) {
            case 'error':
                return 'text-red-700';

            case 'success':
                return 'text-green-700';

            case 'info':
                return 'text-blue-700';

            case 'warning':
                return 'text-yellow-700';

            default:
                return 'text-black';
        }
    }

    /**
     * Gets CSS classes for the border of a given type of flash message
     * 
     * @param string $type The type to get the border of
     * @return string
     */
    static function getBorder(string $type): string {
        switch ($type) {
            case 'error':
                return 'text-red-700';

            case 'success':
                return 'text-green-700';

            case 'info':
                return 'text-blue-700';

            case 'warning':
                return 'text-yellow-700';

            default:
                return 'text-black';
        }
    }

    /**
     * Gets CSS classes for a given type of flash message
     * 
     * @param string $type The type to get the style of
     * @return string
     */
    static function getFullStyle(string $type): string {
        return static::getBackground($type) . ' ' . static::getBorder($type) . ' ' . static::getTextColor($type);
    }

    /**
     * Gets name for a given type of flash message
     * 
     * @param string $type The type to get the name of
     * @return string
     */
    static function getName(string $type): string {
        switch ($type) {
            case 'error':
                return 'Erreur';

            case 'success':
                return 'Succès';

            case 'info':
                return 'Information';

            case 'warning':
                return 'Avertissement';

            default:
                return 'Message';
        }
    }
}

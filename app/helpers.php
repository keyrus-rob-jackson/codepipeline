<?php

/**
 * Convert coordinates (latitude and longitude) to DMS (degrees, minutes, seconds) format.
 *
 * @return string
 */
if (! function_exists('convertCoordinateToDMS')) {
    function convertCoordinateToDMS(float $coordinates)
    {
        $label = $coordinates < 0 ? 'S' : 'N';
        $coordinates = abs($coordinates);
        $degrees = floor($coordinates);
        $coordinates = ($coordinates - $degrees) * 60;
        $minutes = floor($coordinates);
        $seconds = floor(($coordinates - $minutes) * 60);

        return sprintf("%d&deg;%d'%d\"%s", $degrees, $minutes, $seconds, $label);

    }
}

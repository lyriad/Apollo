<?php

if (!function_exists('centimeters_to_feet_and_inches')) {

     /**
     * Function centimeters_to_feet_and_inches(float)
     *
     * Converts distance in centimetres to string representation in feet and inches.
     *
     * @source https://alex.leonard.ie/2014/02/12/php-convert-height-measurements-imperial-metric/
     *
     * @param {float}   $cm     Distance in centimetres.
     *
     * @return {string} String representation of distance in feet and inches.
     */
    function centimeters_to_feet_and_inches(float $cm) {

        $inches = round($cm * 0.393701);
        $feet = intval($inches / 12);
        $inches = $inches % 12;
    
        return "{$feet}' {$inches}\"";
    }
}

if (!function_exists('feet_and_inches_to_centimeters')) {

    /**
     * Function feet_and_inches_to_centimeters(string)
     *
     * Converts distance in feet and inches to centimetres.
     *
     * @param {string}   $feet_and_inches     String representation of distance in feet and inches.
     *
     * @return {float} Height in centimetres.
     */
    function feet_and_inches_to_centimeters(string $feet_and_inches) {

        $parts = explode(' ', $feet_and_inches);

        if (count($parts) != 2) {
            return null;
        }

        $cm = floatval($parts[0]) * 30.48;
        $cm += floatval($parts[1]) * 2.54;

        return $cm;
    }
}

if (!function_exists('kilograms_to_pounds')) {

    /**
     * Function kilograms_to_pounds(float)
     *
     * Converts weight in kilograms to pounds.
     *
     * @param {float}   $kg     Weight in kilograms.
     *
     * @return {float} Weight in pounds.
     */
    function kilograms_to_pounds(float $kg) {

        return $kg * 2.20462262;
    }
}

if (!function_exists('pounds_to_kilograms')) {

    /**
     * Function pounds_to_kilograms(float)
     *
     * Converts weight in pounds to kilograms.
     *
     * @param {float}   $pounds     Weight in pounds.
     *
     * @return {float} Weight in kilograms.
     */
    function pounds_to_kilograms(float $pounds) {

        return $pounds * 0.45359237;
    }
}

if (!function_exists('determine_bp_reading_category')) {

    /**
     * Function determine_bp_reading_category(int, int)
     *
     * Determines blood pressure category based on reading values.
     *
     * @param {int}   $systolic     Systolic blood pressure reading value.
     * @param {int}   $diastolic    Diastolic blood pressure reading value.
     *
     * @return {string} Category of blood sample reading.
     */
    function determine_bp_reading_category(int $systolic, int $diastolic)
    {
        if ($systolic > 180 || $diastolic > 120) {
            return 'crisis';
        }
        elseif ($systolic >= 140 || $diastolic >= 90) {
            return 'high_s2';
        }
        elseif ($systolic >= 130 || $diastolic >= 80) {
            return 'high_s1';
        }
        elseif ($systolic >= 120 && $diastolic < 80) {
            return 'elevated';
        }
        else {
            return 'normal';
        }
    }
}

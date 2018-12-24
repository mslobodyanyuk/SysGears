<?php

namespace src\Degree;

/**
 * Class Scale is intended to provide constants, array, methods for calculating to converting degrees into another scales
 */
class Scale {

    const
        CELSIUS_DEGREE_SCALE = 'C',
        KELVIN_DEGREE_SCALE = 'K',
        FAHRENHEIT_DEGREE_SCALE = 'F',

//convertCelsius
        CELSIUS_TO_KELVIN_CONVERT_PARAM = 273.15,
        CELSIUS_TO_FAHRENHEIT_CONVERT_PARAM1 = 9/5,
        CELSIUS_TO_FAHRENHEIT_CONVERT_PARAM2 = 32,
//convertKelvin
        KELVIN_TO_CELSIUS_CONVERT_PARAM = 273.15,
        KELVIN_TO_FAHRENHEIT_CONVERT_PARAM1 = 1.8,
        KELVIN_TO_FAHRENHEIT_CONVERT_PARAM2 = 273.15,
        KELVIN_TO_FAHRENHEIT_CONVERT_PARAM3 = 32,
//convertFahrenheit
        FAHRENHEIT_TO_CELSIUS_CONVERT_PARAM1 = 32,
        FAHRENHEIT_TO_CELSIUS_CONVERT_PARAM2 = 5/9,
        FAHRENHEIT_TO_KELVIN_CONVERT_PARAM1 = 459.67,
        FAHRENHEIT_TO_KELVIN_CONVERT_PARAM2 = 5/9;

    /**
     * @var array
     */
    public static $namesDegreesScales = [self::CELSIUS_DEGREE_SCALE, self::KELVIN_DEGREE_SCALE, self::FAHRENHEIT_DEGREE_SCALE,];

    /**
     * @param integer $degrees
     * @return string
     */
    public static function convertCelsius($degrees)
    {
        $degreesKelvin = round($degrees + self::CELSIUS_TO_KELVIN_CONVERT_PARAM); //Conversion of kelvins to Celsius degrees. The calculation takes place according to the formula: T = t + T0, where T is the temperature in Kelvin, t is the temperature in degrees Celsius, T0 = 273.15 Kelvin
        $degreesFahrenheit = round($degrees*(self::CELSIUS_TO_FAHRENHEIT_CONVERT_PARAM1) + self::CELSIUS_TO_FAHRENHEIT_CONVERT_PARAM2); //To convert the temperature from the Celsius scale to the Fahrenheit scale, multiply the original number by 9/5 and add 32.
        return '{'. self::KELVIN_DEGREE_SCALE . ':' . $degreesKelvin . ', ' . self::FAHRENHEIT_DEGREE_SCALE . ':' . $degreesFahrenheit . '}';
    }

    /**
     * @param integer $degrees
     * @return string
     */
    public static function convertKelvin($degrees)
    {
        $degreesCelsius = round($degrees - self::KELVIN_TO_CELSIUS_CONVERT_PARAM);//ºC = K - 273.
        $degreesFahrenheit = round(self::KELVIN_TO_FAHRENHEIT_CONVERT_PARAM1 * ($degrees - self::KELVIN_TO_FAHRENHEIT_CONVERT_PARAM2) + self::KELVIN_TO_FAHRENHEIT_CONVERT_PARAM3); //ºF = 1.8 x (K - 273) + 32.
        return '{'. self::CELSIUS_DEGREE_SCALE . ':' . $degreesCelsius . ', ' . self::FAHRENHEIT_DEGREE_SCALE . ':' . $degreesFahrenheit . '}';
    }

    /**
     * @param integer $degrees
     * @return string
     */
    public static function convertFahrenheit($degrees)
    {
        $degreesCelsius = round(($degrees - self::FAHRENHEIT_TO_CELSIUS_CONVERT_PARAM1)*self::FAHRENHEIT_TO_CELSIUS_CONVERT_PARAM2); //To convert the temperature from the Fahrenheit scale to the Celsius scale, subtract 32 from the initial number and multiply the result by 5/9.
        $degreesKelvin = round(($degrees + self::FAHRENHEIT_TO_KELVIN_CONVERT_PARAM1)*self::FAHRENHEIT_TO_KELVIN_CONVERT_PARAM2); //To convert values ​​from degrees Fahrenheit to Kelvin, the formula is used: [K] = ([° F] + 459.67) × 5/9
        return '{'. self::CELSIUS_DEGREE_SCALE . ':' . $degreesCelsius . ', ' . self::KELVIN_DEGREE_SCALE . ':' . $degreesKelvin . '}';
    }

}
<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 08-10-2016 19:15
 */
declare(strict_types = 1);

namespace JorisRietveld\Website\Helper;


class TemperatureConverter
{
    CONST FAHRENHEIT_TO_RATE = 0.555555556;
    CONST FAHRENHEIT_FROM_RATE = 1.8;

    CONST CELSIUS_FAHRENHEIT_CONST = 32;
    CONST CELSIUS_KELVIN_CONST =  273.15;

    CONST FAHRENHEIT_KELVIN_CONST = 459.67;
    CONST FAHRENHEIT_CELSIUS_CONST = 32;


    public function __construct()
    {
        
    }

    public function celsiusToFahrenheit( float $celsius, $precision = 0 ) : float
    {
        return (float) round( $celsius * self::FAHRENHEIT_TO_RATE - self::CELSIUS_FAHRENHEIT_CONST, $precision);
    }

    public function celsiusToKelvin( float $celsius, $precision = 0 ) : float
    {
        return (float) round( $celsius + self::CELSIUS_KELVIN_CONST, $precision );
    }
    
    public function FahrenheitToKelvin( float $fahrenheit, $precision = 0) : float
    {
        return (float) round( $fahrenheit + self::FAHRENHEIT_KELVIN_CONST * self::FAHRENHEIT_TO_RATE, $precision );
    }

    public function fahrenheitToCelsius( float $fahrenheit, $precision = 0 ) : float
    {
        return (float) round( $fahrenheit - self::FAHRENHEIT_CELSIUS_CONST * self::FAHRENHEIT_TO_RATE, $precision );
    }

    public function kelvinToFahrenheit( float $kelvin, $precision = 0 ) : float
    {
        
    }

    public function kelvinToCelsius( float $fahrenheit, $precision = 0 ) : float
    {
        
    }


}
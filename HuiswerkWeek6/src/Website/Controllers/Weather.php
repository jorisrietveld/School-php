<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 06-10-2016 06:42
 */
declare(strict_types = 1);

namespace JorisRietveld\Website\Controllers;


use JorisRietveld\Website\Core\BaseController;
use JorisRietveld\Website\Helper\TemperatureConverter;
use JorisRietveld\Website\Helper\Translate;
use JorisRietveld\Website\Interfaces\ControllerContract;
use Symfony\Component\HttpFoundation\Response;
use JorisRietveld\Website\ThirdParty\Weather as WeatherApi;

class Weather extends BaseController implements ControllerContract
{
    protected $weatherString;

    public function __construct()
    {
        $weather = new WeatherApi();
        $this->weatherString = $weather->getWeatherStringEmmen();
    }

    public function index()
    {
        $content = $this->createWebPage( $this->getWeatherCondition() );
        return new Response( $content, 200);
    }

    protected function createWebPage( array $weatherInfo )
    {
        $header = $this->loadedTemplate( 'header.html');
        $footer = $this->loadedTemplate( 'footer.html');

        $content = '
            <h1>Het weer in: ' . $weatherInfo[ 'location' ] . '</h1>
            <div class="row weather-content-wrapper">
            
                <div class="weatherinfo-wrapper col-lg-4 text-center">
                    <i class="wi wi-yahoo-' . $weatherInfo[ 'code' ] . ' weather-icon"></i>
                    <br />
                    <span class="weather-description">' . $weatherInfo['string'] . '</span>
                </div>
                
                <div class="weathertemp-wrapper col-lg-1">
                    <i class="wi wi-thermometer weather-icon-temperature"></i>
                </div>
                <div class="weathertemp-wrapper-text col-lg-7">
                    <span class="weather-temperature-description col-lg-12">' .  $weatherInfo['temperature']['celsius']. ' graden Celsius</span>
                    <span class="weather-temperature-description col-lg-12">' .  $weatherInfo['temperature']['fahrenheit'] . ' graden Fahrenheit</span>
                    <span class="weather-temperature-description col-lg-12">' .  $weatherInfo['temperature']['kelvin'] . ' Kelvin</span>
                </div>
                
            </div>
        ';

        return $header . $content . $footer;
    }

    /**
     * Function to parse the yahoo weather api information.
     * 
     * @return array
     */
    protected function getWeatherCondition(  )
    {
        $weatherParts = explode( ' ', trim( $this->weatherString ));
        $weatherString = implode( array_slice($weatherParts, 3), ' ');
        $weatherString = ( new Translate() )->translate( $weatherString );
        
        return [
            'location' => $weatherParts[0],
            'temperature' => [
                'fahrenheit' => round( $weatherParts[1], 2),
                'celsius' => TemperatureConverter::fahrenheitToCelsius( (float)$weatherParts[1], 2 ),
                'kelvin' => TemperatureConverter::FahrenheitToKelvin( (float)$weatherParts[1], 2 ),
                ],
            'code' => $weatherParts[2],
            'string' => $weatherString,

        ];
    }


}
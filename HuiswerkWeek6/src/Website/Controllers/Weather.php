<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 06-10-2016 06:42
 */
declare(strict_types = 1);

namespace JorisRietveld\Website\Controllers;


use JorisRietveld\Website\Core\BaseController;
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
            <div class="weatherinfo-wrapper">
                <i class="wi wi-yahoo-' . $weatherInfo[ 'code' ] . '"></i>
            </div>
            <div class="weathertemp-wrapper">
                <i class="wi wi-thermometer weather-icon-temp"></i> ' .  $weatherInfo['temperature'] . '
            </div>
            <div>
                ' . $this->weatherString . '
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

        return [
            'location' => $weatherParts[0],
            'temperature' => ( $weatherParts[1] - 32 * 5/9),
            'code' => $weatherParts[2],
        ];
    }


}
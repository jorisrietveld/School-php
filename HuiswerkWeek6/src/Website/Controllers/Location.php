<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 06-10-2016 06:37
 */
declare(strict_types = 1);

namespace JorisRietveld\Website\Controllers;


use JorisRietveld\Website\Core\BaseController;
use JorisRietveld\Website\Interfaces\ControllerContract;
use JorisRietveld\Website\ThirdParty\EasyGoogleMap;
use Symfony\Component\HttpFoundation\Response;

class Location extends BaseController implements ControllerContract
{
    public function index()
    {
        $header = $this->loadedTemplate( 'header.html');
        $footer = $this->loadedTemplate( 'footer.html');

        $mapElement = $this->getTheMap();

        $pageContent = '
            <h1>Mijn school locatie</h1>
            ' . $mapElement . '
        ';

        return new Response( $header . $pageContent . $footer, 200);
    }

    protected function getTheMap()
    {
        $mapsConfig = $this->getConfiguration('maps');

        $easyGoogleMaps = new EasyGoogleMap( $mapsConfig->{'api-key'} );

        $easyGoogleMaps->SetAddress( $mapsConfig->{'street'} . " , " . $mapsConfig->{'place'} );
        $easyGoogleMaps->SetInfoWindowText( $mapsConfig->{'window-text'} );
        $easyGoogleMaps->mMapType = TRUE;
        $easyGoogleMaps->SetMapHeight("400");

        return $easyGoogleMaps->GmapsKey() .
        $easyGoogleMaps->MapHolder().
        $easyGoogleMaps->InitJs() .
        $easyGoogleMaps->UnloadMap();

    }
}
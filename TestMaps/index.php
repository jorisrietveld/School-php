<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 07-10-2016 21:21
 */
declare(strict_types = 1);

spl_autoload_register( function( $className ){
    $vendorPrefix = 'JorisRietveld\\';

    if( strpos( $className, $vendorPrefix ) !== 0 )
    {
        return;
    }

    $baseDir = __DIR__ . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR;

    include str_replace( [ $vendorPrefix, '\\' ], [ $baseDir, DIRECTORY_SEPARATOR ], $className ) . '.php';
});

$gm = new \JorisRietveld\TestMap\ThirdParty\EasyGoogleMap( 'AIzaSyAHL9jZdGrTkWXe1np536RX4AgTMuaxYrE' );


$gm->SetAddress("van Schaikweg 94" . " , " . "Emmen");
$gm->SetInfoWindowText("Stenden University </br> ");
$gm->mMapType = TRUE;
$gm->SetMapWidth("300");
$gm->SetMapHeight("300");

echo $gm->GmapsKey();

echo $gm->GetSideClick();
echo $gm->MapHolder();
echo $gm->InitJs();
echo $gm->UnloadMap();
<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 16-09-2016 13:31
 */

declare(strict_types = 1);

define( 'ROOT_DIR', __DIR__ . DIRECTORY_SEPARATOR );
define( 'CONFIG_DIR', ROOT_DIR . 'config' . DIRECTORY_SEPARATOR );
define( 'WEBSITE_DIR', ROOT_DIR . 'src' . DIRECTORY_SEPARATOR . 'Website' . DIRECTORY_SEPARATOR );
define( 'RESOURCES_DIR', WEBSITE_DIR . 'Resources' . DIRECTORY_SEPARATOR );

require __DIR__.DIRECTORY_SEPARATOR."vendor/autoload.php";


$application = new JorisRietveld\Website\Core\Application();
$request = new Symfony\Component\HttpFoundation\Request();

// Handle the request and send an response
//$application->handle( $request::createFromGlobals() )->send();

/*$templateEnv = new \JorisRietveld\Website\Core\TemplateEngine\TemplateEnvironment();

$sourceDirs = [
    RESOURCES_DIR . 'views' . DIRECTORY_SEPARATOR,
];


var_dump( $templateEnv->addSourceDirectories( $sourceDirs )->getSourceDirectories());

var_dump( $templateEnv->getTemplatesFiles() );*/
include __DIR__ . DIRECTORY_SEPARATOR;
<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 16-09-2016 13:31
 */

declare(strict_types = 1);

define( 'ROOT_DIR', __DIR__ . DIRECTORY_SEPARATOR );
define( 'CONFIG_DIR', ROOT_DIR . 'config' . DIRECTORY_SEPARATOR );

require __DIR__.DIRECTORY_SEPARATOR."vendor/autoload.php";

use Symfony\Component\HttpFoundation\Request;

$application = new JorisRietveld\Website\Core\Application( );

// Handle the request and send an response
$application->handle(
    (new Request())::createFromGlobals()
)->send();
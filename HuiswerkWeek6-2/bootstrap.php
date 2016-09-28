<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 21-09-2016 14:14
 */
declare(strict_types = 1);

spl_autoload_register( function( $className) {

});

switch ( $_GET['page'] )
{
    default:
        $page = 'home.php';
        break;
    case 'info':
        $page = 'info.php';
    case 'intrests':
        $page = 'instrests.php';
    case 'weather':
        $page = 'weather.php';
        case ''
}
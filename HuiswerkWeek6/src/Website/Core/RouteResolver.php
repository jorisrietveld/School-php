<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 17-09-2016 19:10
 */
declare(strict_types = 1);

namespace JorisRietveld\Website\Core;


class RouteResolver
{
    private $routerConfiguration;
    private $config;

    public function __construct()
    {
        $routerConfiguration = ConfigLoader::getLoader()->get('route');
    }

    public function getRouterConfig()
    {

    }

    public function resolve( $url )
    {
        
    }

    // todo parse the route config
    // todo get match the url route to the config

    // todo call controller 
}
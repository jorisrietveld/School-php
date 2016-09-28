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

    public function __construct()
    {
        $this->routerConfiguration = ConfigLoader::getLoader()->get('route');
    }

    /**
     * This method will return all the routes configuration.
     *
     * @return mixed
     */
    public function getRouterConfig()
    {
        return $this->routerConfiguration;
    }

    /**
     * This method will parse the config and look if the url matches an path in the config. Other wise it
     * wil match to the 404
     *
     * @param $url
     * @return Route
     */
    public function resolve( $url )
    {
        foreach ($this->routerConfiguration as $route )
        {
            if( strtolower( $url ) == (string)$route->path )
            {
                return new Route(
                    (string)$route->name,
                    (string)$route->path,
                    (string)$route->method,
                    (string)$route->controller
                );
            }
        }

        return new Route(
            (string)$this->routerConfiguration[0]->name,
            (string)$this->routerConfiguration[0]->path,
            (string)$this->routerConfiguration[0]->method,
            (string)$this->routerConfiguration[0]->controller
            );
    }
}
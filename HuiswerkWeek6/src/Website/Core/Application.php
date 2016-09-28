<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 16-09-2016 14:18
 */
declare(strict_types = 1);

namespace JorisRietveld\Website\Core;


use Symfony\Component\Console\Exception\LogicException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Application
{
    private $currentRequest;

    public function handle( Request $request )
    {
        $this->currentRequest = $request;
        $route = $this->resolveRoute( $request );
        var_dump($route);
        $this->callController( $route->getController(), $route->getHttpMethod() );
    }

    public function callController( $controller, $method )
    {
        $controller = '\\JorisRietveld\\Website\\Controller\\'.$controller;
        $controller = new $controller();

        $response = $controller->$method();

        if( isInstanceOf('Response', $response ) )
        {
            return $response;
        }
        throw new LogicException('The controller must return an Request object!');
    }

    protected function resolveRoute( Request $request = null ) : Route
    {
        $routerResolver = new RouteResolver();
        return $routerResolver->resolve( $request->getRequestUri() );
    }
}
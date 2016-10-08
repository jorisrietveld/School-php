<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 16-09-2016 14:18
 */
declare(strict_types = 1);

namespace JorisRietveld\Website\Core;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Application
{
    protected $request;
    protected $response;

    /**
     * Application constructor.
     * @param Request|null $request
     */
    public function __construct(  )
    {
        $this->response = new Response();
    }
    /**
     *  Handle an incoming http request and return an appropriate response.
     *
     * @param Request $request
     * @return Response
     */
    public function handle( Request $request = null )
    {
        $this->setRequest( $request );
        $route = $this->resolveRoute();
        $this->callController( $route->getController(), $route->getMethod() );
        return $this;
    }

    /**
     * When the request is handled send the response;
     * @return Response
     */
    public function send()
    {
        $this->response->prepare( $this->request );
        $this->response->send();
    }
    /**
     * This method will call the controller matched by the route.
     *
     * @param $controller
     * @param $method
     * @return Response
     */
    protected function callController( $controller, $method ) : Response
    {
        $controller = '\\JorisRietveld\\Website\\Controllers\\' . $controller;
        $controller = new $controller();

        $response = $controller->{$method}(  );

        if( is_a($response, '\Symfony\Component\HttpFoundation\Response'))
        {
            $this->response = $response;
            return $this->response;
        }
        throw new \LogicException('The controller must return an Request object!');
    }

    /**
     * This Method will resolve the route to an controller based on the request.
     *
     * @param Request|null $request
     * @return Route
     */
    protected function resolveRoute( Request $request = null ) : Route
    {
        $routerResolver = new RouteResolver();
        return $routerResolver->resolve( $this->request->getRequestUri() );
    }

    /**
     * @return Request
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param Request $request
     */
    public function setRequest( Request $request )
    {
        $this->request = $request ?: new Request();
    }

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param mixed $response
     */
    public function setResponse($response)
    {
        $this->response = $response;
    }


}
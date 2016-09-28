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
    private $currentRequest;

    public function handle( Request $request )
    {
        $routerResolver = new RouteResolver();

        return new Response( '<h1>ConfigLoader</h1>', 200 );
    }

    protected function callController(  )
    {
        
    }
}
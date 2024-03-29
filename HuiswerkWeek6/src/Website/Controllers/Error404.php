<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 30-09-2016 21:13
 */
declare(strict_types = 1);

namespace JorisRietveld\Website\Controllers;


use JorisRietveld\Website\Core\BaseController;
use JorisRietveld\Website\Interfaces\ControllerContract;
use Symfony\Component\HttpFoundation\Response;

class Error404 extends BaseController implements ControllerContract
{
    public function index()
    {
        $header = $this->loadedTemplate( 'header.html');
        $footer = $this->loadedTemplate( 'footer.html');

        return new Response( $header . '<h1>404 - page not found</h1>' . $footer, 200);
    }
}
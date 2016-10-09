<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 28-09-2016 13:49
 */
declare(strict_types = 1);

namespace JorisRietveld\Website\Controllers;


use JorisRietveld\Website\Interfaces\ControllerContract;
use Symfony\Component\HttpFoundation\Response;
use JorisRietveld\Website\Core\BaseController;

class Home extends BaseController implements ControllerContract
{
    public function index() : Response
    {
        return new Response($this->getWebPage(), 200);
    }

    protected function getWebPage()
    {
        $header = $this->loadedTemplate('header.html');
        $footer = $this->loadedTemplate('footer.html');

        $content = '
            <h1>Welkom op 127.0.0.1:80</h1>
            <div id="terminal">
            
            </div>
        ';

        return $header . $content . $footer;
    }
}
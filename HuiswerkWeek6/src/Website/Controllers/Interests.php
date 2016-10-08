<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 06-10-2016 06:37
 */
declare(strict_types = 1);

namespace JorisRietveld\Website\Controllers;


use JorisRietveld\Website\Core\BaseController;
use JorisRietveld\Website\Interfaces\ControllerContract;
use Symfony\Component\HttpFoundation\Response;

class Interests extends BaseController implements ControllerContract
{
    public function index()
    {
        return new Response( $this->getWebPage(), 200);
    }

    protected function getWebPage()
    {
        $header = $this->loadedTemplate('header.html');
        $footer = $this->loadedTemplate('footer.html');

        $main = '
            <h1>Mijn Hobbies</h1>
            <div class="row">
            <h3 class="col-lg-12">Tuinieren</h3>
            <p>Tuinieren enzo</p>
            <img src="images/garden6.jpg" class="hobby-img col-lg-6"/>
            <img src="images/garden7.jpg" class="hobby-img col-lg-6"/>
            </div>
                               
            
        ';

        return $header . $main . $footer;
    }
}
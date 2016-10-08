<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 06-10-2016 06:38
 */
declare(strict_types = 1);

namespace JorisRietveld\Website\Controllers;


use JorisRietveld\Website\Core\BaseController;
use JorisRietveld\Website\Interfaces\ControllerContract;
use Symfony\Component\HttpFoundation\Response;

class Contact extends BaseController implements ControllerContract
{
    public function index( $messages = '' )
    {
        $header = $this->loadedTemplate( 'header.html');
        $footer = $this->loadedTemplate( 'footer.html');

        return new Response( $header . '<h1>Contact</h1>' . $messages . $this->getForm() . $footer, 200);
    }

    public function handle()
    {
        return $this->index( '<h3 style="color: green">Je bericht is verstuurd</h3>' );
    }

    protected function getForm()
    {
        return <<<HTML
          <form action="contact-handle" method="post" style="width: 500px;">
          
          <div class="form-group">
            <label for="name">Naam:</label>
            <input class="form-control" id="form-name" name="form-name" placeholder="Bob"/>
           </div>
           
           <div class="form-group">
            <label for="email">E-mail adres:</label>
            <input class="form-control" id="form-email" name="form-email" placeholder="bob@nsa.gov"/>
            </div>
            
            <div class="form-group">
            <label for="form-message">Bericht:</label>
            <textarea class="form-control" id="form-message" name="form-message" placeholder="Text text en nog eens text..."></textarea>
            
            <br />
            <input type="submit" value="verstur" />
          </div>
          </form> 
HTML;
    }
}
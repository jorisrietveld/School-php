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
                <h3 class="col-lg-12">Programeren</h3>
                <p class="col-lg-12">
                In mijn vrije tijd ben ik veel aan het programeren. Vaak wat kleine projectjes of biblioteken voor problemen <br />
                waar ik vaak tegen aan loop. Op het moment ben ik het boek `hacking: the art of exploration` aan het door nemen<br/>
                en ben een simpele webserver aan het schrijven in C.<br/><br/>
                <code class="col-lg-12">
                <br/>
                  if( BeerBottle.empty() ){<br/>
                    &nbsp;&nbsp;&nbsp;Connection fridge = DriverManager.getConnection( "fridge://127.0.0.1", "root", "p@$$w0rd" );<br/>
                    &nbsp;&nbsp;&nbsp;Statement getBeerStatement = fridge.createStatement();<br/>
                    &nbsp;&nbsp;&nbsp;String beerQueryLanguage = ( "SELECT `bottle` FROM `fridge` WHERE temperature < 5 LIMIT 1";);<br/>
                    &nbsp;&nbsp;&nbsp;ResultSet beerBottle = getBeerStatement.executeQuery( beerQueryLanguage );<br/>
                    &nbsp;&nbsp;&nbsp;if( beerBottle.next() ){<br/>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return new BeerBottle( beerBottle.getString("brand") );<br/>
                    &nbsp;&nbsp;&nbsp;}<br/>
                  }<br/>
                  else{<br/>
                    &nbsp;&nbsp;&nbsp;while( BeerBottle.notEmpty ){<br/>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BeerBottle.consume();<br/>
                    &nbsp;&nbsp;&nbsp;}<br/>
                    &nbsp;&nbsp;&nbsp;return;<br/>
                  }<br/>
                </code>
                
                </p>
                
                <h3 class="col-lg-12">Tuinieren</h3>
                <p class="col-lg-12">
                  Voor dat ik linux ben gaan gebruiken als mijn bestuuring systeem had ik ook nog tijd andere hobbies zoals het kweken<br/>
                  van palmboomen, bannanen, bamboe en andere exoten.
                </p>
                <img src="images/garden6.jpg" class="hobby-img col-lg-6"/>
                <img src="images/garden7.jpg" class="hobby-img col-lg-6"/>
                
                <h3 class="col-lg-12">Fietsen</h3>
                <p class="col-lg-12">
                  Na een dag hopeloos proberen te begrijpen waarom mijn code niet compiled of je uren bezig bent geweest zonder success<br/>
                  om wireless dirvers te compilen voor je raspberry pi vind ik het een goed idee om de graphics buiten te gaan bekijken.<br/>
                  Ik fiets elk jaar wel een keer naar Brabant of doe een rondje Groningen (wedde -> Oudstatenzijl -> polen -> eemshave -> Groningen<br/>
                   stadskanaal -> wedde) foto\'s hier onder beschikbaar.
                </p>
                <div class="hobby-fiets">
                    <img src="images/rondje1.jpg" class="hobby-img-r col-lg-4"/>
                    <img src="images/rondje2.jpg" class="hobby-img-r col-lg-4"/>
                    <img src="images/rondje3.jpg" class="hobby-img-r col-lg-4"/>
                   
                    <img src="images/rondje4.jpg" class="hobby-img-r col-lg-4"/>
                    <img src="images/rondje5.jpg" class="hobby-img-r col-lg-4"/>
                    <img src="images/rondje6.jpg" class="hobby-img-r col-lg-4"/>
                </div>
            
            </div>
                               
            
        ';

        return $header . $main . $footer;
    }
}
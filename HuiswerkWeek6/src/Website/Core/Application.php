<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 16-09-2016 14:18
 */
declare(strict_types = 1);

namespace JorisRietveld\Website\Core;


class Application
{
    public function handle( HttpRequest $request )
    {
        return new HttpResponse( '<h1>HelloWorld</h1>', 200 );
    }
}
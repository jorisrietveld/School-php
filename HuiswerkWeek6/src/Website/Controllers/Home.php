<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 28-09-2016 13:49
 */
declare(strict_types = 1);

namespace Website\Controllers;


use Symfony\Component\HttpFoundation\Response;

class Home
{
    public function index()
    {
        return new Response('<h1>Home</h1>', 200);
    }
}
<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 17-09-2016 12:12
 */
declare(strict_types = 1);

namespace JorisRietveld\Website\Core;


use Symfony\Component\HttpFoundation\File\Exception\FileNotFoundException;

abstract class BaseController
{
    public function __construct()
    {
        
    }

    /**
     * @param $fileName
     * @return string
     */
    public function loadedTemplate( $fileName )
    {
        $templateFile = RESOURCES_DIR . 'views' . DIRECTORY_SEPARATOR . $fileName;

        if( file_exists( $templateFile ))
        {
            return file_get_contents( $templateFile );
        }
        throw new FileNotFoundException('The template file:' . $fileName . ' is not found!');
    }

    public function getConfiguration( $for )
    {
        $config = new ConfigLoader();
        return $config->get($for);
    }
}
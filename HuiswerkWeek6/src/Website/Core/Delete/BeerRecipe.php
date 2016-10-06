<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 30-09-2016 23:45
 */
declare(strict_types = 1);

namespace JorisRietveld\Website\Core\TemplateEngine;


use JorisRietveld\Website\Helper\TemplateRecursiveIterator;
use JorisRietveld\Website\Exceptions\DirectoryNotFoundException;

class BeerRecipe
{
    /**
     * The template directories that contain the templates.
     * @var
     */
    protected $waterSources;

    /**
     * Macro's to alter the rendering process.
     * @var
     */
    protected $hops;

    /**
     * The variables used in the templates.
     * @var
     */
    protected $yeast;

    /**
     * The rendered page, AKA the brewed pint.
     * @var
     */
    protected $keg;


    /**
     * Beer constructor. initialize an new ( hopefully ) tasteful beer recipe.
     */
    public function __construct( $sourceWater = [], $hops = [], $yeast = [], $brewRules =[] )
    {
        $this->waterSources = $sourceWater;
        $this->hops = $hops;
        $this->yeast = $yeast;
    }

    /**
     * When brewing your beer it is important to define the types of source water you use.
     * You can add the template directories where we can get good source water to start brewing.
     *
     * @param array $sourceWater
     */
    public function addWater( $sourceWater = [] )
    {
        $test = [
            ROOT_DIR . ''
        ];
    }

    /**
     * To complete your beer you need to add yeast to produce alcohol
     * Awesome lazy compiled original html ...
     * You can add environment variables that will be replaced in the templates.
     *
     * @param array $yeasts
     */
    public function addYeast( $yeasts = [] )
    {

    }

    /**
     * To give your beer an nice flavor you can add different hops so the beer tastes better.
     * You can add macro´s to alter the brewery process.
     *
     * @param array $hops
     */
    public function addHop( $hops = [] )
    {

    }

    /**
     * Try to brew an nice beer with the given recipe
     *
     * @return Beer
     */
    public function brew( $template = '' ) : Beer
    {
        return $this;
    }

    /**
     * The beer is finished go ahead an taste your masterpiece.
     * Return the rendered page.
     */
    public function taste()
    {

    }

    /**
     * Get all the files stored in an template directory.
     *
     * @param $templateDirectory
     * @return array
     */
    protected function searchForTemplates( $templateDirectory ) : array
    {
        if( !is_dir( $templateDirectory ) )
        {
            throw new DirectoryNotFoundException(
                'The template directory: ' . $templateDirectory . ' Does not exist or is not an directory'
            );
        }

        // Set settings to follow symlinks and ignore hidden files.
        $fileSystemIteratorSettings = [
            \FilesystemIterator::FOLLOW_SYMLINKS,
            \FilesystemIterator::SKIP_DOTS
        ];

        // Get an directory iterator for recursively iterating thu the files in given directory.
        $directoryIterator = new \RecursiveDirectoryIterator( $templateDirectory, $fileSystemIteratorSettings );

        // Create an filter for ignoring files that are not templates.
        $filterIterator = new \RecursiveCallbackFilterIterator( $directoryIterator, function ( $current, $key, $iterator ){

            // Enable recursion
            if( $iterator->hasChilderen() ){
                return TRUE;
            }
            // Check if it is an template file.
            return strpos( $current->getFileName(), '.html.beer' );
        });
        $filterIterator = new TemplateRecursiveIterator( $directoryIterator );
        $iterator = new \RecursiveIteratorIterator( $filterIterator );

        $templateFiles = glob( rtrim( $templateDirectory, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . '*.beer');
    }

}
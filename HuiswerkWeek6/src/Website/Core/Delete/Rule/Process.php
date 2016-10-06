<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 30-09-2016 23:58
 */
declare(strict_types = 1);

namespace JorisRietveld\Website\Core\TemplateEngine\Rule;


abstract class Process
{
    protected $keyword;
    protected $arguments;

    public function __construct( string $keyword = '', string $arguments = [] )
    {
        $this->keyword = $keyword;
        $this->arguments = $arguments;
    }

    /**
     * @return string
     */
    public function getKeyword()
    {
        return $this->keyword;
    }

    /**
     * @param string $keyword
     */
    public function setKeyword($keyword)
    {
        $this->keyword = $keyword;
    }

    /**
     * @return string
     */
    public function getArguments()
    {
        return $this->arguments;
    }

    /**
     * @param string $arguments
     */
    public function setArguments($arguments)
    {
        $this->arguments = $arguments;
    }


    
}
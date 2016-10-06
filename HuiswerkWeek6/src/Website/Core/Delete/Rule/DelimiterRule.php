<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 30-09-2016 23:50
 */
declare(strict_types = 1);

namespace JorisRietveld\Website\Core\TemplateEngine\Rule;


abstract class DelimiterRule
{
    protected $startDelimiter;
    protected $endDelimiter;

    public function __construct( string $startDelimiter = '', string $endDelimiter = '' )
    {
        $this->startDelimiter = $startDelimiter;
        $this->endDelimiter = $endDelimiter;
    }

    /**
     * @return string
     */
    public function getStartDelimiter()
    {
        return $this->startDelimiter;
    }

    /**
     * @param string $startDelimiter
     */
    public function setStartDelimiter($startDelimiter)
    {
        $this->startDelimiter = $startDelimiter;
    }

    /**
     * @return string
     */
    public function getEndDelimiter()
    {
        return $this->endDelimiter;
    }

    /**
     * @param string $endDelimiter
     */
    public function setEndDelimiter($endDelimiter)
    {
        $this->endDelimiter = $endDelimiter;
    }
    
    

    
}
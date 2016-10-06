<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 05-10-2016 22:17
 */
declare(strict_types = 1);

namespace JorisRietveld\Website\Core;


class VarReplacer
{
    protected $file;
    protected $variables;
    protected $startDelimiter;
    protected $endDelimiter;

    public function __construct()
    {
        $this->file = '';
        $this->variables = [];
        $this->startDelimiter = '{{';
        $this->endDelimiter = '}}';
        
    }

    public function replace( string $file = '', array $variables =[] ) : string
    {
        $this->file = strlen( $file ) < 1 ? $this->file : $file;
        $this->variables = count( $variables ) < 1 ? $this->variables : $variables;

        
        return $file;
    }

    public function setFile( string $file ) : self
    {
        $this->file = $file;
        return $this;
    }

    public function getFile() : string
    {
        return $this->file;
    }

    public function setVariables( array $variables = [] ) : self
    {
        $this->variables = $variables;
        return $this;
    }

    public function getVariables() : array
    {
        return $this->variables;
    }

    public function setStartDelimiter( string $startDelimiter ) : self
    {
        $this->startDelimiter = $startDelimiter;
        return $this;
    }

    public function getStartDelimiter() : string
    {
        return $this->startDelimiter;
    }

    public function setEndDelimiter( string $endDelimiter ) : self
    {
        $this->endDelimiter = $endDelimiter;
        return $this;
    }

    public function getEndDelimiter() : string
    {
        return $this->endDelimiter;
    }
}
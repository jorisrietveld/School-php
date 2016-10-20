<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 17-09-2016 19:19
 */
declare(strict_types = 1);

class MakeLoop
{
    protected $firstChar = '*&nbsp;';
    protected $secondChar = '&nbsp;&nbsp;';

    public function makeStairs( int $width, int $stepSize, string $firstChar = '', string $secondChar = '')
    {
        $this->firstChar = strlen($firstChar) ? $firstChar : $this->firstChar;
        $this->secondChar = strlen($secondChar) ? $secondChar : $this->secondChar;

        if( $stepSize > $width )
        {
            throw new LogicException( "Ow yea your step size is bigger than you with of the stairs." );
        }

        for( $outerCounter = 1; $outerCounter < $width; $outerCounter++ )
        {
            $output = '';

            for( $innerCounter = 1; $innerCounter < $width*2; $innerCounter++ )
            {
                $output .= $innerCounter <= ( $outerCounter*$stepSize ) ? $this->firstChar : $this->secondChar;
            }
            yield $output.'<br>'.$output;

            yield '<br>';
        }
    }

    public function sidePyramid( int $maxWidth, string $firstChar, $secondChar )
    {
        
    }

    /**
     * @return mixed
     */
    public function getFirstChar() : string
    {
        return $this->firstChar;
    }

    /**
     * @param mixed $firstChar
     * @return MakeLoop
     */
    public function setFirstChar( string $firstChar ) : self
    {
        $this->firstChar = $firstChar;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastChar() : string
    {
        return $this->lastChar;
    }

    /**
     * @param mixed $lastChar
     * @return MakeLoop
     */
    public function setLastChar( string $lastChar ) : self
    {
        $this->lastChar = $lastChar;
        return $this;
    }


}
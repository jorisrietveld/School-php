<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 17-09-2016 19:19
 */
declare(strict_types = 1);

class MakeLoop
{
    public function opdracht1( $width )
    {
        for( $i = 1; $i < $width; $i++ )
        {
            for( $a = 1; $a < $width; $a++ )
            {
                yield ( $a > $width - ($i+1) ) ? '*&nbsp;':'&nbsp;&nbsp;';
            }
            yield '<br/>';
        }
    }

    public function opdracht2( $width )
    {
        for( $i = 0; $i < $width; $i++ )
        {
            for( $a = 0; $a < $width; $a++ )
            {
                yield ( $a < $width - $i ) ? '*&nbsp;':'&nbsp;&nbsp;';
            }
            yield '<br/>';
        }
    }
}
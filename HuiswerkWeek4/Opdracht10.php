<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 11-09-2016 08:33
 */

function opdracht1( $width )
{
    $fOutput = '';
    for ($a = 0; $a < $width; $a++)
    {
        $mem = $width;
        for ($b = 0; $b < $width; $b++)
        {
            if ($mem <= $width - $a)
            {
                $fOutput .= ' ';
            }
            else
            {
                $fOutput .= '* ';
            }
            $mem--;
        }
        $fOutput .= '<br/>';
    }

    return $fOutput;
}

echo opdracht1( 5 );
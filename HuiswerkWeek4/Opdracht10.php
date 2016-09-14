<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 11-09-2016 08:33
 */

function loopSom( $max )
{
    $total = 0;

    for($i=1; $i < ($max+1); $i++)
    {
        printf('Iteration: %d Total: %d<br>', $i, $total);
        $total += $i;
    }
    return $total   ;
}

echo 'Final: '.loopSom(99);

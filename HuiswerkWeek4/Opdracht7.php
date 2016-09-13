<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 11-09-2016 08:33
 */
function forLoopArt( $width )
{
    $funcOutput = '';

    for( $i=0; $i < $width; $i++ )
    {
        for( $b = 0; $b < $i; $b++ )
        {
            $funcOutput .= '* ';
        }
        $funcOutput .= '<br/>';
    }

    return $funcOutput;
}

function whileLoopArt( $width  )
{
    $funcOutput = '';
    $fCounter = 0;

    while ( $fCounter < $width ){
        $counter = 0;
        while ( $counter < $fCounter )
        {
            $funcOutput .= '* ';
            $counter++;
        }
        $funcOutput .= '<br />';
        $fCounter++;
    }

    return $funcOutput;
}

function whileDoArt( $width )
{
    $funcOutput = '';
    $fCounter = 1;

    do{
        $counter = 0;
        do{
            $funcOutput .= '* ';
            $counter++;
        }while( $counter < $fCounter );
        $funcOutput .= '<br />';
        $fCounter++;
    }while( $fCounter < $width );


    return $funcOutput;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Control flow</title>
    <link rel="stylesheet" type="text/css" href="styles.css"/>
</head>
<body>

<div id="tests">
    <div class="triangle-tests">
        For loop: <br/> <?= forLoopArt( 11 ) ?>
    </div>
    <div class="triangle-tests">
    While loop:<br/> <?= whileLoopArt( 11 ) ?>
    </div>
    <div class="triangle-tests">
        While do:<br/><br/> <?= whileDoArt( 11 ) ?>
    </div>
</div>
<br />

<fieldset id="code">
    <legend>Source code: Opdracht7.php</legend>
    <?= highlight_file('Opdracht7.php', true ) ?>
</fieldset>

</body>
</html>


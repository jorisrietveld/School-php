<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 11-09-2016 08:32
 */

function forLoopArt( $height, $width )
{
    $funcOutput = '';

    for( $x=0; $x < $height; $x++ ){
        for( $q = 0; $q < $width; $q++ )
        {
            $funcOutput .= '* ';
        }
        $funcOutput .= '<br>';
    }


    return $funcOutput;
}

function whileLoopArt( $height, $width  )
{
    $funcOutput = '';
    $counter = 0;
    $fCounter = 0;

    while ( $fCounter < $height ){
        while ( $counter < $width )
        {
            $funcOutput .= '* ';
            $counter++;
        }
        $funcOutput .= '<br />';
        $fCounter++;
    }

    return $funcOutput;
}

function whileDoArt( $height, $width  )
{
    $funcOutput = '';
    $counter = 0;
    $fCounter = 0;

    do{
        do{
            $funcOutput .= '* ';
            $counter++;
        }while( $counter < $width );
        $funcOutput .= '<br />';
        $fCounter++;
    }while( $fCounter < $height );


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
    For loop: <br/> <?= forLoopArt(5, 10) ?><br />
    While loop:<br/> <?= whileLoopArt(5, 10) ?><br />
    While do:<br/> <?= whileDoArt(5, 10) ?><br />
</div>

<br />
<fieldset id="code">
    <legend>Source code: Opdracht5.php</legend>
    <?= highlight_file('Opdracht5.php', true ) ?>
</fieldset>

</body>
</html>


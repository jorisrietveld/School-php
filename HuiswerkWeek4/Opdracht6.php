<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 11-09-2016 08:32
 */
declare(strict_types=1);

function forLoopArt( $height, $width )
{
    $funcOutput = '';
    for( $x=0; $x < $height; $x++ )
    {
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
    $fCounter = 0;
    while ( $fCounter < $height )
    {
        $counter = 0;
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
    $fCounter = 0;
    do
    {
        $counter = 0;
        do
        {
            $funcOutput .= '* ';
            $counter++;
        }
        while( $counter < $width );
        $funcOutput .= '<br />';
        $fCounter++;
    }
    while( $fCounter < $height );


    return $funcOutput;
}

try
{
    $firstLoop = forLoopArt(5, 10 );
    $secondLoop = whileLoopArt(5, 10 );
    $thirdLoop = whileDoArt( 5, 10 );
}
catch( Exception $e )
{
    var_dump($e);
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
    For loop: <br/> <?= $firstLoop ?><br />
    While loop:<br/> <?= $secondLoop ?><br />
    While do:<br/> <?= $thirdLoop ?><br />
</div>

<br />
<fieldset id="code">
    <legend>Source code: Opdracht6.php</legend>
    <?= highlight_file('Opdracht6.php', true ) ?>
</fieldset>

</body>
</html>


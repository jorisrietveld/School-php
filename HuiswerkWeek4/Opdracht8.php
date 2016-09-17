<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 11-09-2016 08:33
 */
declare(strict_types=1);

function forLoopArt( $width )
{
    $functionOutput = '';
    for( $i = 0; $i < $width; $i++ )
    {
        for( $e = 0; $e < $width-$i; $e++ )
        {
            $functionOutput .= '* ';
        }
        $functionOutput .= '<br>';
    }
    return $functionOutput;
}

function whileLoopArt( $width )
{
    $functionOutput = '';
    $counter = 0;
    while ( $counter < $width )
    {
        $innerCounter = 0;
        while ( $innerCounter <  $width - $counter )
        {
            $functionOutput .= '* ';
            $innerCounter++;
        }
        $functionOutput .= '<br/>';
        $counter++;
    }
    return $functionOutput;
}

function doWhileLoopArt( $width )
{
    $functionOutput = '';
    $counter = 0;
    do
    {
        $innerCounter = 0;
        do{
            $functionOutput .= '* ';
            $innerCounter++;
        }
        while($innerCounter < $width - $counter );
        $functionOutput .= '<br/>';
        $counter++;
    }
    while( $counter < $width );
    return $functionOutput;
}

try
{
    $firstLoop = forLoopArt( 10 );
    $secondLoop = whileLoopArt( 10 );
    $thirdLoop = doWhileLoopArt( 10 );
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
    <div class="triangle-tests">
        For loop: <br/> <?= $firstLoop ?>
</div>
<div class="triangle-tests">
    While loop:<br/> <?= $secondLoop ?>
</div>
<div class="triangle-tests">
    While do:<br/> <?= $thirdLoop ?>
</div>
</div>
<br />

<fieldset id="code">
    <legend>Source code: Opdracht8.php</legend>
    <?= highlight_file('Opdracht8.php', true ) ?>
</fieldset>

</body>
</html>


<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 11-09-2016 08:32
 */

declare(strict_types=1);

function forLoopArt( int $iterations ) : string
{
    $funcOutput = '';
    for( $q = 0; $q < $iterations; $q++ )
    {
         $funcOutput .= '* ';
    }
    return $funcOutput;
}

function whileLoopArt( int $iterations ) : string
{
    $funcOutput = '';
    $counter = 0;
    while ( $counter < $iterations )
    {
        $funcOutput .= '* ';
        $counter++;
    }
    return $funcOutput;
}

function whileDoArt( int $iterations ) : string
{
    $funcOutput = '';
    $counter = 0;
    do
    {
        $funcOutput .= '* ';
        $counter++;
    }
    while( $counter < $iterations );
    return $funcOutput;
}

try
{
    $firstLoop = forLoopArt( 10 );
    $secondLoop = whileLoopArt( 10 );
    $thirdLoop = whileDoArt( 10 );
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
    For loop:   <?= $firstLoop ?><br />
    While loop: <?= $secondLoop ?><br />
    While do:   <?= $thirdLoop ?><br />
</div>

<br />
<fieldset id="code">
    <legend>Source code: Opdracht5.php</legend>
    <?= highlight_file('Opdracht5.php', true ) ?>
</fieldset>

</body>
</html>


<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 11-09-2016 08:32
 */

function forLoopArt( $iterations )
{
    $funcOutput = '';

    for( $q = 0; $q < $iterations; $q++ )
    {
         $funcOutput .= '* ';
    }

    return $funcOutput;
}

function whileLoopArt( $iterations )
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

function whileDoArt( $iterations )
{
    $funcOutput = '';
    $counter = 0;

    do{
        $funcOutput .= '* ';
        $counter++;
    }while( $counter < $iterations );

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
    For loop:   <?= forLoopArt(10) ?><br />
    While loop: <?= whileLoopArt(10) ?><br />
    While do:   <?= whileDoArt(10) ?><br />
</div>

<br />
<fieldset id="code">
    <legend>Source code: Opdracht5.php</legend>
    <?= highlight_file('Opdracht5.php', true ) ?>
</fieldset>

</body>
</html>


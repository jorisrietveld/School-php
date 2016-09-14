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
        for ($b = 0; $b < $width; $b++)
        {
            if( ($width - $a)-2 < $b  )
            {
                $fOutput .= '*&nbsp;&nbsp;';
            }
            else
            {
                $fOutput .='&nbsp;&nbsp;&nbsp;';
            }
        }
        $fOutput .= '<br/>';
    }
    return $fOutput;
}
function opdracht2( $width )
{
    $fOutput = '';
    for ($a = 0; $a < $width; $a++)
    {
        for ($b = 0; $b < $width; $b++)
        {
            if( ($width - $a)-2 < $b  )
            {
                $fOutput .='&nbsp;&nbsp;&nbsp;';
            }
            else
            {
                $fOutput .= '*&nbsp;&nbsp;';
            }
        }
        $fOutput .= '<br/>';
    }
    return $fOutput;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Control flow</title>
    <link rel="stylesheet" type="text/css" href="styles.css"/>
    <style>
        *{
            font-family:"Ubuntu Mono";
        }
    </style>
</head>
<body>

<div id="tests">
    <div class="triangle-tests">
        Opdracht1<br/><?= opdracht1( 10 ) ?>
    </div>
    <div class="triangle-tests">
        Opdracht2<br/><?= opdracht2( 11 ) ?>
    </div>
    <div class="triangle-tests">
        Opdracht3<br/>
    </div>
</div>
<br />

<fieldset id="code">
    <legend>Source code: Opdracht8.php</legend>
    <?= highlight_file('Opdracht8.php', true ) ?>
</fieldset>

</body>
</html>



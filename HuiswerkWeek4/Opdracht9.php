<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 11-09-2016 08:33
 */
declare(strict_types=1);

function tableGenerator( int $width ) : Iterator
{
    for( $i =0; $i < $width; $i++)
    {
        for( $b = 0; $b < $width; $b++ )
        {
            yield ($b+$i)%10 . '&nbsp;&nbsp;';
        }
        yield '<br>';
    }
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
        Opdracht1<br/>
        <?php
            foreach ( tableGenerator(30) as $item )
            {
                echo $item;
            }
        ?>
    </div>
    </div>
</div>
<br />

<fieldset id="code">
    <legend>Source code: Opdracht9.php</legend>
    <?= highlight_file('Opdracht9.php', true ) ?>
</fieldset>

</body>
</html>



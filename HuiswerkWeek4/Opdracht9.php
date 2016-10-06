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
        * {
            font-family: "Ubuntu Mono";
        }
        body{
            background-color: black;
        }
        #tests, .triangle-tests{
            width: 1000px;
            color:#4cae4c;
        }
    </style>
</head>
<body>

<div id="tests">
    <div class="triangle-tests">
        <h2 class="wake-up">Opdracht 9</h2><br/>
        <?php
            foreach ( tableGenerator(10) as $item )
            {
                echo $item;
            }
        ?>
    </div>
</div>

<fieldset style="top: 20px; position: relative" id="code">
    <legend style="color: #4cae4c; background-color: black">Source code: Opdracht9.php</legend>
    <?= highlight_file('Opdracht9.php', true ) ?>
</fieldset>

</body>
</html>



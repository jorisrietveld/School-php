<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 17-09-2016 19:19
 */

require 'src' . DIRECTORY_SEPARATOR . 'MakeLoop.php';
$loop = new MakeLoop();

?>
<!DOCTYPE html>
<html lang="EN">
<head>
    <meta charset="UTF-8"/>
    <title>Loops</title>
    <link href="css/styles.css" rel="stylesheet" type="text/css"/>
</head>
<body>

<div class="container">

    <div class="row">
        <div class="col-4">
            <h3>Stairs</h3>
            <?php
            foreach ( $loop->makeStairsIterator( 10, 2 ) as $output ){
                echo $output;
            }
            ?>
        </div>

        <div class="col-4">
            <h3>Sideway piramid</h3>
            <?= $loop->makeLeftPyramid( 9, '+&nbsp;', '-&nbsp;' ) ?>
        </div>

        <div class="col-4">
            <h3>Saw teeth</h3>
            <?= $loop->makeLeftTopSaw( 9, 2, '*&nbsp', '&nbsp;&nbsp;' ) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-4">
            <h3>Matrix</h3>
            <?= $loop->makeTheMatrix( 20, 15 ) ?>
        </div>

        <div class="col-4">
            <h3>Triangle bottom left</h3>
            <?= $loop->makeBottomLeftTriangle( 20 ) ?>
        </div>

        <div class="col-4">
            <h3>Simple stairs</h3>
            <?= $loop->makeStairsSimple( 15, '*&nbsp;*&nbsp;', '&nbsp;&nbsp;&nbsp;&nbsp;' ) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-4">
            <h3>Triangle top left</h3>
            <?= $loop->makeTopLeftTriangle( 15, '*&nbsp;', '&nbsp;&nbsp;' ) ?>
        </div>

        <div class="col-4">
            <h3>Triangle bottom left</h3>
            <?= $loop->makeTopLeftTriangle( 15 ) ?>
        </div>

        <div class="col-4">
            <h3>Simple stairs</h3>
            <?= $loop->makeTopLeftTriangle( 15 ) ?>

        </div>
    </div>

</div>
</body>
</html>

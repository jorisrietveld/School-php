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
    <div class="col-4">
        <h3>Stairs</h3>
        <?php
        foreach ( $loop->makeStairs( 10, 2 ) as $output )
        {
            echo $output;
        }
        ?>
    </div>

    <div class="col-4">
        <h3>Sideway piramid</h3>

    </div>

    <div class="col-4">
        <h3>Pentagram</h3>

    </div>

</div>
</body>
</html>

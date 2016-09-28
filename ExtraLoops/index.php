<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 17-09-2016 19:19
 */

require 'src' . DIRECTORY_SEPARATOR . 'MakeLoop.php';

?>
<!DOCTYPE html>
<html>
<head>
<style>
    *{
        font-family: "Ubuntu Mono";
    }
</style>
</head>
<body>
<?php
    foreach ( (new MakeLoop())->opdracht1(10) as $functionOutput )
    {
        echo $functionOutput;
    }

foreach ( (new MakeLoop())->opdracht2(10) as $functionOutput )
{
    echo $functionOutput;
}
?>
</body>
</html>

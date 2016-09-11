<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 11-09-2016 08:31
 */

function lessthanOrGreaterThan( $number )
{
    if( $number > 100 )
    {
        return $number." is greater than 100";
    }else{
        return $number . " is less than or equal to 100";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Functies</title>
    <link rel="stylesheet" type="text/css" href="styles.css"/>
</head>
<body>
<fieldset id="code">
    <legend>Source code: Opdracht2.php</legend>
    <?= highlight_file('Opdracht2.php', true ) ?>
</fieldset>

</body>
</html>


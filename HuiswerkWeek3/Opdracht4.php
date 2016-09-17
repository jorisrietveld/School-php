<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 11-09-2016 08:32
 */
declare(strict_types=1);

$fruits = [
    'melon',
    'banana',
    'orange',
    'apple',
    'apricot'
];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Functies</title>
    <link rel="stylesheet" type="text/css" href="styles.css"/>
</head>
<body>
<div style="width: 500px;" class="center" id="foreach-output">
<?php

foreach( $fruits as $key => $fruit )
{
    echo '<strong>Current array key:</strong> '.  $key . ' <strong>Current fruity value: </strong>' .  $fruit .  '<br />';
}

?>
</div>

<fieldset id="code">
    <legend>Source code: Opdracht4.php</legend>
    <?= highlight_file('Opdracht4.php', true ) ?>
</fieldset>

</body>
</html>

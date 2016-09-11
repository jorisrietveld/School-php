<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 06-09-2016 13:44
 */

function CelsiusToFahrenheitConverter( $celsius )
{
    return ($celsius * 9/5) + 32;
}

// Calculate the degrees fahrenheit inputted by the user or the initialization value so it can be displayed later.
$fahrenheit = round( empty($_POST['celsius']) ? CelsiusToFahrenheitConverter(0) : CelsiusToFahrenheitConverter( $_POST['celsius']), 2);

// Check whether the user has inputted the degrees celsius if not set it to an default value.
$celsius = empty( $_POST['celsius']) ? 0 : $_POST['celsius'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Celsius to fahrenheit</title>
    <link rel="stylesheet" type="text/css" href="styles.css"/>
</head>
<body>

<form method="post" action="Opdracht4.php">
    <fieldset id="form-wrapper">
        <legend>Celsius to fahrenheit converter</legend>
        <label for="form-input-fahrenheit">&#8451;</label>
        <input type="number" id="form-input-fahrenheit" name="celsius" value="<?= $celsius ?>"/>
        &asymp;
        <label for="form-output-celcius">&#8457;</label>
        <input type="text" id="form-output-celcius" aria-disabled="true" value="<?= $fahrenheit ?>"/>
        <button type="submit">Convert</button>
    </fieldset>
</form>

<fieldset id="code">
    <legend>Source code: Opdracht4.php</legend>
    <?= highlight_file('Opdracht4.php', true ) ?>
</fieldset>

</body>
</html>

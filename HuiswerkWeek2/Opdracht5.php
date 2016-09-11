<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 06-09-2016 13:44
 */

function fahrenheitToCelsiusConverter( $fahrenheit )
{
    return ($fahrenheit - 32) * 5/9;
}

$celcius = round( empty($_POST['fahrenheit'])? fahrenheitToCelsiusConverter(0) : fahrenheitToCelsiusConverter( $_POST['fahrenheit']), 2);
$farenheit = empty( $_POST['fahrenheit']) ? 0 : $_POST['fahrenheit'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Fahrenheit to celcius</title>
    <link rel="stylesheet" type="text/css" href="styles.css"/>
</head>
<body>

<form method="post" action="Opdracht5.php">
    <fieldset id="form-wrapper">
        <legend>Fahrenheit to celcius converter</legend>
        <label for="form-input-fahrenheit">&#8457;</label>
        <input type="number" id="form-input-fahrenheit" name="fahrenheit" value="<?= $farenheit ?>"/>
        &asymp;
        <label for="form-output-celcius">&#8451;</label>
        <input type="text" id="form-output-celcius" aria-disabled="true" value="<?= $celcius ?>"/>
        <button type="submit">Convert</button>
    </fieldset>
</form>

<fieldset id="code">
    <legend>Source code: Opdracht5.php</legend>
    <?= highlight_file('Opdracht5.php', true ) ?>
</fieldset>

</body>
</html>

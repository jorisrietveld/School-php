<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 11-09-2016 08:24
 */
function centsToEurosConverter( $cents )
{
    return $cents / 100;
}
$euros = empty($_POST['cents'])? centsToEurosConverter(0) : centsToEurosConverter( $_POST['cents']);
$cents = empty( $_POST['cents']) ? 0 : $_POST['cents'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Cents to euros</title>
    <link rel="stylesheet" type="text/css" href="styles.css"/>
</head>
<body>

<form method="post" action="Opdracht7.php">
    <fieldset id="form-wrapper">
        <legend>Centers to euros converter</legend>
        <label for="form-input-fahrenheit">&cent;</label>
        <input type="number" min="0" step="1" id="form-input-fahrenheit" name="cents" value="<?= $cents ?>"/>
        &equals;
        <label for="form-output-celcius">&euro;</label>
        <input type="text" id="form-output-celcius" aria-disabled="true" value="<?= number_format($euros, 2, '.', '') ?>"/>
        <button type="submit">Convert</button>
    </fieldset>
</form>

<fieldset id="code">
    <legend>Source code: Opdracht7.php</legend>
    <?= highlight_file('Opdracht7.php', true ) ?>
</fieldset>

</body>
</html>
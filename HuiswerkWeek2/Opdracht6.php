<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 11-09-2016 08:24
 */
function eurosToCentsConverter( $euros )
{
    return $euros * 100;
}
$cents = empty($_POST['euros'])? eurosToCentsConverter(0) : eurosToCentsConverter( $_POST['euros']);
$euros = empty( $_POST['euros']) ? 0 : $_POST['euros'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Euros to cents</title>
    <link rel="stylesheet" type="text/css" href="styles.css"/>
</head>
<body>

<form method="post" action="Opdracht6.php">
    <fieldset id="form-wrapper">
        <legend>Euros to cents converter</legend>
        <label for="form-input-fahrenheit">&euro;</label>
        <input type="number" min="0" step="0.01" id="form-input-fahrenheit" name="euros" value="<?= number_format($euros, 2, '.', ',')?>"/>
        &equals;
        <label for="form-output-celcius">&cent;</label>
        <input type="text" id="form-output-celcius" aria-disabled="true" value="<?= $cents ?>"/>
        <button type="submit">Convert</button>
    </fieldset>
</form>

<fieldset id="code">
    <legend>Source code: Opdracht6.php</legend>
    <?= highlight_file('Opdracht6.php', true ) ?>
</fieldset>

</body>
</html>
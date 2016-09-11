<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 11-09-2016 08:24
 */

$datum = 14062016;

// First move the comma 6 decimal places then remove all decimals.
$dag = $datum / 1000000 % 1000000;

// First move the comma 4 decimal places then remove the leading day numbers.
$maand = ( $datum / 10000 ) % $dag;

// Remove everything bigger as 99999
$jaar = $datum % 10000;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Euros to cents</title>
    <link rel="stylesheet" type="text/css" href="styles.css"/>
</head>
<body>
<table id="form-wrapper" style="width: 600px">
    <thead>
        <tr>
            <th>Variable naam</th>
            <th>Formule</th>
            <th>Andwoord</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>$dag</td>
            <td>$dag = $datum / 1000000 % 1000000;</td>
            <td><?= $dag ?></td>
        </tr>
        <tr>
            <td>$maand</td>
            <td>$maand = ( $datum / 10000 ) % $dag;</td>
            <td><?= $maand ?></td>
        </tr>
        <tr>
            <td>$jaar</td>
            <td>$jaar = $datum % 10000;</td>
            <td><?= $jaar?></td>
        </tr>
    </tbody>
</table>

<br />

<fieldset id="code">
    <legend>Source code: Opdracht8.php</legend>
    <?= highlight_file('Opdracht8.php', true) ?>
</fieldset>

</body>
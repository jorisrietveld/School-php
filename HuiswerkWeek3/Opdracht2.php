<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 11-09-2016 08:31
 */

function numberToStringWithIfElse($grade)
{
    if ($grade < 1 || $grade > 10) {
        return "Ongeldig cijfer";
    } elseif ($grade >= 1 && $grade <= 3) {
        return "Zeer slecht";
    } elseif ($grade >= 4 && $grade <= 5) {
        return "Onvoldoende";
    } elseif ($grade >= 6 && $grade <= 7) {
        return "Voldoende";
    } elseif ($grade == 8) {
        return "Goed";
    } elseif ($grade == 9) {
        return "Zeergoed";
    } else {
        return "uitmuntend";
    }
}

function numberToStringWithSwitch($grade)
{
    switch ($grade) {
        case 1;
        case 2;
        case 3;
            return "Zeer slecht";

        case 4;
        case 5;
            return "Onvoldoende";

        case 6;
        case 7;
            return "Voldoende";

        case 8;
            return "Goed";

        case 9;
            return "Zeergoed";

        case
        10;
            return "uitmuntend";

        default:
            return "Ongeldig cijfer";
    }
}

// Generate table 1
$table1 = '<table cellpadding="0" cellspacing="0"><thead><tr><th colspan="2">Test with if/else control flow</th> </tr><tr><th>Tested grade:</th><td>Text representation</td></tr></thead><tbody>';
for ($a = 0; $a <= 11; $a++) {
    $table1 .= '<tr><td>'.$a.'</td><td>'.numberToStringWithIfElse($a).'</td>';
}
$table1 .= '</tbody></table>';

// Generate table 2
$table2 = '<table style="margin-left: 50px" cellpadding="0" cellspacing="0"><thead><tr><th colspan="2">Test with switch control flow</th> </tr><tr><th>Tested grade:</th><td>Text representation</td></tr></thead><tbody>';
for ($a = 0; $a <= 11; $a++) {
    $table2 .= '<tr><td>'.$a.'</td><td>'.numberToStringWithIfElse($a).'</td>';
}
$table2 .= '</tbody></table>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Control flow</title>
    <link rel="stylesheet" type="text/css" href="styles.css"/>
</head>
<body>

<div id="tests">
    <?= $table1 ?>
    <?= $table2 ?>
</div>

<br />
<fieldset id="code">
    <legend>Source code: Opdracht1.php</legend>
    <?= highlight_file('Opdracht1.php', true ) ?>
</fieldset>

</body>
</html>
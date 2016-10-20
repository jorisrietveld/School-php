<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 11-09-2016 08:34
 */
function prossessWords( array $words ) : array
{
    $nArray = [];
    $counter = 0;
    foreach ( $words as $word )
    {
        if( strlen( $word ) >= 4 )
        {
            $firstChar = $word[0];
            $lastChar = $word[ (strlen($word)-1) ];
            $word = '<span class="first">'.$lastChar. '</span>' . substr($word, 1, -1 ) . '<span class="last">' . $firstChar . '</span>';
        }
        $nArray[$counter] = $word;
        $counter++;
    }
    return $nArray;
}

function parsePost() : string
{
    $counter = 0;
    $return = '';
    $words = explode(' ', trim( htmlentities( $_POST['form-input-text'], ENT_QUOTES, 'UTF-8') ));
    $newWords = prossessWords($words);

    foreach ($newWords as $word )
    {
        $return .= $word . '&nbsp;--&nbsp;' . $words[$counter] . '<br/>';
        $counter++;
    }
    return $return;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>First letter to last converter</title>
    <link rel="stylesheet" type="text/css" href="styles.css"/>
</head>
<body>
<form method="post" action="Opdracht1.php">
    <fieldset class="form-wrapper">
        <legend>Opdracht 1</legend>
        <label for="form-input-text">Type je text hier:</label>
        <br/>
        <textarea name="form-input-text" placeholder="Type your text here...">
            <?= !empty( $_POST['form-input-text']) ? $_POST['form-input-text'] : '' ?>
        </textarea>
        <input type="submit" value="Formulier verzender"/>
    </fieldset>
    <fieldset class="form-wrapper">
        <legend>Output:</legend>
        <?php
        echo !isset($_POST['form-input-text']) ?'': parsePost();
        ?>
    </fieldset>
</form>

<fieldset id="code">
    <legend>Source code: Opdracht1.php</legend>
    <?= highlight_file('Opdracht1.php', true ) ?>
</fieldset>

</body>
</html>

<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 11-09-2016 08:34
 */

/**
 * Function that reformat the case in words.
 * @param array $words
 * @return Iterator
 */
function prossessWords( array $words ) : Iterator
{
    foreach ($words as $word) {
        // Is only the first character in upper case ?: convert to lower
        if (ctype_upper(substr($word, 0, 1)) && ctype_lower((substr($word, 1, strlen($word))))) {
            yield $word;
        } else {
            yield strtolower($word);

        }
    }
}

/**
 * Function that handles the form
 * @return string
 */
function parsePost() : string
{
    $return = '';
    // Parse the post data in an array.
    $words = explode(' ', trim( htmlentities( $_POST['form-input-text'], ENT_QUOTES, 'UTF-8')));

    foreach ( prossessWords( $words) as $word )
    {
        $return .= $word . '&nbsp;';
    }
    return $return;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Case converter</title>
    <link rel="stylesheet" type="text/css" href="styles.css"/>
</head>
<body>
<form method="post" action="Opdracht2.php">
    <fieldset class="form-wrapper">
        <legend>Opdracht 2</legend>
        <label for="form-input-text">Type je text hier:</label>
        <br/>
        <textarea name="form-input-text" placeholder="Type your text here...">

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
    <legend>Source code: Opdracht2.php</legend>
    <?= highlight_file('Opdracht2.php', true ) ?>
</fieldset>

</body>
</html>

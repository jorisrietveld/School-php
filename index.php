<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 11-09-2016 10:32
 */

function getFileList()
{
    $ignore = [
        'autoload.php'
    ];

    $html = '';
    $directories = array_filter(glob('*'), 'is_dir');

    foreach ($directories as $directory)
    {
        $html .= '<h3>' . $directory . '</h3>';

        $currentPath = $directory . DIRECTORY_SEPARATOR;
        $files = array_diff( glob($currentPath . '*.php'), $ignore);

        $html .= '<ul>';

        foreach ($files as $file) {
            $html .=  '<li><a href="' . $file . '">' . basename(rtrim($file, '.php')) . '</a></li>';
        }

        $html .= '</ul>';
    }
    return $html;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>PHP school opdrachten</title>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" type="text/css" href="styles.css"/>
</head>
<body>
<div id="page-wrapper">
    <h1>PHP1-opdrachten</h1>
    <div id="menu-wrapper">
        <?= getFileList() ?>
    </div>
</div>
</body>
</html>
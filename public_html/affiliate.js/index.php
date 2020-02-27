<?php

header('Content-Type: application/x-javascript');

$templates = require_once(__DIR__ . '/templates.php');


$referral = $_GET['r'];
$tem = $_GET['t'];
if (empty($tem)) {
    $tem = 'basic';
}

if (empty($referral)) {
    exit;
}
$template = $templates[$tem];
$height = empty($_GET['h'])? $template['height']: intval($_GET['h']);
$width =  empty($_GET['w'])? $template['width']: intval($_GET['w']);
$target = 'https://investing.test';
$target .= '?ref='.$referral;




if ($template['type'] == 'image') {
    echo sprintf("document.write('<a href=\"%s\" target=\"_top\"  ><img src=\"%s\"/ width=\"%s\" height=\"%s\"></a>')", $target, $template['file'], $width, $height);
    exit;
} elseif ($template['type'] == 'iframe') {
    echo sprintf("document.write('<iframe src=\"%s\" frameborder=\"0\" scrolling=\"no\" width=\"%s\" height=\"%s\" style=\"border:solid 1px #999;\"></iframe>')", $template['file'], $width, $height);

    exit;
}
exit;

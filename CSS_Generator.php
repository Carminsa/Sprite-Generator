#!/usr/bin/php
<?php


function read_files($folder, &$tab)
{
    if ($handle = opendir($folder)) {

        while (false !== ($file = readdir($handle))) {
            if ($file == '.' || $file == '..') continue;
            if (is_dir($folder . "/" . $file)) {
                read_files($folder . "/" . $file, $tab);
            }
            else if (strrpos($file, '.png') > -1) {
                array_push($tab, $folder . "/" . $file);
            }
        }
    }
}
function getSizeOfSprite($tab) {

    $totalLargeur = 0;
    $maxHauteur = [];

    for ($i = 0; $i < count($tab); $i++) {
        $tmp = getimagesize($tab[$i]);
        $totalLargeur += $tmp[0];
        array_push($maxHauteur, $tmp[1]);
    }
    $maxHauteurValue = max($maxHauteur);
    $sprite = imagecreatetruecolor($totalLargeur, $maxHauteurValue);
    imagealphablending($sprite, false);
    $col=imagecolorallocatealpha($sprite,255,255,255,127);
    imagefilledrectangle($sprite,0,0,$totalLargeur, $totalLargeur,$col);
    imagealphablending($sprite,true);


    create_sprite($tab, $sprite);
}


function create_sprite(&$tab, &$sprite){

    static $largerX = 0;

    foreach ($tab as $value) {
        $png = imagecreatefrompng($value);
        $tmp = getimagesize($value);
        imagecopy($sprite, $png, $largerX, 0, 0, 0, $tmp[0], $tmp[1]);
        $largerX += $tmp[0];
    }
    imagepng($sprite, 'image_3.png');
}

$tab = array();
read_files($argv[1], $tab);
getSizeOfSprite($tab);
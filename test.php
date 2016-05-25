<?php

function read_files($folder, &$tab, &$path)
{
    if ($handle = opendir($folder)) {

        while (false !== ($file = readdir($handle))) {
            if ($file == '.' || $file == '..') continue;
            if (is_dir($folder . "/" . $file)) {
                read_files($folder . "/" . $file, $tab ,$png);
            }
            else if (strrpos($file, '.png') > -1) {
                array_push($tab, $folder . "/" . $file);
                $path = ($folder ."/" .$file);
            }
        }
    }
}
function getSizeOfSprite($tab, $path) {
    $totalLargeur = 0;
    $maxHauteur = [];

    for ($i = 0; $i < count($tab); $i++) {
        $tmp = getimagesize($tab[$i]);
        $largeur = $tmp[0];
        $totalLargeur += $tmp[0];
        array_push($maxHauteur, $tmp[1]);
        $hauteur= end($maxHauteur);
    }
    $maxHauteurValue = max($maxHauteur);
    $sprite = imagecreatetruecolor($totalLargeur, $maxHauteurValue);


    create_sprite($totalLargeur, $hauteur, $tab, $sprite, $largeur);
}


function create_sprite(&$totalLargeur, &$hauteur, &$tab, &$sprite, &$largeur){

    static $largerX = 0;

    foreach ($tab as $value){
        $png = imagecreatefrompng($value);
        imagecopy($sprite, $png, $largerX, 0, 0, 0, $totalLargeur, $hauteur);
        $largerX += $largeur;
    }
    imagepng($sprite, 'image_3.png');
}

$tab = array();
read_files($argv[1], $tab, $path);
getSizeOfSprite($tab, $path);



































//function sprite(&$sprite, $argv=null){
//
//    $tabFiles = array();
//    $tab_vide = array();
//    $tab_empty_height = array();
//
//    if (is_dir($argv[1])) {
//        read_files($argv[1], $tabFiles);
//        for ($i = 0; $i < count($tabFiles); $i++) {
//            $stockage = getimagesize($tabFiles[$i]);
//            $tab_vide[$i] = $stockage[0];
//
//        }
//        $width = $tab_vide[0];
//
//        for ($j = 0; $j < count($tabFiles); $j++) {
//            $stockage = (getimagesize($tabFiles[$j]));
//            $tab_empty_height[$j] = $stockage[1];
//        }
//        $height = $tab_empty_height[0];
//
//        foreach ($tabFiles as $value) {
//            static $largerX = 0;
//            $image_1 = imagecreatefrompng($value);
//            imagecopy($sprite, $image_1, $largerX, 0, 0, 0, $width, $height);
//            $largerX += $width[0];
//        }
//
//    }
//}
//
//

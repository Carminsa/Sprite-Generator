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
    $size=array();

    for ($i = 0; $i < count($tab); $i++) {
        $tmp = getimagesize($tab[$i]);
        $largeur = $tmp[0];
        $totalLargeur += $tmp[0];
        array_push($maxHauteur, $tmp[1]);
        $hauteur= end($maxHauteur);
        array_push($size,$tmp);
    }
    $maxHauteurValue = max($maxHauteur);
    $sprite = imagecreatetruecolor($totalLargeur, $maxHauteurValue);


    create_sprite($totalLargeur, $hauteur, $tab, $sprite, $largeur, $tmp, $size);
}


function create_sprite(&$totalLargeur, &$hauteur, &$tab, &$sprite, &$largeur, &$tmp, $size){

    static $largerX = 0;
    for($i=0; $i < count($size); $i++ ) {
        print $size[$i][0];
        $hello = $size[$i][0];
        $bye = $size[$i][1];

        foreach ($tab as $value) {
            $png = imagecreatefrompng($value);
            imagecopy($sprite, $png, $largerX, 0, 0, 0, $hello[0], $bye[1]);
            $largerX += $hello[0];
        }
        imagepng($sprite, 'image_3.png');


    }
}



$tab = array();
read_files($argv[1], $tab);
getSizeOfSprite($tab);




































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
///Semestre 1/PHP_CSS_Generator/assets_folder'));
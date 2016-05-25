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
//                sprite($sprite);
            }
        }
    }
    //  imagepng($sprite, 'image_3.png');
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
    imagepng($sprite, 'image_3.png');


var_dump($tab);
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
<?php

function get_arg($argv, &$tab){
    $pos_option = "";
    $pos_folder = "";

    for ($i = 0; $i < count($argv); $i++) {
        if ($argv[$i] =='-r') {
            $pos_option = '-r';
        }
        else if (is_dir($argv[$i])){
            $pos_folder = $i;
        }
    }
    read_files($argv[$pos_folder], $tab, $pos_option);
}


function read_files($folder, &$tab,$pos_option)
{
    if ($handle = opendir($folder)) {

        while (false !== ($file = readdir($handle))) {
            if ($file == '.' || $file == '..') continue;
            else if (mime_content_type($folder . "/" . $file) == 'image/png') {
                array_push($tab, $folder . "/" . $file);;
            }
            if ($pos_option == "-r") {
                if (is_dir($folder . "/" . $file)) {
                    read_files($folder . "/" . $file, $tab, $pos_option);
                }
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


function create_css(&$tab){
    if (!file_exists('stylesheet.css')) {
        $all_values = [];

        foreach ($tab as $value) {
            $tmp = getimagesize($value);
            array_push($all_values, $tmp);
        }
        for ($i = 0; $i < count($all_values); $i++) {

            static $image_name = 1;

            $hauteur = "#image" . $image_name . "{ \n"
                . "width :" . $all_values[$i][0] . "px; \n"
                . "height :" . $all_values[$i][1] . "px; \n" . "} \n \n" ;

            $image_name++;

            file_put_contents('stylesheet.css', $hauteur, FILE_APPEND);
        }
    }
}


$tab = array();
//read_files($argv[1], $tab);
get_arg($argv, $tab);
getSizeOfSprite($tab);
create_css($tab);



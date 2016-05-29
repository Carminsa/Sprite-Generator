<?php

function read_files($folder){

    if ($handle = opendir($folder)) {
        $sprite = imagecreatetruecolor(3500, 1899);

        while (false !== ($file = readdir($handle))) {
            if ($file == '.' || $file == '..') continue;
            if (is_dir($folder . "/" . $file)) {
                read_files($folder . "/" . $file);
            }
            if (strrpos($file, '.png')) {
                $tab = explode("\n", $file);
                $toto = getimagesize($folder . "/" . $file);
                var_dump($toto);
                $tata = array_merge($tab, $toto);
                get_png($sprite, $tata, $folder, $handle, $file, $toto, $tab);
            }
        }
        imagepng($sprite, 'image_3.png');
    }
}

read_files($argv[1]);


function get_png(&$sprite, $tata, $folder, $file, $tab, $toto, $handle){

    static $largerX = 0;
    $kiki = $folder . "/" . $tab;


    $image_1 = imagecreatefrompng($kiki);

    imagecopy($sprite, $image_1, $largerX, 0, 0, 0, $toto[0], $toto[1]);
    $largerX += $toto[0];
}



#!/usr/bin/php
<?php

function read_files($folder, &$tab)
{
    if ($handle = opendir($folder)) {

        while (false !== ($file = readdir($handle))) {
            if ($file == '.' || $file == '..') continue;
            else if (mime_content_type($folder ."/" .$file)== 'image/png') {
                array_push($tab, $folder . "/" . $file);
            }
            if (is_dir($folder . "/" . $file)) {
                read_files($folder . "/" . $file,$tab);
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
read_files($argv[1], $tab);
getSizeOfSprite($tab);
create_css($tab);



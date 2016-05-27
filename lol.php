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
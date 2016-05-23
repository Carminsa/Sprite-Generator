<?php

function read_files($folder)
{

    if ($handle = opendir($folder)) {
        while (false !== ($file = readdir($handle))) {
            if ($file == '.' || $file == '..') continue;



            if (is_dir($folder . "/" . $file)) {
                read_files($folder . "/" . $file);
            }
            if (strrpos($file, '.png')) {
                $tab = explode("\n", $file);
                $toto = (list($width, $height) = getimagesize($folder . "/" . $file));
                $tata = array_merge($tab, $toto);
                print_r($tata);
            }
        }
    }
}

read_files($argv[1]);
























//                $tata=get_png($tab, $handle);
//function get_png($tab, $handle){
//
//    list($width, $height) = getimagesize($tab);
//    echo "width: " . $width . "\n";
//    echo "height: " .  $height;

//    $size=getimagesize('/home/leborg_g/Semestre 1/PHP_CSS_Generator/assets_folder', $tab);
// print_r($tab);
//}

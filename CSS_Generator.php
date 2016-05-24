<?php

function read_files($folder){

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
//                print_r($tata);
                $lol =get_png($tata,$folder, $handle, $file, $toto, $tab);
            }
        }
    }
}

read_files($argv[1]);


function get_png($tata, $folder, $file, $tab){

$kiki = $folder ."/" .$tab;
//    var_dump($kiki);

//    print_r($tata);

    $test=imagecreatetruecolor(2308, 1899);
    $image_1 = imagecreatefrompng($kiki);
//    $image_2 = imagecreatefrompng('/home/leborg_g/Semestre 1/PHP_CSS_Generator/assets_folder/20160509_profilpic_NS.png');
//
    imagealphablending($test, true);
    imagesavealpha($test, true);
    imagecopy($test, $image_1, 0, 0, 0, 0, 1473, 1854);
    imagecopy($test, $image_1, 1474, 0, 0, 0, 1000, 1000);
    imagepng($test, 'image_3.png');

//
}
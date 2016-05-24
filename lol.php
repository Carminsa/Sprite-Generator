<?php


function read_files($folder, &$tab=array()){

    if ($handle = opendir($folder)) {
        $sprite = imagecreatetruecolor(3500, 1899);

        while (false !== ($file = readdir($handle))) {
            if ($file == '.' || $file == '..') continue;
            if (is_dir($folder . "/" . $file)) {
                recursive($folder . "/" . $file);
            }
            if (strrpos($file, '.png')) {
                $tab = getimagesize($folder . "/" . $file);
//                print_r($tab);
            }
        }
    }
    imagepng($sprite, 'image_3.png');
}

read_files($argv[1]);

function recursive($folder){

    if ($handle = opendir($folder)) {
        read_files($folder);
    }

}


function sprite(&$sprite){


    static $largerX = 0;
    $kiki = $folder . "/" . $tab;


    $image_1 = imagecreatefrompng($kiki);

    imagecopy($sprite, $image_1, $largerX, 0, 0, 0, $toto[0], $toto[1]);
    $largerX += $toto[0];
    
}

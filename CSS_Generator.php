<?php


function read_files($folder)
{

    if ($handle = opendir($folder)) {
        while (false !== ($file = readdir($handle))) {
            if ($file == '.' || $file == '..') continue;
            if (strrpos($file, '.png')) {
                $tab = explode("\n", $file);
                $toto = (list($width, $height) = getimagesize($folder . "/" . $file));
//              echo "width: " . $width . "\n";
//              echo "height: " .  $height . "\n";
                $tata = array_merge($tab, $toto);
                print_r($tata);
            }
        }
    }
}


/*if (is_dir($folder . "/" . $file)) {
    read_files($folder . "/" . $file);
}
//                $tata=get_png($tab, $handle);
}
}
}
}*/
read_files($argv[1]);

//function get_png($tab, $handle){
//
//    list($width, $height) = getimagesize($tab);
//    echo "width: " . $width . "\n";
//    echo "height: " .  $height;

//    $size=getimagesize('/home/leborg_g/Semestre 1/PHP_CSS_Generator/assets_folder', $tab);
// print_r($tab);
//}

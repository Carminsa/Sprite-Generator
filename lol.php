<?php


function read_files($folder, &$tab){
    if ($handle = opendir($folder)) {
//        $sprite = imagecreatetruecolor(3500, 1899);

        while (false !== ($file = readdir($handle))) {
            if ($file == '.' || $file == '..') continue;
            if (is_dir($folder . "/" . $file)) {
                read_files($folder . "/" . $file, $tab);
            }
            if (strrpos($file, '.png') > -1) {
                array_push($tab, $folder . "/" . $file);
  //              $tab = getimagesize($folder . "/" . $file);
    //            var_dump($tab);
                //sprite($sprite, $tab, $folder, $file);
            }
        }
    }
    //imagepng($sprite, 'image_3.png');
}
$tabFiles = array();
if(is_dir($argv[1]))
    read_files($argv[1], $tabFiles);
for ($i = 0; $i < count($tabFiles); $i++)
    echo $tabFiles[$i] . "\n";

function sprite(&$sprite, $tab, $folder, $file){

    static $largerX = 0;
    $way_png= $folder ."/" .$file;

    $image_1 = imagecreatefrompng($way_png);

    imagecopy($sprite, $image_1, $largerX, 0, 0, 0, $tab[0], $tab[1]);
    $largerX += $tab[0];
    
}







//        static $largerX = 0;
//    $zizi=imagecreatefrompng($tabFiles[$i]);
//    $sprite = imagecreatetruecolor(3500, 1899);
//    imagecopy($sprite, $zizi,$largerX, 0, 0, 0, 1786, 1400);
//    imagepng($sprite, 'image_3.png');

}



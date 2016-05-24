<?php


function read_files($folder, &$tab)
{
    if ($handle = opendir($folder)) {

        while (false !== ($file = readdir($handle))) {
            if ($file == '.' || $file == '..') continue;
            if (is_dir($folder . "/" . $file)) {
                read_files($folder . "/" . $file, $tab);
            }
            if (strrpos($file, '.png') > -1) {
                array_push($tab, $folder . "/" . $file);
            }
        }
    }
}

$tabFiles = array();
$tab_vide=array();
$tab_empty_height=array();

if(is_dir($argv[1])) {
    read_files($argv[1], $tabFiles);
    for ($i = 0; $i < count($tabFiles); $i++) {
        $stockage = (getimagesize($tabFiles[$i]));
        $tab_vide[$i] = $stockage[0];
    }
    $width=$tab_vide[0];
//    echo $width;

    for($j = 0; $j < count($tabFiles); $j++){
        $stockage= (getimagesize($tabFiles[$j]));
        $tab_empty_height[$j] = $stockage[1];
    }
    $height=$tab_empty_height[0];
//    echo $height;

foreach ($tabFiles as $value){
    echo $value ."\n";
}



   $sprite = imagecreatetruecolor(3500, 1899);
  $image_1 = imagecreatefrompng($value);
        imagecopy($sprite, $image_1, $largerX, 0, 0, 0, $x, $toto[1]);

}









//foreach ($tabFiles as $keys => $values) {
////    foreach ($values as $key => $value) {
//        print($key . "\n");
//    }








//        $l = list($tabFiles[$i][0], $tabFiles[$i][1]) = getimagesize('/home/leborg_g/Semestre 1/PHP_CSS_Generator/assets_folder/HP_logo_630x630.png');
//        print_r($l);


//        foreach ($tabFiles as $key => $tabFile) {
//          $tabFiles[$key]=0;
//            $Y =($tabFiles[1]= getimagesize($folder ."/" .$tabFile[$i])[0]);
//    }



//        $largeur=(getimagesize($tabFiles[$i])[0]);
//        $hauteur=(getimagesize($tabFiles[$i])[1]) ."\n";



//        print_r(getimagesize($tabFiles[$i]));




//        print_r(getimagesize($tabFiles[$i])). "\n";

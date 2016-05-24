<?php


function read_files($folder){

    if ($handle = opendir($folder)) {
        $sprite = imagecreatetruecolor(3500, 1899);
        $sprite=imagecolorallocatealpha($lol, 0,0,0, 127);

        while (false !== ($file = readdir($handle))) {
            if ($file == '.' || $file == '..') continue;
            if (is_dir($folder . "/" . $file)) {
                read_files($folder . "/" . $file);
            }
            if (strrpos($file, '.png')) {
                $tab_name = explode("\n", $file);
                if (is_dir($folder . "/" . $file)) {
                }
                $image_size = getimagesize($folder . "/" . $file);
                $tab = array_merge($tab_name, $image_size);
                get_png($sprite, $tab, $folder, $handle, $file, $image_size, $tab_name);
            }
        }
    }
    imagepng($sprite, 'image_3.png');
}

read_files($argv[1]);




function get_png(&$sprite, $tata, $folder, $file, $tab, $toto, $handle){

    static $largerX = 0;
    $kiki = $folder . "/" . $tab;

    $image_1 = imagecreatefrompng($kiki);

    imagecopy($sprite, $image_1, $largerX, 0, 0, 0, $toto[0], $toto[1]);
    var_dump($toto);
    $largerX += $toto[0];

}

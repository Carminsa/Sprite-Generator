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









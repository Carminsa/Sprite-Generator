<?php

global $file;

function read_files($folder){

    if ($handle = opendir($folder)) {
        while (false !== ($file = readdir($handle))) {
            if ($file == '.' || $file == '..') continue;
            if (strrpos($file,'.png')) {
//                print $file. "\n";
                if (is_dir($folder . "/" . $file)) {
                    read_files($folder . "/" . $file);
                }
            }
        }
    }
}

read_files($argv[1]);

function get_png($file){

    var_dump($file);
}

get_png($file);

//  $png = image_type_to_mime_type(IMAGETYPE_PNG);
//  var_dump($png);

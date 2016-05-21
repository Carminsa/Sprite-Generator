<?php

function read_files($argv){

    if ($handle = opendir($argv)) {
        while (false !== ($file = readdir($handle))) {
            if ($file == '.' || $file == '..') continue;
            print $file . "\n";
            if (is_dir($argv ."/" .$file)){
                read_files($argv ."/" .$file);
            }
        }
    }
}

read_files($argv[1]);
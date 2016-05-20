<?php

function read_files($argv){

    if ($handle = opendir($argv)) {
        while (false !== ($file = readdir($handle))) {
            if ($file == '.' || $file == '..') continue;
            print $file;
        }
    } elseif (!is_empty($handle)){
        recursive();
    }
}
function recursive(){

    foreach (glob("*") as $file) {
        if($file == '.' || $file == '..') continue;
        print $file . '<br>';
    }
}

read_files($argv[1]);

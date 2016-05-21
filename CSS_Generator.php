<?php

function read_files($argv){

    
    if ($handle = opendir($argv)) {
        while (false !== ($file = readdir($handle))) {
            if ($file == '.' || $file == '..') continue;
            print $file ."\n";
        }
    } elseif (file_exists($handle)){
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

























***************************************************************


















<?php

function read_files($argv)
{

    if ($handle = opendir($argv)) {
        while (false !== ($file = readdir($handle))) {
            if ($file == '.' || $file == '..') continue;
            print $file . "\n";
            var_dump(is_file($hadnle));
        }
        if (is_dir($file)) {
            echo "tata";


read_files($argv[1]);






















            
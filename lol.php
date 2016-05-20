<?php

function tata($argc=null, $argv=NULL){

    if($argc>1){
        foreach (glob('*') as $file) {
            if ($file == '.' || $file == '..') continue;
            print $file . "\n";
        }
    }
    else
        return false;
}

var_dump(tata($argc, $argv));
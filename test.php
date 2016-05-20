<?php

function tata($argv){

    foreach (glob("*") as $file) {
        if ($file == '.' || $file == '..') continue;
        print $file;
    }
}

tata($argv);
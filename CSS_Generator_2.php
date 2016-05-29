<?php

function output_image(&$argv, &$tab, &$input=null){


    for ($i = 0; $i < count($argv); $i++) {
        $input = substr(strstr($argv[$i],"=" ),1 );
        if ($input == true) {


            if(!file_exists('stylesheet.css')){
                create_css($tab);

            }
            else if(file_exists('stylesheet.css')){
                rename("stylesheet.css", $input . ".css");
            }
        }
    }
}





















//**************************************************************************************************

//
//<?php
//
//function output_image($argv, &$tab, &$input=null){
//
//    for ($i = 0; $i < count($argv); $i++) {
//        $input = strstr($argv[$i], "=");
//        if ($input == true){
//
//            if (file_exists('stylesheet.css')) {
//                rename("stylesheet.css", $input .".css");
//
//            } else {
//                create_css($tab);
//            }
//        }
//    }
//}
//

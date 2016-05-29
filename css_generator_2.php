<?php

function output_image(&$argv, &$tab, &$input=null){

    if(!file_exists('style.css')){
        create_css($tab);
    }

    for ($i = 0; $i < count($argv); $i++) {
        $input = substr(strstr($argv[$i], "="), 1);
        $input=strtolower($input);
        if ($input == true) {
        }

        $substring = substr($argv[$i], 0, strpos($argv[$i], '='));
        if($substring == '-s'|| $substring == '--output-image'){

            if (!file_exists('style.css') || empty($input)) {
                create_css($tab);

            }
            else if (file_exists('style.css')) {
                rename("style.css",$input . ".css");
            }
        }
    }
}































//        $substring = substr($argv[$i], 0, strpos($argv[$i], '='));
//            var_dump($substring);
















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

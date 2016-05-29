<?php

function output_image(&$argv, &$tab, &$input=null){


    for ($i = 0; $i < count($argv); $i++) {
        $input = substr(strstr($argv[$i], "="), 1);
        $input=strtolower($input);
        if ($input == true) {
        }

        $substring = substr($argv[$i], 0, strpos($argv[$i], '='));
        if($substring == '-s'|| $substring == '--output-image'){

            if (!file_exists('stylesheet.css') || !isset($input)) {
                echo "test1";
                create_css($tab);

            } else if (file_exists('stylesheet.css')) {
                echo "test2";

                rename("stylesheet.css",$input . ".css");
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

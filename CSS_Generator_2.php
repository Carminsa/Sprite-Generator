<?php

function output_image($argv, &$tab, &$whatIWant){

    $all_args = array();
//    $whatIWant="";

    for ($i = 1; $i < count($argv); $i++) {
        array_push($all_args, $argv[$i]);
    }

    $name_of_css = $all_args[0];
    $whatIWant = substr($name_of_css, strpos($name_of_css, "=") + 1);



    if (!file_exists('stylesheet.css')) {
        rename("stylesheet.css", $whatIWant .".css");

    }
}





//$option="";
//
//
//for ($i = 0; $i < count($argv); $i++) {
//    if ($option = (strpbrk($argv[$i], "=")) && (file_exists('stylesheet.css')))  {
//        rename("stylesheet.css", "test.css");
//        $test=$option +1;
//        var_dump($test) ;
//    }
//
//
//    else if($option = (strpbrk($argv[$i], "=")) && (!file_exists('stylesheet.css'))) {
//        create_css($tab);
//
//    }
//
//}
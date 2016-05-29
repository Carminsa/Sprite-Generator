<?php

function output_style(&$argv, &$tab, &$input=null){
    if(!file_exists('style.css')){
        create_css($tab);
    }
    for ($i = 0; $i < count($argv); $i++) {
        $input = substr(strstr($argv[$i], "="), 1);
        $input = strtolower($input);
        if ($input == true) {
        }
        $substring = substr($argv[$i], 0, strpos($argv[$i], '='));
        if($substring == '-s'|| $substring == '--output-style'){
            if (!file_exists('style.css') || empty($input)) {
                create_css($tab);
            }
            else if (file_exists('style.css')) {
                rename("style.css",$input . ".css");
            }
        }
    }
    if(file_exists('style.css')){
        create_css($tab);
    }
}

function output_image($argv, &$tab, &$folder, &$pos_option){

    for ($i = 0; $i < count($argv); $i++) {
        $input = substr(strstr($argv[$i], "="), 1);
        if ($input == true) {


            $substring = substr($argv[$i], 0, strpos($argv[$i], '='));
            if ($substring == '-i' || $substring == '--output-image') {

                if(file_exists('sprite.png')){
                    rename('sprite.png', $input .".png");
                }

            }
        }
    }
    if(file_exists('sprite.png')){
        read_files($folder, $tab, $pos_option);
    }
}

?>
<?php

function test($argv)
{

    list($width, $height) = getimagesize($argv[1]);
    echo "width: " . $width;
    echo "height: " . $height;

}

test($argv[1]);
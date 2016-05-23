<?php


//$image = imagecreatefrompng('/home/leborg_g/Semestre 1/PHP_CSS_Generator/assets_folder/Small-mario.png');
//$frame = imagecreatefrompng('/home/leborg_g/Semestre 1/PHP_CSS_Generator/assets_folder/20160509_profilpic_NS.png');
//
//imagecopymerge($image, $frame, 50, 10, 100, 100, 100, 100, 100);
//
//# Save the image to a file
//imagepng($image,'/home/leborg_g/Semestre 1/PHP_CSS_Generator/assets_folder/fsdfsdfsd.png');


$test=imagecreatetruecolor(2308, 1899);
$image_1 = imagecreatefrompng('/home/leborg_g/Semestre 1/PHP_CSS_Generator/assets_folder/Small-mario.png');
$image_2 = imagecreatefrompng('/home/leborg_g/Semestre 1/PHP_CSS_Generator/assets_folder/20160509_profilpic_NS.png');

imagealphablending($test, true);
imagesavealpha($test, true);
imagecopy($test, $image_1, 0, 0, 0, 0, 1473, 1854);
imagecopy($test, $image_2, 1474, 0, 0, 0, 1000, 1000);
imagepng($test, 'image_3.png');





//$src=imagecreatefrompng('/home/leborg_g/Semestre 1/PHP_CSS_Generator/assets_folder/20160509_profilpic_NS.png');
//imagepng("/home/leborg_g/Semestre 1/PHP_CSS_Generator/assets_folder/20160509_profilpic_NS.png");





//$dest = imagecreatetruecolor(80, 40);
//imagecopy($src,$dest ,0 ,0 ,20 ,13 ,80 ,40);
//
//header('Content-Type: image/png');
//imagepng($dest);
//
//imagedestroy($dest);
//imagedestroy($src);
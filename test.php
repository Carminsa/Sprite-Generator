<?php


function hello($hi=null){
    $hi="hello word";
    double($hi);
}
hello();


function double($hi=null){
    echo $hi ;

}
double();




<?php


function hello($hi=null){
    $hi="hello word";
    return $hi;
}
hello();


function double($hi=null){
    echo hello($hi);

}
double();

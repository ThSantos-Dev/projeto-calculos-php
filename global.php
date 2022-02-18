<?php    



function geraUrlIndex(){
    $base = (string) null;
    $uri = $_SERVER['REQUEST_URI'];

    $array = explode('/',$uri);

    for($i = 0; $i < count($array)-1; $i++){
        $base.= $array[$i] . '/';
    }

    return $base;
}

function geraUrlViews(){
    $base = (string) null;
    $uri = $_SERVER['REQUEST_URI'];

    $array = explode('/',$uri);

    for($i = 0; $i < count($array)-2; $i++){
        $base.= $array[$i] . '/';
    }

    return $base;
}
    
?>
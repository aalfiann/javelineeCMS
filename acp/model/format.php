<?php

function formatBytes($size, $precision = 2) {
    $base = log($size) / log(1024);
    $suffixes = array('', 'Kb', 'Mb', 'Gb', 'Tb');   
    return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
}

function create_slug($string){
   $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
   return $slug;
}
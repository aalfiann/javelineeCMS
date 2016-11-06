<?php
/** Function Directory Size 
* @param B >> $bytestotal = $bytestotal
* @param KB >> $bytestotal = number_format($bytestotal / 1024,0)
* @param MB >> $bytestotal = number_format($bytestotal / 1048576,1)
* @param GB >> $bytestotal = number_format($bytestotal / 1073741824,3)
*/

function GetDirectorySize($path){
    $bytestotal = 0;
    $path = realpath($path);
    if($path!==false){
        foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS)) as $object){
            $bytestotal += $object->getSize();
        }
    }
    return $bytestotal = number_format($bytestotal / 1024,0); // Size in format KB
}
?>
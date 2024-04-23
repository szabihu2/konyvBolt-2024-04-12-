<?php 

//Először importálják a konfigurációs fájlt, amely tartalmazza az adatbázis kapcsolódási információkat. 
//Emellett betöltjük a lapozó és műfajok fájlokat is.
require_once "config.php";
include_once('lapozo.php');
include_once('mufajok.php');

        
     
        
echo json_encode($mufajok, JSON_UNESCAPED_UNICODE);

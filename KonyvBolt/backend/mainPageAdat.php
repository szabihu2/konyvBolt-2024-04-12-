<?php 

//Először importálják a konfigurációs fájlt, amely tartalmazza az adatbázis kapcsolódási információkat. 
//Emellett betöltjük a lapozó és műfajok fájlokat is.
require_once "config.php";
include_once('lapozo.php');
include_once('mufajok.php');

        
        // JSON kimenet generálása.
        echo json_encode($response);
       // $json = json_encode($response, JSON_PRETTY_PRINT);
      //print_r($json);
        


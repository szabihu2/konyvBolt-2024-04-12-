<?php
// Először elindítunk egy sessiont, ami lehetővé teszi az adatok átmeneti tárolását az egymást követő kérések között.
session_start();
// config.php betöltése
require_once "config.php";
// SQL lekérdezés
$sql = "SELECT mufajNev FROM mufajok";

// változó ami lekérdezi a kapcsolati változót valamint az adatbázis változót
$eredmeny = mysqli_query($conn, $sql);

// A lekérdezést végrehajtjuk az adatbázison, majd az eredményeket feldolgozzuk.
// Ha nincs találat, akkor üres tömböt adunk vissza.
// Ellenkező esetben összegyűjtjük a műfajokat egy tömbbe.
$mufajok = [];
if (mysqli_num_rows($eredmeny) > 0) {
    while ($sor = mysqli_fetch_assoc($eredmeny)) {
        $mufajok[] = $sor['mufajNev'];
    }
}

// Az eredmény tömböt átalakítjuk JSON formátumba és kiírjuk.
header('Content-Type: application/json; charset=utf-8');
echo json_encode($mufajok, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
?>

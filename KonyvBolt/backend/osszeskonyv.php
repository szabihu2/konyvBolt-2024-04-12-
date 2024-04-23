<?php


// A kapcsolat.php meghívása.
require_once("kapcsolat.php");

// SQL lekérdezés az összes könyv lekérdezéséhez
$sql = "SELECT konyv.*, mufajok.mufajNev, szerzok.szerzoNev, konyv.kep 
        FROM konyv 
        LEFT JOIN mufajok ON konyv.mufaj = mufajok.mufajId
        LEFT JOIN szerzokapcsolo ON konyv.konyvId = szerzokapcsolo.konyvId
        LEFT JOIN szerzok ON szerzokapcsolo.szerzoId = szerzok.szerzoId";


// Lekérdezzük az adatbázisból
$eredmeny = mysqli_query($conn, $sql);

// Vizsgáljuk meg, hogy van-e eredmény
if (mysqli_num_rows($eredmeny) > 0) {
    // Létrehozunk egy üres tömböt az összes könyv adatainak tárolására
    $osszesKonyv = array();

    // Az eredmények feldolgozása és hozzáadása a tömbhöz
    while ($sor = mysqli_fetch_assoc($eredmeny)) {
        // Hozzáadjuk a könyv adatait a tömbhöz
        $osszesKonyv[] = $sor;
    }

    // JSON formátumba alakítjuk a tömböt
    header('Content-Type: application/json; charset=utf-8');
    
$jsonOutput = json_encode($osszesKonyv, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

// Kiírjuk a formázott JSON kimenetet
echo $jsonOutput;
    
} else {
    // Ha nincs találat, üres JSON-t küldünk
    echo json_encode(array());
}

// Adatbázis kapcsolat bezárása
mysqli_close($conn);

?>


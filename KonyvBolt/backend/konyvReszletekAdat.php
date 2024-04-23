<?php
//config.php betöltése
require_once "config.php";

// Először ellenőrizzük, hogy a HTTP GET kérésben van-e "konyvId" nevű paraméter.
// Ha van, akkor elkezdi a feldolgozást, különben hibát jelez vissza.
if (isset($_GET['konyvId'])) {
    // Változó feltöltése a konyvId adatával
    $konyvId = $_GET['konyvId'];

    // SQL lekérdezés a könyv részleteinek lekérésére a konyvId alapján
    $sql = "SELECT * FROM konyv WHERE konyvId = ?";

    // Kapcsolat és adatok előkészítése.
    $stmt = mysqli_prepare($conn, $sql);
    
    // Ha előkészült a kapcsolati és adatbázis változó, akkor fusson le a folyamat.
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $konyvId);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if ($result) {
            // Lekérdezés eredménye sikeres, könyvadatok visszaadása
            $bookData = mysqli_fetch_assoc($result);
            if ($bookData) {
                // Ha találtunk könyvet, csak a könyv adatait adjuk vissza
                $response = $bookData;
                $response['error'] = false;
            } else {
                // Ha nem találtunk könyvet a megadott ID-vel
                $response['error'] = true;
                $response['message'] = "Nem található könyv a megadott azonosítóval.";
            }
        } else {
            // Hiba a lekérdezés során
            $response['error'] = true;
            $response['message'] = "Hiba a lekérdezés során: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    } else {
        // Hiba a lekérdezés előkészítése során
        $response['error'] = true;
        $response['message'] = "Hiba a lekérdezés előkészítése során: " . mysqli_error($conn);
    }
} else {
    // Hiányzó konyvId paraméter
    $response['error'] = true;
    $response['message'] = "Hiányzó konyvId paraméter.";
}

// A json_encode függvény segítségével átalakítjuk a válaszobjektumot JSON formátummá, majd ezt a JSON-t elküldi a kliensnek.
// A JSON_PRETTY_PRINT opcióval szépen formázott JSON-t kapunk.
header('Content-Type: application/json; charset=utf-8');
echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
?>

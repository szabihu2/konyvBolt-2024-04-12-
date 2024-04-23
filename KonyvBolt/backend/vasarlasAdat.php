<?php 
session_start();

$user_id = $_SESSION['user_id'];
//config.php betöltése
require_once "config.php";

//SQL lekérdezés a felhasznalok táblából
$sql = "SELECT * FROM felhasznalok where user_id = $user_id";
        $eredmeny = mysqli_query($conn, $sql);
        //Kapcsolat ellenörzés
        //var_dump($eredmeny);
        
        //A lekérdezés eredményének megfelelően létrehozzuk a választ egy asszociatív tömb formájában.
        //Ha nincs találat a "(@mysqli_num_rows($eredmeny) < 1)" feltételben, akkor hibaüzenetet ad vissza.
        
        if(@mysqli_num_rows($eredmeny) < 1) 
        {
            $response = [
                'error' => true,
                'message' => 'Nincs találat a rendszerben!'
            ];
        } 
        //A mysqli_fetch_assoc() függvénnyel minden egyes rekordot egy asszociatív tömbként olvasunk ki,
        //majd ezeket a tömböket egy $vasarlas tömbbe gyűjtjük.
        else 
        {
            $vasarlas = [];
            while ($sor = mysqli_fetch_assoc($eredmeny)) {
                $vasarlas[] = [
                    'email' => $sor['email'],
                    'user_id' => $sor['user_id'],
                    
                ];
            }
            
            $response = [
                'error' => false,
                'vasarlas' => $vasarlas
            ];
        }
        
        // JSON kimenet generálása
        echo json_encode($response);


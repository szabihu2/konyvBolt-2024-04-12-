<!-- head.php betöltése -->

<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/hirdetes.css">
    <title>Hirdetés</title>
</head>
<body>
    <!-- a form ot osszekötő keret -->
    <div class="wrapper">
            <!-- fejléc -->
            <Header>Hirdetés</Header>
            <form action="#" enctype="multipart/form-data" autocomplete="off" name="hirdetesForm" id="hirdetesForm" class="hirdetesForm">
            <div id="error-txt"></div>
                <!-- beviteli mezők -->
                <div class="name-details">

                        <div class="field input">
                        <label>Könyv Címe:</label>
                        <input type="text" placeholder="Cím" name="konyvCim" id="konyvCim" class="searchbar" required>
                        </div>

                        <div class="field input">
                        <label>Könyv Kiadási Éve:</label>
                        <input type="number" placeholder="Év" name="kiadasDatum" id="kiadasDatum" class="searchbar" required>
                        </div>
                       
                        <div class="field input">
                        <label>Könyv Szerzője:</label>
                        <input type="text" placeholder="Szerző" name="szerzo" id="" class="searchbar" required>
                        </div>

                        <div class="field input">
                        <label>Könyv Oldal Száma:</label>
                        <input type="number" placeholder="Oldal Szám" name="oldalSzam" id="" class="searchbar" required>
                        </div>

                         <div class="field input">
                        <label>Könyv Műfaja:</label>
                        <input type="combo" placeholder="Műfaj" name="mufaj" id="" class="searchbar" required>
                        </div>

                        <div class="field input">
                        <label>Könyv Ára:</label>
                        <input type="text" placeholder="Ár" name="ar" id="" class="searchbar" required>
                        </div>
                        
                        <div class="field input">
                        <label>Egyéb leírás:</label>
                        <input type="text" placeholder="Leírás" name="leiras" id="" class="searchbar" required>
                        </div>
                        
                        <div class="field input">
                        <label>Könyv Állapota:</label>
                        <input type="text" placeholder="Állapot" name="konyvAllapot" id="" class="searchbar" required>
                        </div>
                        
                        
                        

                        <!-- <input type="file" name="kep" id="submit" value="Kép" class="searchbar">
                        <br>
                        <input type="submit" value="Fájl feltöltése" name="submit" id="submit">
                         -->
                        
                        
                        <div class="field button">
                        <input type="submit" value="Mentés" id="send">
                        </div>
                        
                        <div class="field button">
                        <a href="LoggedInMain.php"><b>Vissza</b></a>
                        </div>
                </div>
        </form>
    </div>
    <!-- hirdetes.js meghívása -->
    <script src="js/hirdetes.js"></script>
    
</body>

</html>
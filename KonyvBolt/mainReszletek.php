<?php 

// Mufajok.php betöltése
include_once('backend/mufajok.php');

// Lapozo.php betöltése
//require_once("backend/lapozo.php");
// A kapcsolat.php meghívása.
require_once("backend/kapcsolat.php");

// UjKonyvek.php betöltése
include_once('backend/ujKonyvek.php');

// LegolcsobbKonyvek.php betöltése
include_once('backend/legolcsobbKonyvek.php');

// LegtobbOldalSzam.php betöltése
include_once('backend/legtobbOldalSzam.php');


?>
<!DOCTYPE html>
<html lang="hu">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Főoldal</title>
<meta name="keywords" content="Használt könyv bolt" />
<meta name="description" content="Használt könyv bolt" />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>

</head>
<body>
<!-- Oldal keret eleje -->
<div id="templatemo_container">
    <!-- Navigációs sáv eleje -->
	<div id="templatemo_menu">
    	<ul>
            <div class="register">
                <li><a href="profil.php">Profil</a></li>
                <li><a href="backend/logout.php">Kilépés</a></li>
            </div>
            <li><a href="LoggedInMain.php" class="current">Főoldal</a></li>
            <form method="post"><input type="search" class="searchbar" id="kifejezes" name="kifejezes">
            <li><a href="hirdetes.php">Hirdetés</a></li>
            </form>
        </ul>
    </div> <!-- Navigációs sáv vége -->

    <!-- Fejléc eleje -->
    <div id="templatemo_header">
    	<div id="templatemo_special_offers">
        	<?php print $olcsoKonyvek ?>
        </div>
        <div id="templatemo_new_books">
        	<?php print $ujKonyvek ?>
        </div>
    </div> <!-- Fejléc vége -->

    <!-- Fő tartalom eleje -->
    <div id="templatemo_content">
    	<!-- Bal oldali tartalom eleje -->
        <div id="templatemo_content_left">
        	<div class="templatemo_content_left_section">
            	<h1>Műfajok</h1>
                <?php  print $mufajok ?> 
            </div>
			<div class="templatemo_content_left_section">
            	<h1>Legtöbb oldalú könyvek</h1>
                <?php print $legtobbOldal ?>
            </div>
        </div> <!-- Bal oldali tartalom vége -->
        
        <!-- Jobb oldali tartalom eleje -->
        <div id="mainContentContainer">
            <!-- ide kerül beolvasásra a http://localhost/KonyvBolt/backend/konyvReszletekAdat.php?konyvId=... oldalról a kiválasztott könyv összes adata -->
            <div ng-app="myApp" ng-controller="mainReszletekController">

    <div ng-repeat="book in books">
        <h2>{{book.konyvCim}}</h2>
        <p><strong>Szerző:</strong> {{book.szerzo}}</p>
        <p><strong>Műfaj:</strong> {{book.mufaj}}</p>
        <p><strong>Leírás:</strong> {{book.leiras}}</p>
        <p><strong>Ár:</strong> {{book.ar}} Ft</p>
    </div>
</div>
        </div>
                
        <div class="cleaner_with_height">&nbsp;</div>

        <!-- Jobb oldali tartalom vége -->

        <!-- Lapozó tartalom eleje -->
        <nav class="page_turner">
        </nav>
        <!-- Lapozó tartalom vége -->
    </div> <!-- Fő tartalom vége -->
    
    <!-- Lábjegyzék eleje -->
    <div id="templatemo_footer">
        <a href="Main.php">Főoldal</a> | <a href="#kifejezes">Keresés</a>
        <br>
        Copyright © 2024 <strong>Használt Könyv Center</strong>
    </div> 
    <!-- Lábjegyzék vége -->
</div><!-- Oldal keret vége -->

<script>
   
    let app = angular.module('myApp', []);
    app.controller('mainReszletekController', function($scope, $http) {
    $scope.fetchBookDetails = function(konyvId) {
    
        // Adatok lekérése a megfelelő végponttól az adott könyv részleteihez
        $http.get('http://localhost/KonyvBolt/backend/konyvReszletekAdat.php?konyvId=' + konyvId)
        .then(function(response) {
            // Sikeres lekérés esetén
            $scope.books = response.data;
            console.log($scope.books);
        }, function(error) {
            // Hibakezelés, ha valami nem sikerült a kérés során
            console.error('Hiba történt:', error);
        });
    };
});
</script>
</body>
</html>

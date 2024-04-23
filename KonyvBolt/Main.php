<?php

require_once ("backend/kapcsolat.php");
include_once ('backend/ujKonyvek.php');
include_once ('backend/legolcsobbKonyvek.php');
include_once ('backend/legtobbOldalSzam.php');


if(isset($_GET['konyvId'])) {
    $konyvId = $_GET['konyvId'];
    // Implementáld a kiválasztott könyv részleteinek lekérését a $konyvId alapján
    // Például:
    $query = "SELECT * FROM konyvek WHERE konyvId = $konyvId";
    $result = mysqli_query($kapcsolat, $query);
    // Kezeld a $result-t és jelenítsd meg a könyv részleteit
}
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

<body ng-app="mufajokApp" ng-controller="mufajokCtrl">
    <div id="templatemo_container">
        <div id="templatemo_menu">
            <ul>
                <div class="register">
                    <li><a href="regisztracio.php">Regisztráció</a></li>
                    <li><a href="login.php">Bejelentkezés</a></li>
                </div>
                <li><a href="Main.php" class="current">Főoldal</a></li>
                <form method="post"><input type="search" class="searchbar" id="kifejezes" name="kifejezes" ng-model="kifejezes">
                    
                </form>
            </ul>
        </div>
        
        <div id="templatemo_header">
            <div id="templatemo_special_offers">
                <?php print $olcsoKonyvek ?>
            </div>
            <div id="templatemo_new_books">
                <?php print $ujKonyvek ?>
            </div>
        </div>
        <div id="templatemo_content">
            <div id="templatemo_content_left">
                <div class="templatemo_content_left_section">
                    <h1>Műfajok</h1>
                    <ul>
                        <li class="mufajok_szin" ng-repeat="mufaj in mufajok">{{ mufaj }}</li>
                    </ul>
                </div>
                <div class="templatemo_content_left_section">
                    <h1>Legtöbb oldalú könyvek</h1>
                    <?php print $legtobbOldal ?>
                </div>
            </div>

            <div id="mainContentContainer">
    <div class="templatemo_content_right">
    <div ng-if="!selectedBook" ng-repeat="konyv in osszesKonyv.slice(startIndex, endIndex) | filter:kifejezes" class="">
            <h1>{{ konyv.konyvCim }}  </h1>
            <h2> Szerző: {{ konyv.szerzoNev }}</h2>
            <img src="Boritok/{{konyv.kep}}.jpg" alt="{{konyv.konyvCim}}" id="kepPadding"/>
            <p>{{ konyv.leiras }}</p>
            <div class="product_info">
                <h3>{{ konyv.ar }} Ft</h3>
                <button class="reszletek" ng-click="loadBookDetails(konyv.konyvId)">Részletek</button>
            </div>
        </div>
    </div >
    <div ng-if="selectedBook" class="templatemo_content_right">
        <div >
            <h1>{{ selectedBook.konyvCim }}  </h1>
            <h2> Szerző: {{ selectedBook.szerzoNev }}</h2>
            <img src="Boritok/{{selectedBook.kep}}.jpg" alt="{{selectedBook.konyvCim}}" id="kepPadding"/>
            <p>{{ selectedBook.leiras }}</p>
            <div class="product_info">
                <h3>{{ selectedBook.ar }} Ft</h3>
                <button class="reszletek" ng-click="goBack()">Vissza</button>
            </div>
        </div>
    </div>
</div>

            <div class="cleaner_with_height">&nbsp;</div>
            <div class="lapozo_div">
                <button class="lapozo" ng-click="previousPage()">Előző</button>
                <div class="lapozo_margin"></div>
                <button class="lapozo" ng-click="nextPage()">Következő</button>
            </div>
        </div>
        <div id="templatemo_footer">
            <a href="Main.php">Főoldal</a> | <a href="#kifejezes">Keresés</a>
            <br>
            Copyright © 2024 <strong>Használt Könyv Center</strong>
        </div>
    </div>
    
    <script>
        
        let app = angular.module('mufajokApp', []);
app.controller('mufajokCtrl', function ($scope, $http) {
    // Műfajok lekérése
    $http.get("http://localhost/KonyvBolt/backend/mufajok.php")
        .then(function (response) {
            $scope.mufajok = response.data;
            console.log($scope.mufajok);
        });

    // Összes könyv lekérése
    $http.get("http://localhost/KonyvBolt/backend/osszeskonyv.php")
        .then(function (response) {
            $scope.osszesKonyv = response.data;
            console.log($scope.osszesKonyv);

            // Lapozó változók beállítása
            $scope.startIndex = 0;
            $scope.endIndex = 4;
        });

    // Előző oldal funkció
    $scope.previousPage = function () {
        if ($scope.startIndex > 0) {
            $scope.startIndex -= 4;
            $scope.endIndex -= 4;
        }
    };

    // Következő oldal funkció
    $scope.nextPage = function () {
        if ($scope.endIndex < $scope.osszesKonyv.length) {
            $scope.startIndex += 4;
            $scope.endIndex += 4;
        }
    };

    // Könyv részleteinek betöltése
    $scope.loadBookDetails = function (konyvId) {
        $http.get("http://localhost/KonyvBolt/backend/konyvReszletekAdat.php?konyvId=" + konyvId)
            .then(function (response) {
                $scope.selectedBook = response.data;
                console.log($scope.selectedBook);
            });
    };

    // Vissza gombra kattintva töröljük az adatokat és térjünk vissza az összes könyv megjelenítéséhez
    $scope.goBack = function () {
        $scope.selectedBook = null;
    };
});
</script>
</body>

</html>

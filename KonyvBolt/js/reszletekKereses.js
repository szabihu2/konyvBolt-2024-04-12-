document.addEventListener("DOMContentLoaded", function() {
    const konyvGomb = document.getElementById('konyvGomb');
    const errorText = document.getElementById('errorText');

    konyvGomb.addEventListener('click', function(event) {
        event.preventDefault(); 
        let konyvId = document.getElementById("konyvId").value;
        console.log("Kiválasztott könyv id-je:" + konyvId);
        fetch('http://localhost/KonyvBolt/backend/konyvReszletekAdat.php?konyvId=' + konyvId)
        .then(response => {
            if (!response.ok) {
                throw new Error('Hiba a kérés során');
            }
            console.log("Kapott válasz a konyvReszletekAdat.php-ről");
            console.log(response);
            return response.json();
        })
        .then(data => {
            // A kapott adatokat felhasználhatod itt
            console.log("Kapott adatok:");
            console.log(data);
            // Adatokat továbbítjuk a mainReszletek.php oldalra POST kéréssel
            fetch('http://localhost/KonyvBolt/mainReszletek.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'konyvId=' + encodeURIComponent(konyvId),
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Hiba a kérés során');
                } else {
                    console.log(response);
                    // Sikeres válasz esetén átirányítás (opcionális)
                    window.location.href = 'http://localhost/KonyvBolt/mainReszletek.php';
                }
            })
            .catch(error => {
                console.error('Hiba történt:', error);
            });
        })
        .catch(error => {
            console.error('Hiba történt:', error);
            // Hibakezelés, ha valami nem sikerült a feldolgozás során
            errorText.textContent = "Hiba történt a kérés során.";
            errorText.style.display = "block";
        });
    });
});

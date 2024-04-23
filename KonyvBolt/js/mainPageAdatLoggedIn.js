(function () {
  document.addEventListener('DOMContentLoaded', function () {
    let lapozoElemek = document.getElementsByTagName('a');
    console.log(lapozoElemek);
    for (let i = 0; i < lapozoElemek.length; i++) {
      lapozoElemek[i].addEventListener('click', function(event) {
        event.preventDefault(); // Megakadályozza az alapértelmezett link működését
        let pageNumber = this.getAttribute('data-page'); // Az adott lapozó link oldalszám attribútumának lekérése
        fetchJsonData(pageNumber); // A megfelelő oldal adatának lekérése és megjelenítése
      });
    }
    // Eseménykezelők itt
    fetchJsonData();
  });
})();

function fetchJsonData(pageNumber = 1) { // Alapértelmezett oldalszám: 1
  console.log("lefut")
  fetch(`http://localhost/KonyvBolt/backend/lapozo.php?oldal=${pageNumber}`, {
    method: 'GET',
    headers: {
      'Content-Type': 'application/json',
    },
  })
  .then(response => response.json())
  .then(data => {
      let mainContentContainer = document.getElementById('mainContentContainer');
      console.log(data)
      if (data.error) {
        console.error('Hiba a JSON adatok lekérése során:', data.error);
        return;
      }

      // Először hozz létre egy üres stringet a tartalomhoz
      let contentHTML = '';

      data.books.forEach(sor => {
        contentHTML += `
          <div id="templatemo_content_right">
            <div class="templatemo_product_box">
              <h1>${sor.konyvCim} <span>(${sor.szerzo})</span></h1>
              <img src="images/templatemo_image_01.jpg" alt="image" id="kepPadding"/>
              <p>${sor.leiras}</p>
              <div class="product_info">
                
                <h3>${sor.ar} Ft</h3>
                <form method="post" class="formR">
                  <input type="hidden" value="${sor.konyvId}" class="konyvId" name="konyvId">
                  <a href="#top" onclick="fetchDetails(${sor['konyvId']})">Részletek</a>

                </form>
              </div>
            </div>
          </div>
        `;
      });

      // Az összefűzött HTML hozzáadása a konténerhez
      mainContentContainer.innerHTML = contentHTML;
    })
    .catch(error => {
      console.error('Hiba a JSON adatok lekérése során:', error);
    });
}
function fetchDetails(konyvId) {
  // Az oldal paraméter átadása a GET kéréshez
  let oldal = window.location.search;
  console.log(oldal);
  fetch(`http://localhost/KonyvBolt/backend/konyvReszletekAdat.php${oldal}`)
      .then(response => response.json())
      .then(data => {
          if (data.error) {
              console.error('Hiba a részletek lekérése során:', data.message);
          } else {
              console.log(data)}
      })
      .catch(error => {
          console.error('Hiba a részletek lekérése során:', error);
      });
}

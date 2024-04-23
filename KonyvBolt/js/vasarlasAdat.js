(function () {
    document.addEventListener('DOMContentLoaded', function () {
      // Eseménykezelők itt
      fetchJsonData();
    });
  })();

  function fetchJsonData() {
    fetch('http://localhost/KonyvBolt/backend/vasarlasAdat.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
    })
      .then(response => response.json())
      .then(data => {
        let vasarlasTartalom = document.getElementById('vasarlasTartalom');
        
        if (data.error) {
          console.error('Hiba a JSON adatok lekérése során:', data.error);
          return;
        }
        
        // Először hozz létre egy üres stringet a tartalomhoz
        let contentHTML = '';
        
        data.vasarlas.forEach(sor => {
          contentHTML += `
            <div id="templatemo_content_right" class="vasarlas">
            <h1>Eladó</h1>
            
            <ul>
                <h2>Eladó Elérhetősége</h2>
                
                <li>E-mail:${sor.email}</li>
            </ul>

            </div>
          `;
        });
        
        // Az összefűzött HTML hozzáadása a konténerhez
        vasarlasTartalom.innerHTML = contentHTML;
      })
      .catch(error => {
        console.error('Hiba a JSON adatok lekérése során:', error);
      });
  }
  
  function fetchDetails(user_id) {
    fetch(`http://localhost/KonyvBolt/backend/vasarlasAdat.php?user_id=${user_id}`)
    .then(response => response.json())
      .then(data => {
        if (data.error) {
          console.error('Hiba a részletek lekérése során:', data.message);
        } else {
          let vasarlasTartalom = document.getElementById('vasarlasTartalom');
          
          if (vasarlasTartalom) {
            // Kicseréljük az oldal tartalmát az új adatokra
            vasarlasTartalom.innerHTML = `
            <div id="templatemo_content_right">
            <h1>Eladó</h1>
            
            <ul>
                <h2>Eladó Elérhetősége</h2>
                
                <li>E-mail:${data.sor.email}</li>
            </ul>
            
            </div>
            `;
          } else {
            console.error('Nem található vasarlasTartalom elem.');
          }
        }
      })
      .catch(error => {
        console.error('Hiba a részletek lekérése során:', error);
      });
  }
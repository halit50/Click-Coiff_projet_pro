let dateRdv = document.getElementById('prendre_rdv_daterdv');
let plageHoraire = document.getElementById('plagehoraire');

dateRdv.addEventListener('change', function() {
    let paramSearch = new URLSearchParams({
        daterdv:this.value
    });
    let url = plageHoraire.dataset.url +'?'+paramSearch
    //console.log(this.value)
    // la methode fetch sert à faire une requête http

    fetch(url).then(function(response) {
        return response.text();
      })
      .then(function(myhtml) {
        plageHoraire.innerHTML = myhtml;
        
      });;
    // Le remove ici sert à supprimer la classe bootsrap d-none
    plageHoraire.classList.remove("d-none");

})

let heurerdv = document.getElementById('prendre_rdv_heures');
let btnrdv = document.getElementsByClassName('btnrdv');
    for (i=0; i < btnrdv.length; i++){
        btnrdv[i].addEventListener('click', function(e) {
           // console.log(e.target.value);
            let heure = e.target.value;
            heurerdv.value = heure;
            //console.log(heurerdv.value);
            document.getElementById('hrdv').innerHTML = '<strong>'+ heure +'</strong>';
        })
        
    }

    function clickBouton(event) {
       // console.log(event.target.value);
        let dateRdv = document.getElementById('prendre_rdv_daterdv');
        let heurerdv = document.getElementById('prendre_rdv_heures');
            let heure = event.target.value;
            heurerdv.value = heure;
           // console.log(heurerdv.value);
            document.getElementById('hrdv').innerHTML = '<strong>'+ heure +'</strong>';
    }



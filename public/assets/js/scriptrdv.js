let dateRdv = document.getElementById('prendre_rdv_daterdv');
let plageHoraire = document.getElementById('plagehoraire');

dateRdv.addEventListener('change', function (e) {
    let paramSearch = new URLSearchParams({
        daterdv: this.value
    });
    let url = plageHoraire.dataset.url + '?' + paramSearch
    //console.log(this.value)
    var day = new Date(this.value).getUTCDay();
    if ([0, 1].includes(day)) {
        e.preventDefault();
        this.value = '';
        console.log(day);
        alert('Nous sommes fermés le dimanche et le lundi');
       // return;
    }
    // la methode fetch sert à faire une requête http

    fetch(url).then(function (response) {
        return response.text();
    })
        .then(function (myhtml) {
            plageHoraire.innerHTML = myhtml;

        });;
    // Le remove ici sert à supprimer la classe bootsrap d-none
    plageHoraire.classList.remove("d-none");

})

let heurerdv = document.getElementById('prendre_rdv_heures');
let btnrdv = document.getElementsByClassName('btnrdv');
// for (i = 0; i < btnrdv.length; i++) {
//     btnrdv[i].addEventListener('click', function (e) {
//         // console.log(e.target.value);
//         let heure = e.target.value;
//         heurerdv.value = heure;
//         //console.log(heurerdv.value);
//         document.getElementById('hrdv').innerHTML = '<strong>' + heure + '</strong>';
//     })

//}

function clickBouton(event) {
    // console.log(event.target.value);
    let dateRdv = document.getElementById('prendre_rdv_daterdv');
    let heurerdv = document.getElementById('prendre_rdv_heures');
    let heure = event.target.value;
    heurerdv.value = heure;
    // console.log(heurerdv.value);
    let valider = document.getElementById('prendre_rdv_submit');
    //console.log(valider);
    valider.classList.remove("d-none");


    //document.getElementById('hrdv').innerHTML = '<strong>'+ heure +'</strong>';
}

document.getElementById('prendre_rdv_submit').addEventListener('click', function () {
    let reponse = confirm('Etes-vous sur de vouloir réserver ce créneau?');
    //console.log(reponse);

    if (reponse) {
        document.location.href('/mesrdv/index.html.twig');
        //alert('Votre rendez-vous a été pris avec succès, vous pouvez consulter vos rendez-vous dans votre espace client');
    }
})






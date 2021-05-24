let supprimeRdv = document.getElementById('supprimerdv');
    supprimeRdv.addEventListener('click', function() {
        let rep = confirm('Etes-vous sur de vouloir annuler votre rendez-vous?');
        if(rep) {
            alert('Votre rendez-vous a bien été annulé');
        }
    })

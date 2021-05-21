let anim1 = document.getElementById('anim1');

anim1.addEventListener('mouseover', function(e) {
    
    document.getElementById('rechsalon').style.marginTop = '250px';
})
anim1.addEventListener('mouseleave', function() {
    document.getElementById('rechsalon').style.marginTop = '0px';
})

let anim2 = document.getElementById('anim2');

anim2.addEventListener('mouseover', function(e) {
    
    document.getElementById('rdv').style.marginTop = '250px';
})
anim2.addEventListener('mouseleave', function() {
    document.getElementById('rdv').style.marginTop = '0px';
})

let anim3 = document.getElementById('anim3');

anim3.addEventListener('mouseover', function(e) {
    
    document.getElementById('prestation').style.marginTop = '250px';
})
anim3.addEventListener('mouseleave', function() {
    document.getElementById('prestation').style.marginTop = '0px';
})

let anim4 = document.getElementById('anim4');

anim4.addEventListener('mouseover', function(e) {
    
    document.getElementById('tendances').style.marginTop = '250px';
})
anim4.addEventListener('mouseleave', function() {
    document.getElementById('tendances').style.marginTop = '0px';
})


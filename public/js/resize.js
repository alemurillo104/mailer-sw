var item = document.getElementById('botoncito');
var tituloTaller = document.getElementById('tituloTaller');
$(window).resize(function() {

    if ($(this).width() < 988) {
        item.classList.add('show');
        item.classList.remove('hide');
        tituloTaller.style = "font-size:2.5vw";
        
    } else {
        item.classList.remove('show');
        item.classList.add('hide');
        // elem.className = 'hide';
        tituloTaller.style = "font-size:1.5vw";
    }

});
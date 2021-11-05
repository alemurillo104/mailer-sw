var elem = document.getElementById('botonh');
var tituloTaller1 = document.getElementById('tituloTaller1');
$(window).resize(function() {

    if ($(this).width() < 1024) {
        elem.classList.add('show');
        elem.classList.remove('hide');
        tituloTaller1.style = "font-size:2.5vw";
    } else {
        elem.classList.remove('show');
        elem.classList.add('hide');
        // elem.className = 'hide';
        tituloTaller1.style = "font-size:1.5vw";
    }

});
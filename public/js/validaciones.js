function verificarOrdenFecha(fechaini, fechafin) {
    var x = new Date();
    var fecha1 = fechaini.split("-");
    x.setFullYear(fecha1[0],fecha1[1]-1,fecha1[2]);
    var y = new Date();
    var fecha2 = fechafin.split("-");
    y.setFullYear(fecha2[0],fecha2[1]-1,fecha2[2]);

    console.log('=================');
    console.log(x);
    console.log(y);
    
    if (x > y){
        if (x == y) {
            console.log('son iguales!');
            return true;
        }
        return false;
    }else{
        return true;
    }
  
}

function validarFechaMenorActual(date){
    // console.log(date);
    var x=new Date();
    var fecha = date.split("-");
    x.setFullYear(fecha[0],fecha[1]-1,fecha[2]);
    var today = new Date();
    console.log('=================');
    console.log(x);
    console.log(today);
    
    if (x >= today)
      return false;
    else
      return true;
}
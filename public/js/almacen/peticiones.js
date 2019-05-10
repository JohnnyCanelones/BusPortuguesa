
$(document).ready(function() {
   
  $('#peticionesPendientes').DataTable( {
      dom: 'Bfrtip',
      "order": [4, 'desc'],

  } );
  $('#peticiones-aprobada-rechazadas').DataTable( {
      dom: 'Bfrtip',
      "order": [5, 'desc'],

  } );
  $('#peticionesEspeciales').DataTable( {
    dom: 'Bfrtip',
    "order": [4, 'desc'],

} );
} );
    // $('#example').tooltip()

let botonAceptar = document.getElementsByClassName('aceptar');

for (x=0; x <botonAceptar.length; x++){
    
    // console.log(botonAceptar[x])
    let boton= botonAceptar[x]; 
    boton.addEventListener("click", function(event){
        console.log('hola')
            // event.submit()
           swal({
          title: '¿Estas seguro que quieres aceptarla?',
          text: "No se puede deshacer esta accion",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#4caf50',
          cancelButtonColor: '#f44336',
          confirmButtonText: 'Si, Aceptarla',
          cancelButtonText: 'Cancelar'
        }).then((result) => {
          if (result.value) {
            window.location.replace("/almacen/aceptar/peticion/" + boton.dataset.value);
          }
        })
        });


}

function modal() {
   setTimeout(function(){ 
    let botonAceptar = document.getElementsByClassName('aceptar');

    for (x=0; x <botonAceptar.length; x++){

        let boton= botonAceptar[x]; 
        boton.addEventListener("click", function(event){
            // event.submit()
           swal({
              title: '¿Estas seguro que quieres aceptarla?',
              text: "No se puede deshacer esta accion",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#4caf50',
              cancelButtonColor: '#f44336',
              confirmButtonText: 'Si, Aceptarla',
              cancelButtonText: 'Cancelar'
            }).then((result) => {
              if (result.value) {
                window.location.replace("/almacen/aceptar/peticion/" + boton.dataset.value);
              }
            })
        });
    }
}, 500);
    
}

    
$(document).ready(function() {

    let tablas = document.getElementsByClassName('sorting_1');

    let tabla= tablas[0];
    tabla.addEventListener("click", function(event){
        modal();
     })
         
    
});

i= 0

setInterval(function() {
  $.get( "/almacen/peticiones/pendientes", function( data ) {
     
      let peticionesDom =document.getElementById("totalPeticionesPendientes").value;
      let peticionesActuales = data.length;
      if (peticionesDom != peticionesActuales) {
          // location.reload();
      }
  });

}, 5000)





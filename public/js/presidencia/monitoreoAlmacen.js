$('#example').DataTable( {
    dom: 'Bfrtip',
    "order": [0, 'desc'],

} );

    setInterval(function() {
    $.get( "/presidente/monitoreos/almacen", function( data ) {
        let cantidad_de_monitoreos = document.getElementById('monitoreos').value
        let peticionesDom =document.getElementsByClassNameementById("totalPeticionesPendientes").value;
        let peticionesActuales = data;
        // console.log(peticionesActuales+' '+ cantidad_de_monitoreos)

        if (cantidad_de_monitoreos != peticionesActuales) {
            location.reload();
        }
    });

}, 5000)



let usuarios = document.getElementsByClassName('usuario');

for (x=0; x <usuarios.length; x++){

    let cantidad_de_monitoreos = document.getElementById('monitoreos').value
    let usuario= usuarios[x];
    
    usuario.addEventListener("click", function(event){
        setTimeout(function(){
            $('#exampleModalLong').modal('show');
        }, 350);
            $.get( "/presidente/monitoreo/usuario/"+usuario.dataset.value, function( data ) {
                document.getElementById('exampleModalLongTitle').innerHTML =  'Empleado';
                document.getElementById('mt-1').innerHTML =  'Cedula';
                document.getElementById('m-1').innerHTML =  data.nationality+'-'+ data.id;
                document.getElementById('mt-2').innerHTML =  'Nombres';
                document.getElementById('m-2').innerHTML =  data.names;
                document.getElementById('mt-3').innerHTML =  'Apellidos';
                document.getElementById('m-3').innerHTML =  data.last_names;
                document.getElementById('mt-4').innerHTML =  '';
                document.getElementById('m-4').innerHTML =  '';
                document.getElementById('mt-5').innerHTML =  '';
                document.getElementById('m-5').innerHTML =  '';
            });
        
    })
}

function buscarUsuario(){
   let usuarios = document.getElementsByClassName('usuario');

   for (x=0; x <usuarios.length; x++){

        let cantidad_de_monitoreos = document.getElementById('monitoreos').value
        let usuario= usuarios[x];
        
        usuario.addEventListener("click", function(event){
                setTimeout(function(){
            $('#exampleModalLong').modal('show');
            }, 350);
            $.get( "/presidente/monitoreo/usuario/"+usuario.dataset.value, function( data ) {
               document.getElementById('exampleModalLongTitle').innerHTML =  'Empleado';
                document.getElementById('mt-1').innerHTML =  'Cedula';
                document.getElementById('m-1').innerHTML =  data.nationality+'-'+ data.id;
                document.getElementById('mt-2').innerHTML =  'Nombres';
                document.getElementById('m-2').innerHTML =  data.names;
                document.getElementById('mt-3').innerHTML =  'Apellidos';
                document.getElementById('m-3').innerHTML =  data.last_names;
                document.getElementById('mt-4').innerHTML =  '';
                document.getElementById('m-4').innerHTML =  '';
                document.getElementById('mt-5').innerHTML =  '';
                document.getElementById('m-5').innerHTML =  '';
            });
            
        })
    } 
}

let almacen = document.getElementsByClassName('almacen');

for (x=0; x <almacen.length; x++){

    let cantidad_de_monitoreos = document.getElementById('monitoreos').value
    let producto= almacen[x];
    
    producto.addEventListener("click", function(event){
        setTimeout(function(){
            $('#exampleModalLong').modal('show');
        }, 300);
            $.get( "/presidente/monitoreo/almacen/"+producto.dataset.value, function( data ) {
               document.getElementById('exampleModalLongTitle').innerHTML =  'Producto';

                document.getElementById('mt-1').innerHTML =  'Nombre del producto';
                document.getElementById('m-1').innerHTML =  data.nombre_producto
                
                document.getElementById('mt-2').innerHTML =  'Compatibilidad';
                document.getElementById('m-2').innerHTML =  data.compatibilidad;
                
                document.getElementById('mt-3').innerHTML =  'Cantidad';
                document.getElementById('m-3').innerHTML =  data.cantidad;
                
                document.getElementById('mt-4').innerHTML =  'Ubicacion';
                document.getElementById('m-4').innerHTML =  data.ubicacion;
            });
        
    })
}

function buscarProducto(){
   let almacen = document.getElementsByClassName('almacen');

for (x=0; x <almacen.length; x++){

    let cantidad_de_monitoreos = document.getElementById('monitoreos').value
    let producto= almacen[x];
    
    producto.addEventListener("click", function(event){
        setTimeout(function(){
            $('#exampleModalLong').modal('show');
        }, 300);
            $.get( "/presidente/monitoreo/almacen/"+producto.dataset.value, function( data ) {
               document.getElementById('exampleModalLongTitle').innerHTML =  'Producto';

                document.getElementById('mt-1').innerHTML =  'Nombre del producto';
                document.getElementById('m-1').innerHTML =  data.nombre_producto
                
                document.getElementById('mt-2').innerHTML =  'Compatibilidad';
                document.getElementById('m-2').innerHTML =  data.compatibilidad;
                
                document.getElementById('mt-3').innerHTML =  'Cantidad';
                document.getElementById('m-3').innerHTML =  data.cantidad;
                
                document.getElementById('mt-4').innerHTML =  'Ubicacion';
                document.getElementById('m-4').innerHTML =  data.ubicacion;
                
            });
        
    })
}

}

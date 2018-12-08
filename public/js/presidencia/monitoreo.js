
$('#example').DataTable( {
    dom: 'Bfrtip',
    "order": [0, 'desc'],

} );
    

setInterval(function() {
    $.get( "/presidente/monitoreos", function( data ) {
        let cantidad_de_monitoreos = document.getElementById('monitoreos').value
        // let peticionesDom =document.getElementById("totalPeticionesPendientes").value;
        let peticionesActuales = data;
        
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
                document.getElementById('cedula').innerHTML =  data.nationality+'-'+ data.id;
                document.getElementById('nombre').innerHTML =  data.names;
                document.getElementById('apellido').innerHTML =  data.last_names;
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
                document.getElementById('cedula').innerHTML =  data.nationality+'-'+ data.id;
                document.getElementById('nombre').innerHTML =  data.names;
                document.getElementById('apellido').innerHTML =  data.last_names;
            });
            
        })
    } 
}

let empleados = document.getElementsByClassName('empleado');

for (x=0; x <empleados.length; x++){

    let cantidad_de_monitoreos = document.getElementById('monitoreos').value
    let empleado= empleados[x];
    
    empleado.addEventListener("click", function(event){
        setTimeout(function(){
            $('#exampleModalLong').modal('show');
        }, 300);
            $.get( "/presidente/monitoreo/usuario/"+empleado.dataset.value, function( data ) {
                document.getElementById('cedula').innerHTML =  data.nationality+'-'+ data.id;
                document.getElementById('nombre').innerHTML =  data.names;
                document.getElementById('apellido').innerHTML =  data.last_names;
            });
        
    })
}

function buscarEmpleado(){
   let usuarios = document.getElementsByClassName('usuario');

   for (x=0; x <empleados.length; x++){

    let cantidad_de_monitoreos = document.getElementById('monitoreos').value
    let empleado= empleados[x];
    
    empleado.addEventListener("click", function(event){
        setTimeout(function(){
            $('#exampleModalLong').modal('show');
        }, 300);
            $.get( "/presidente/monitoreo/usuario/"+empleado.dataset.value, function( data ) {
                document.getElementById('cedula').innerHTML =  data.nationality+'-'+ data.id;
                document.getElementById('nombre').innerHTML =  data.names;
                document.getElementById('apellido').innerHTML =  data.last_names;
            });
        
    })
    }
}


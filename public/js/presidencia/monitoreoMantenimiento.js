$('#example').DataTable( {
    dom: 'Bfrtip',
    "order": [0, 'desc'],

} );

    setInterval(function() {
    $.get( "/presidente/monitoreos/mantenimiento", function( data ) {
        let cantidad_de_monitoreos = document.getElementById('monitoreos').value
        // let peticionesDom =document.getElementsByClassNameementById("totalPeticionesPendientes").value;
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
            $('#exampleModalLong2').modal('show');
        }, 350);
            $.get( "/presidente/monitoreo/usuario/"+usuario.dataset.value, function( data ) {
                document.getElementById('exampleModalLongTitle2').innerHTML =  'Empleado';
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
            $('#exampleModalLong2').modal('show');
            }, 350);
            $.get( "/presidente/monitoreo/usuario/"+usuario.dataset.value, function( data ) {
               document.getElementById('exampleModalLongTitle2').innerHTML =  'Empleado';
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

function buscarMantenimiento() {
    let vermas = document.getElementsByClassName('mantenimiento');
    for (x = 0; x < vermas.length; x++) {
    
        let mantenimiento = vermas[x];
    
        mantenimiento.addEventListener("click", function (event) {
            setTimeout(function () {
                $('#exampleModalLong').modal('show');
            }, 350);
            $.get("/mantenimiento/cronograma/servicio/" + mantenimiento.dataset.value, function (data) {
                
                document.getElementById('exampleModalLongTitle').innerHTML = `Unidad # <strong> ${data.bus_id} </strong>`;
                document.getElementById('modal-mantenimiento').innerHTML = `
                  <span><strong>Kilometraje:</strong> ${data.kilometraje} <strong>Km</strong></span> <br> 
                  <span> <strong> Tipo de mantenimiento:</strong> ${data.tipo_mantenimiento}</span><br>   
                  <span><strong>Servicio:</strong> ${data.tipo_servicio}</span>  <br>
                `
                document.getElementById('mecanicos').innerHTML = `
                    <span><strong>Mecanico/a:</strong> ${data.staffs[0].names} ${data.staffs[0].last_names}</span>  <br>
                  `
                for (let i = 1; i < data.staffs.length; i++) {
    
                    document.getElementById('mecanicos').innerHTML += `
                      <span><strong>Mecanico/a:</strong> ${data.staffs[i].names} ${data.staffs[i].last_names}</span>  <br> 
                    
                  `
                }
                
                document.getElementById('footer').innerHTML = ` 
                    <button type="button" class="btn btn-secondary text-white mx-auto d-block" data-dismiss="modal">Cerrar</button>
                    
                    `
            });
        })
    }
}



function buscarBus() {
    let vermas = document.getElementsByClassName('bus');
    
    for (x = 0; x < vermas.length; x++) {
        
        let bus = vermas[x];
        
        bus.addEventListener("click", function (event) {
            setTimeout(function () {
                $('#exampleModalLong').modal('show');
            }, 350);
            $.get("/presidente/buses/" + bus.dataset.value, function (data) {
                function conductor() {
                    if (data.conductor == 0) {
                        return 'No tiene conductor asignado'
                    } else {
                        let conductor = ''
                        $.get("/presidente/monitoreo/usuario/" + data.conductor_id, function (data) {
                            // console.log(`C.I ${data.nationality}-${data.id} ${data.names} ${data.last_names}`)
                             this.conductor = `C.I ${data.nationality}-${data.id} ${data.names} ${data.last_names}`                           
                            })
                            return conductor

                    }
                }
                console.log('sdksdfhsdkjfh');
                
                console.log(conductor());
                
                document.getElementById('exampleModalLongTitle').innerHTML = `Unidad # <strong> ${data.id_bus} </strong>`;
                document.getElementById('modal-mantenimiento').innerHTML = `
                  <span><strong>Modelo:</strong> ${data.modelo}</span> <br> 
                  <span><strong>Kilometraje:</strong> ${data.kilometraje} <strong>Km</strong></span> <br> 
                  <span><strong>Vin:</strong> ${data.vin}</span> <br> 
                  <span> <strong> Direccion:</strong> ${data.esOperaciones}</span><br>   
                  <span> <strong> Estado:</strong> ${data.estado}</span><br>   
                  <span><strong>Conductor:</strong> <a href="#" onclick="buscarUsuario()" class="usuario verde"  data-value='${data.conductor_id} '>
                        ${data.conductor_id}
                    </a></span><br>
                `
            

                document.getElementById('footer').innerHTML = ` 
                    <button type="button" class="btn btn-secondary text-white mx-auto d-block" data-dismiss="modal">Cerrar</button>
                    
                    `
            });
        })
    }
}

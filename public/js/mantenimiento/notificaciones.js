

  function mantenimiento() {
      
      $.get( "/api/mantenimiento", function( data ) {
          // console.log(data[1])
          if (data[1] > 0) {
              // console.log(data.sort())
              
              let mantenimientos = document.getElementById('notificacion') 
              let mantenimientos2 = document.getElementById('notificacion2') 
              let notificaciones = document.getElementById('notificaciones')
              
                  
              notificaciones.innerHTML = "" 
                  for (let i = 0; i < data[1]; i++) {
                      let dataw = data[0]
                      // console.log(data)
                      function clase (){

                          if (dataw[i].estado == 'Rechazada'){
                              let clase = 'badge badge-danger';
                              return clase
                          }else {
                              let clase = 'badge badge-success'
                              return clase 
                          }
                          
                      }
                      function observacion (){

                          if (dataw[i].observacion ){
                              let clase = dataw[i].observacion;
                              return clase
                          }else {
                              let clase = '---'
                              return clase 
                          }
                          
                      }
                      notificaciones.innerHTML += `
                          <div class="col-sm-11 mx-auto d-block p-0 ml-2 mr-2   ">
                           
                          <div class="card-header ml-2 text-right " style="height:5px;">
                            <a style="color:#003286;" data-toggle="tooltip" data-placement="bottom" title="Borrar notificación" href="#" class="deleteNotificacion" onclick="" data-value="${dataw[i].id}">
                              <h5><i class="fas fa-times"></i></h5>    
                          </a></div> 
                                                             
                              <a href="/mantenimiento/peticiones">
                                  <div class="jumbotron p-2 notificaciones2 mb-0" >
                                      <strong>Producto: </strong>${dataw[i].almacen.nombre_producto}<br>
                                      <strong>Estado: </strong><span class="${clase()}">${dataw[i].estado}</span><br>
                                      <strong>Observacion: </strong>${observacion()}<br>
                                      <strong>Fecha: </strong>${dataw[i].updated_at}<br>
                                  </div>
                              </a>
                          </div>
                          
                      `
                  }
              
              mantenimientos.classList.remove("d-none");
              mantenimientos2.classList.remove("d-none");
              
          } else {
              let mantenimientos = document.getElementById('notificacion') 
              let mantenimientos2 = document.getElementById('notificacion2') 

              mantenimientos.classList.add("d-none");
              mantenimientos2.classList.add("d-none");
              notificaciones.innerHTML = "" 

          }
          let mantenimientos = document.getElementById('notificacion') 
          let mantenimientos2 = document.getElementById('notificacion2') 

          mantenimientos.innerHTML = data[1]
          mantenimientos2.innerHTML = data[1]

      })
      
  
          
      }
      
      
    mantenimiento() 
    $(document).ready(function() {
    setInterval(function() {
        // console.log('hola')
        
        var deleteNotificacion = document.getElementsByClassName('deleteNotificacion');
        // console.log('hola2')
        
        for (let i = 0; i < deleteNotificacion.length; i++) {
            
            let boton = deleteNotificacion[i]; 
            // console.log(boton)
            boton.addEventListener("click", function () {
                // console.log(boton.dataset.value)
                $.ajax({
                    type: "POST",
                    url: '/api/mantenimiento/notificacion/delete/'+ boton.dataset.value,
                    data: {  _token: '{{csrf_token()}}', notificacion: 0 },
                    success: function (data) {
                        // console.log(data);
                        // this.mantanimiento()
            
                    }
            
                });
            })
        
        }
    },2000);

  })    
  setInterval(() => {
      $.get( "/api/mantenimiento", function( data ) {
          // console.log($('#notificacion').text() +" "+data[1])
          if ($('#notificacion').text() != data[1]){
              mantenimiento()

                  var deleteNotificacion = document.getElementsByClassName('deleteNotificacion');
      
              for (let i = 0; i < deleteNotificacion.length; i++) {
                  
                  let boton = deleteNotificacion[i]; 
                  // console.log(boton)
                  boton.addEventListener("click", function () {
                      // console.log(boton.dataset.value)
                      $.ajax({
                          type: "POST",
                          url: '/api/mantenimiento/notificacion/delete/'+ boton.dataset.value,
                          data: {  _token: '{{csrf_token()}}', notificacion: 0 },
                          success: function (data) {
                              // console.log(data);
                  
                          }
                  
                      });
                  })
              
              }
          } 
      }) 
  }, 2000);


          
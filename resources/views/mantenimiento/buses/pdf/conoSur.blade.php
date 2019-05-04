<head>
     

</head>
        
        <body>
        @include('layouts.mantenimiento_base')
            
        
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-lg-7">
                    <div id="" class="card card2 ">
                        <div class="card-header">
                            <a class="text-left" href="/mantenimiento/pdf/buses" style="color: #008a34"><i class="fas fa-angle-left"></i> Atras</a>

                            <h3 id="hola" class="azul text-center m-3 "> Cono Sur</h3>
                        </div>
                        <div class="card-body text-white">
                             <div class="row text-center" >
                               
                                <div class="col-sm-3 mt-5 mb-5">
                                  <a target="_blank" href="/mantenimiento/pdf/buses/show/todos?option=1&q={{$opcion}}">
                                    <div class="card  header" >
                                      <h4 class="text-white no-bg m-3"><i class="fa fa-bus"></i><br> Todos los Buses</h4>
                                    </div>
                                  </a>
                                </div>
                              

                              
                                <div class="col-sm-3 mt-5 mb-5">
                                  <a target="_blank" href="/mantenimiento/pdf/buses/show/todos?option=2&q={{$opcion}}">
                                    <div class="card bg-verde" >
                                      <h4 class="text-white no-bg m-3"><i class="fa fa-bus"></i> Operativos</h4>
                                      
                                    </div>
                                  </a>
                                </div>
                             
                                
                                <div class="col-sm-3 mt-5 mb-5">
                                  <a target="_blank" href="/mantenimiento/pdf/buses/show/todos?option=3&q={{$opcion}}">
                                    <div class="card bg-verde" >
                                      <h4 class="text-white no-bg m-3"><i class="fa fa-bus"></i> Inoperativos</h4>
                                      
                                    </div>
                                  </a>
                                </div>
                                
                                <div class="col-sm-3 mt-5 mb-5">
                                  <a target="_blank" href="/mantenimiento/pdf/buses/show/todos?option=4&q={{$opcion}}">
                                    <div class="card header" >
                                      <h4 class="text-white no-bg m-3"><i class="fa fa-bus"></i><br> a Desincorporar</h4>
                                      
                                    </div>
                                  </a>
                                </div>
                             
                                <div class="col-sm-4 mt-5 mb-5">
                                  <a target="_blank" href="/mantenimiento/pdf/buses/show/todos?option=5&q={{$opcion}}">
                                    <div class="card header" >
                                      <h4 class="text-white no-bg m-3"><i class="fa fa-bus"></i> 6118</h4>
                                      
                                    </div>
                                  </a>
                                </div>

                                 <div class="col-sm-4 mt-5 mb-5">
                                  <a target="_blank" href="/mantenimiento/pdf/buses/show/todos?option=6&q={{$opcion}}">
                                    <div class="card bg-verde" >
                                      <h4 class="text-white no-bg m-3"><i class="fa fa-bus"></i> 6896</h4>
                                      
                                    </div>
                                  </a>
                                 </div>

                                     <div class="col-sm-4 mt-5 mb-5">
                                  <a target="_blank" href="/mantenimiento/pdf/buses/show/todos?option=7&q={{$opcion}}">
                                    <div class="card header" >
                                      <h4 class="text-white no-bg m-3"><i class="fa fa-bus"></i> 6752</h4>
                                      
                                    </div>
                                  </a>
                                 </div>
                             
                             
                              
                              
                             </div>
                        </div>
                       
                     
                        </div>
                        
                    </div>		
                </div>
            </div>
        </div>

          @if (session('status'))
              <script type="text/javascript">
                  $(document).ready(function() {
                      swal(
                      'Advertencia',
                      '{{ session('status') }}' ,
                      'warning'
                      )
                  })
              </script>
          @endif
        
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/staffform.js') }}"></script>


        <script type="text/javascript"  src="{{ asset('plugins/sweetalert2.all.min.js') }}"></script>
        
    
        </body>
        
        
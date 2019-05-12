<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}
        {{-- <link rel="stylesheet" href="{{ asset('plugins/bootstrap/bootstrap.min.css') }}" > --}}
        {{-- <link href="{{ asset('plugins/bootstrap-material-design.min.css') }}" rel="stylesheet"> --}}
        
        <title>PDF Almacen | BusPortuguesa {{ date("d-m-Y") }}</title>

    </head>
    <body>
    <style>
        <?php include(public_path().'/plugins/bootstrap/bootstrap.min.css');?>
        #banner{
            margin: 0;
            padding: 0;
            position: relative;
            left: -45px;
            width: 113%;
            top: -45px;
        }

        body {
            font-size: 14px;
        }
        .qloq {
          float: right;
          margin-top: 270px !important;
        }
       
    </style>
    <header id="banner" >
        
        <img  width="100%" src="{{ public_path() }}/img/banner.png">
    </header>
    <br>
    <br>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h3>Producto aprobado para su entrega</h3>
                    <br>
                    <h4>Fecha en que fue aprobado: {{ date("d/m/Y, g:i a", strtotime($arr['peticion']->peticion->updated_at)) }}</h4>
                {{-- <h6>Fecha de entrega {{ date("d/m/Y, g:i a")}}</h6> --}}
                    <br>
                     <table class="table table-hover table-striped">
                      <thead>
                          <tr>
                              <th class="" >Nombre del Producto</th>
                              <th class="" >Cantidad</th>
                              <th class="" >Número de la Unidad</th>
                          </tr>                            
                      </thead>
                      <tbody>
                          <tr>
                              <th scope="row">
                                {{ $arr['peticion']->peticion->almacen->nombre_producto }}

                              </th>
                              <td> {{ $arr['peticion']->peticion->cantidad }} @if($arr['peticion']->peticion->cantidad == 1) @if(strpos(strtolower( $arr['peticion']->peticion->almacen->nombre_producto), 'aceite') !== false)litro @endif @else @if(strpos(strtolower( $arr['peticion']->peticion->almacen->nombre_producto), 'aceite') !== false)litros @endif  @endif </td>
                            <td>{{ $arr['peticion']->peticion->bus_id }}</td>
                          </tr>
                      </tbody>
                  </table>
                </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <div class="row " style="border: 50px solid red;">
              <div class="col-sm-6 text-left mt-5">
                <p class="">
                  _____________________________
                </p>
                
                <p class="">
                  <strong>
                    {{ auth()->user()->staff->nationality }}-
                    {{ auth()->user()->staff->id }}
                  </strong>
                  {{ auth()->user()->staff->names }}
                  {{ auth()->user()->staff->last_names }}
                  <br>
                   @if(auth()->user()->role->Admin) @if(auth()->user()->staff->genre == "Masculino")Presidente @else Presidenta @endif
                                    
                  @elseif(auth()->user()->role->Mantenimiento) @if(auth()->user()->staff->genre == "Masculino")Encargado @else Encargada @endif de Mantenimiento
                  
                  @elseif(auth()->user()->role->Personal) @if(auth()->user()->staff->genre == "Masculino")Encargado @else Encargada @endif de Recursos Humanos 
                  
                  @elseif(auth()->user()->role->Inventario) @if(auth()->user()->staff->genre == "Masculino")Encargado @else Encargada @endif de Almacen
                  
                  @endif
                </p>
              </div>
              <div class="col-sm-6 text-right mt-5 qloq">
                
                <p class="mt-5">
                  _____________________________
                </p>
               
                <p class="">
                  <strong>
                    {{ $arr['usuario']->staff->nationality }}-
                    {{ $arr['usuario']->staff->id }}
                  </strong>
                  {{ $arr['usuario']->staff->names }} {{ $arr['usuario']->staff->last_names }}
                  <br>
                   @if($arr['usuario']->role->Admin) @if($arr['usuario']->staff->genre == "Masculino")Presidente @else Presidenta @endif
                                    
                  @elseif($arr['usuario']->role->Mantenimiento) @if($arr['usuario']->staff->genre == "Masculino")Encargado @else Encargada @endif de Mantenimiento
                  
                  @elseif($arr['usuario']->role->Personal) @if($arr['usuario']->staff->genre == "Masculino")Encargado @else Encargada @endif de Recursos Humanos 
                  
                  @elseif($arr['usuario']->role->Inventario) @if($arr['usuario']->staff->genre == "Masculino")Encargado @else Encargada @endif de Almacen
                  
                  @endif
                </p>
              </div>
            </div>
        </div>
    </body>
</html>
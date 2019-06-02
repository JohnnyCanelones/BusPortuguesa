<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}
        {{-- <link rel="stylesheet" href="{{ asset('plugins/bootstrap/bootstrap.min.css') }}" > --}}
        {{-- <link href="{{ asset('plugins/bootstrap-material-design.min.css') }}" rel="stylesheet"> --}}
        
        <title>PDF Mantenimiento | BusPortuguesa {{ date("d-m-Y") }}</title>

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
        /* #banner {  left: -45px; top: -45px; right: 0px; width: 102%;  } */
        #footer { position: fixed; left: 0px; bottom: -40px; right: 0px; height: 20px;}
        #footer .page:after { content: counter(page); text-align: end;}
    </style>
    <div id="banner" >
        
        <img  width="100%" src="{{ public_path() }}/img/banner.png">
        <br>
    </div>
    <div id="footer">
        
        <p class="page text-right d-inline ">Pagina </p> ||
        <p class="  text-left d-inline ">
               
            {{-- <strong>{{ ['Cambio de aceite'][$i]->buses->id_bus }}</strong> --}}
                
            Reporte de Mantenimientos de la unidad
            @foreach ($arr['mantenimientos'] as $bus)
                {{$bus[0]->buses->id_bus}}
                @break
            @endforeach
                
        </p>


    </div>
    <br>
    <br>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                       
                    <h3>
                        Reporte de Mantenimientos de la unidad {{$arr['mantenimientos']['Cambio de aceite'][0]->buses->id_bus}}
                        {{-- <strong>{{ $arr['mantenimientos'][0]->bus_id }}</strong>
                        por {{ $arr['tipo_servicio']}} --}}
                    </h3>
                    <br>
                    <h4>
                        {{-- Desde: {{ $arr['desde'] }},   
                        Hasta: {{ $arr['hasta'] }}    --}}
                        
                        
                    </h4>
                    <br>
                    <h5>Fecha {{ date("d-m-Y") }}</h5>
                    <br>
                    <table class="table">
                        <thead>
                            <tr>
                            <th  scope="col">Número de la Unidad</th>
                            <th  scope="col">Kilometraje actual</th>
                            <th  scope="col">Vin</th>
                            <th  scope="col">Modelo</th>
                            <th  scope="col">Ubicación</th>
                        </tr>                            
                        </thead>
                        <tbody>
                            <tr>
                            @foreach ($arr['mantenimientos'] as $bus)
                        
                                    <td>
                                        {{$bus[0]->buses->id_bus}}
                                    </td>
                                    <td>
                                        {{ number_format($bus[0]->buses->kilometraje)}} Km
                                    </td>
                                    <td>
                                        {{$bus[0]->buses->vin}}
                                    </td>
                                    <td>
                                        {{$bus[0]->buses->modelo}}
                                    </td>
                                    <td>
                                        {{$bus[0]->buses->esOperaciones}}
                                    </td>
                                @break
                            @endforeach
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <br>
                     <table class="table table-hover table-striped">
                        <thead>
                            
                            <tr>
                            <th  scope="col">Fecha</th>
                            <th  scope="col">Mantenimiento</th>
                            <th  scope="col">Kilometraje</th>
                            </tr>                            
                        </thead>
                        <tbody>
                            @forelse($arr['mantenimientos'] as $mantenimiento => $value)
                            @foreach ($value as $value)
                                <tr>
                                    <td>{{date("d/m/Y", strtotime( $value->fecha))}} </td><br>
                                    <td>{{ $value->tipo_servicio}} </td><br>
                                    <td>{{ number_format($value->kilometraje)}} Km</td><br>
                                    <br>
                                    
                                    
                                </tr>
                                @endforeach
                            @empty
                                <h2 class="mt-5"><span class="mt-5">  no hay unidades </span></h4>
                            @endforelse
                            
                        
                        </tbody>
                    </table>
                   
                </div>
            </div>
        </div>
    </body>
</html>
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
    </style>
    <header id="banner" >
        
        <img  width="100%" src="{{ public_path() }}/img/banner.png">
    </header>
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
                                    <td>
                                        {{$arr['mantenimientos']['Cambio de aceite'][0]->buses->id_bus}}
                                    </td>
                                    <td>
                                        {{ number_format($arr['mantenimientos']['Cambio de aceite'][0]->buses->kilometraje)}} Km
                                    </td>
                                    <td>
                                        {{$arr['mantenimientos']['Cambio de aceite'][0]->buses->vin}}
                                    </td>
                                    <td>
                                        {{$arr['mantenimientos']['Cambio de aceite'][0]->buses->modelo}}
                                    </td>
                                    <td>
                                        {{$arr['mantenimientos']['Cambio de aceite'][0]->buses->esOperaciones}}
                                    </td>
                                
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
                                    <td>{{date("Y/m/d", strtotime( $value->fecha))}} </td><br>
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
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

                    <h1>
                        Reporte de
                        @if ($arr['TotalNorteSur'] == 1)
                               Todas las Unidades
                            
                            @elseif($arr['TotalNorteSur'] == 2 )
                                Unidades Cono Norte
                            
                            @elseif($arr['TotalNorteSur'] == 3 )
                                Unidades Cono Sur
                        @endif
                         
                    </h1>
                    <br>
                    <h2>
                          
                            @if($arr['option'] == 2 )
                                Unidades Operativas
                            
                            @elseif($arr['option'] == 3 )
                                Unidades Inoperativas
                            @elseif($arr['option'] == 4 )
                                Unidades a Desincorporar
                            @elseif($arr['option'] == 5 )
                                Unidades 6118
                            @elseif($arr['option'] == 6 )
                                Unidades 6896
                            @elseif($arr['option'] == 7 )
                                Unidades 6752
                           @endif

                    </h2>
                    <br>
                    <h3>Fecha {{ date("d-m-Y") }}</h3>
                    <br>
                    @yield('content')
                </div>
            </div>
        </div>
    </body>
</html>
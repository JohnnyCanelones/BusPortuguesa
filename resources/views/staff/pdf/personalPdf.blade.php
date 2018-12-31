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

         header {
                position: fixed;
                top: -60px;
                left: 0px;
                right: 0px;
                height: 50px;

                /** Extra personal styles **/
                background-color: #03a9f4;
                color: white;
                text-align: center;
                line-height: 35px;
            }

            footer {
                position: fixed; 
                bottom: -60px; 
                left: 0px; 
                right: 0px;
                height: 50px; 

                /** Extra personal styles **/
                background-color: #03a9f4;
                color: white;
                text-align: center;
                line-height: 35px;
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
                    <h1>Personal</h1>
                    <br>
                    <h3>Fecha {{ date("d-m-Y") }}</h3>
                    <br>
                     <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th class="md-5" style="padding-right: 50px;" scope="col">Cedula </th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Cargo/Puesto</th>
                                <th scope="col">Email</th>
                            </tr>                            
                        </thead>
                        <tbody>
                            @forelse($staff as $staff)
                            <tr>
                                <th scope="row">
                                    <strong   style="color: #008a34">{{ $staff->nationality}}-{{$staff->id}}</strong>
                                </th>
                                <td> {{ $staff->names}}</td>
                                <td> {{ $staff->last_names}}</td>
                                <td> {{ $staff->phone_number}}</td>
                                <td> {{ $staff->position}}</td>
                                <td>
                                    {{ $staff->email}}
                                </td>        
                            </tr>
                            @empty
                            dfksdflkjs
                            @endforelse
                            
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
    
        
</html>
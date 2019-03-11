<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use App\Almacen;
use App\Peticion;
use App\WarehouseMonitoring;


use App\Http\Requests\CreateProductRequest;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class AlmacenController extends Controller
{
    

	public function home()

	{

        $peticionesPendientes = Peticion::where('estado', 'Pendiente')->get();
        $peticionesPendientes->load('almacen');
        
        $peticionesEliminadas = [];

        foreach ($peticionesPendientes as $peticion) {
            
            $peticionFecha = date("Y/m/d", strtotime('+8 days', strtotime($peticion->created_at)));
        
            // dd($peticionFecha);    
            $hoy = date("Y/m/d");
            if ($peticionFecha < $hoy) {
                Session::flash('peticionesEliminadas', 'hecholdasd');
                // Session::flash('hola', 'warning');

                
                array_push($peticionesEliminadas, $peticion);

                $peticion->estado = 'Rechazada';
                $peticion->observacion = 'Transcurrieron 5 días, el lapso de respuesta ha expirado';
                $peticion->save();
            }

            
        }
        // dd(Peticion::boot());

        // dd($peticionesEliminadas);

    	$productos = count(Almacen::all());
        $peticionesAprobadas = count(Peticion::where('estado', 'Aprobada')->get());
        $ultimasPeticiones = Peticion::where('estado', 'Pendiente')->latest()->take(3)->get();
        $ultimasPeticiones->load('almacen');
        // dd($ultimasPeticiones);

        $peticionesPendientes = Peticion::where('estado', 'Pendiente')->get();
        $peticionesPendientes->load('almacen');
        $peticionesPendientesEspeciales = Peticion::where('peticion_especial', '1');

		return view('almacen.home', [
			'productos' => $productos,
            'peticionesPendientes' => $peticionesPendientes,
            'peticionesAprobadas' => $peticionesAprobadas,
            'ultimasPeticiones' => $ultimasPeticiones,
            'peticionesEliminadas' => $peticionesEliminadas,
            'peticionesPendientesEspeciales' => $peticionesPendientesEspeciales->get(),
            'peticionesPendientesEspecialesUltimas' => $peticionesPendientesEspeciales->latest()->take(3)->get(),

		]);
	}

    public function showProductoForm()
    {
    	return view('almacen.productos.nuevoproducto');	
    }

    public function createProducto(CreateProductRequest $request)
    {
    	$producto = Almacen::create([
    		'nombre_producto' => $request->get('nombre_producto'),
    		'compatibilidad' => $request->get('compatibilidad'),
    		'cantidad' => $request->get('cantidad'),
    		'ubicacion' => $request->get('ubicacion'),
    		'limite' => $request->get('limite'),
    	]);

        $monitoreo = WarehouseMonitoring::create([
            'user_id' => Auth::user()->username,
            'almacen_id' => $producto->id,
            'accion' => 'Producto creado', 
            'stock_added' => $request->get('cantidad'),
            'fecha_accion' => date("Y-m-d H:i:s"),
        ]);

        $success = true;
        if ($success) {
            Session::flash('status','Producto Creado');

        }
    
            
        return redirect('/almacen');
    }

    public function showProductos()
    {
    	$productos = Almacen::all()->sortByDesc("nombre_producto");

    	return view('almacen.productos.showProductos', [
    		'productos' => $productos,
    	]);    
    }

    public function showProductosPdf()
    {
    	$productos = Almacen::all()->sortByDesc("nombre_producto");
    	
    	$pdf = PDF::loadView('almacen.pdf.pdfProductos', compact('productos'));
		$pdf->setPaper('letter', 'portrait');
        return $pdf->stream('PDF Almacen BusPortuguesa '. date("d-m-Y") .'.pdf');	
    }

  	public function editProducto($id)
    {
        $producto = Almacen::where('id', $id)->first();

        // dd($producto);

        return view('almacen.productos.editarProducto', [
            'producto' => $producto,
        ]);
    }
    public function editInventario($id)
    {
        $producto = Almacen::where('id', $id)->first();

        // dd($producto);

        return view('almacen.productos.editarCantidad', [
            'producto' => $producto,
        ]);
    }
    
    public function updateinventario(Request $request, $id)
    {
        $cantidad = $request->get('cantidad');
        $producto = Almacen::find($id);

        $producto->cantidad = $producto->cantidad + $cantidad;

        // dd($producto);
        
        $producto->save();
        $monitoreo = WarehouseMonitoring::create([
            'user_id' => Auth::user()->username,
            'almacen_id' => $producto->id,
            'accion' => 'Cantidad del producto agregado', 
            'stock_added' => $request->get('cantidad'),
            'fecha_accion' => date("Y-m-d H:i:s"),
        ]);
        $success = true;

        if ($success) {
            Session::flash('status','Modificado Correctamente');

        }

        return redirect('almacen/productos');

    }
    public function updateProducto(Request $request, $id)
    {
        $nombre_producto = $request->get('nombre_producto');
        $compatibilidad = $request->get('compatibilidad');
        $cantidad = $request->get('cantidad');
        $ubicacion = $request->get('ubicacion');
        $limite = $request->get('limite'); 
        

        $producto = Almacen::find($id);

        $producto->nombre_producto = $nombre_producto;
        $producto->compatibilidad = $compatibilidad;
        $producto->cantidad = $cantidad;
        $producto->ubicacion = $ubicacion;
        $producto->limite = $limite;

        // dd($producto);
        
        $producto->save();
        $monitoreo = WarehouseMonitoring::create([
            'user_id' => Auth::user()->username,
            'almacen_id' => $producto->id,
            'accion' => 'Producto editado', 
            'stock_added' => $request->get('cantidad'),
            'fecha_accion' => date("Y-m-d H:i:s"),
        ]);
        
        $success = true;

        if ($success) {
            Session::flash('status','Modificado Correctamente');

        }

        return redirect('almacen/productos');

    }



    
}

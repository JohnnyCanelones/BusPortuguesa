<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Almacen;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class AlmacenController extends Controller
{
	public function home()
	{
    	$productos = count(Almacen::all()); 

		return view('almacen.home', [
			'productos' => $productos,
		]);
	}

    public function showProductoForm()
    {
    	return view('almacen.productos.nuevoProducto');	
    }

    public function createProducto(Request $request)
    {
    	$producto = Almacen::create([
    		'nombre_producto' => $request->get('nombre_producto'),
    		'compatibilidad' => $request->get('compatibilidad'),
    		'cantidad' => $request->get('cantidad'),
    		'ubicacion' => $request->get('ubicacion'),
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

    public function updateProducto(Request $request, $id)
    {
    	$nombre_producto = $request->get('nombre_producto');
		$compatibilidad = $request->get('compatibilidad');
		$cantidad = $request->get('cantidad');
		$ubicacion = $request->get('ubicacion');

		$producto = Almacen::find($id);

		$producto->nombre_producto = $nombre_producto;
		$producto->compatibilidad = $compatibilidad;
		$producto->cantidad = $cantidad;
		$producto->ubicacion = $ubicacion;

		// dd($producto);
		
		$producto->save();
	    
	    $success = true;

	    if ($success) {
	        Session::flash('status','Modificado Correctamente');

	    }

	    return redirect('almacen/productos');

    }
}

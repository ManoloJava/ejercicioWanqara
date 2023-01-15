<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Producto;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class ProductoController extends Controller
{
//listar productos
    public function index(Request $request)
    {
        if($request->has(key:'txtBuscar')){
            $productos=Producto::where('name','like','%'.$request->txtBuscar.'%')->get();
        }else{
            $productos=Producto::all();
        }
            return $productos;
    }

    private function subirArchivo($file)
    {
        $nombreArchivo = time(). '.'. $file->getClientOriginalExtension();
        $file->move(public_path('fotografias'), $nombreArchivo);
        return $nombreArchivo;
    }


//post insertar datos
    public function store(CreateProductRequest $request)
    {
       $input = $request->all();
       if($request->has('photo'))
       $input['photo'] = $this->subirArchivo($request->photo);

       Producto::create($input);
       return response()->json([
        'res' => true,
        'message' => 'Registro creado correctamente'
       ], status:200); 
    }

//retorna un sólo registro
    public function show(Producto $producto)
    {
        return $producto;
    }

// put actualizar productos
    public function update(UpdateProductRequest $request, Producto $producto)
    {
        $input = $request->all();
        if($request->has('photo'))
        $input['photo'] = $this->subirArchivo($request->photo);

        $producto->update($input);
        return response()->json([
            'res' => 'true',
            'message' => 'Registro actualizado correctamente'
        ], status:200);
    }

//delete borrar productos
    public function destroy($id)
    {
        Producto::destroy($id);
        return response()->json([
            'res' => 'true',
            'message' => 'Registro eliminado correctamente'
        ],status:200);
    }
}

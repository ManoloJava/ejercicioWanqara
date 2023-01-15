<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCategoryProductRequest;
use App\Models\CategoriaProducto;
use Illuminate\Http\Request;

class CategoriaProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        {
            if($request->has(key:'txtBuscar')){
                $categorys_products=CategoriaProducto::where('name','like','%'.$request->txtBuscar.'%')->get();
            }else{
                $categorys_products=CategoriaProducto::all();
            }
                return $categorys_products;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all(); 
        CategoriaProducto::create($input);
        return response()->json([
         'res' => true,
         'message' => 'Registro creado correctamente'
        ], status:200); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CategoriaProducto $categoriaProducto)
    {
        return $categoriaProducto;
    } 

// put actualizar categorias
public function update(UpdateCategoryProductRequest $request, CategoriaProducto $categoriaProducto)
{
    $input = $request->all();
    $categoriaProducto->update($input);
    return response()->json([
        'res' => 'true',
        'message' => 'Registro actualizado correctamente'
    ], status:200);
}

//delete borrar productos
public function destroy($id)
{
    CategoriaProducto::destroy($id);
    return response()->json([
        'res' => 'true',
        'message' => 'Registro eliminado correctamente'
    ],status:200);
}
}

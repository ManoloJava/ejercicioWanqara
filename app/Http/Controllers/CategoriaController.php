<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{

//listar categorias
    public function index(Request $request)
    {
        {
            if($request->has(key:'txtBuscar')){
                $categorys=Categoria::where('name','like','%'.$request->txtBuscar.'%')->get();
            }else{
                $categorys=Categoria::all();
            }
                return $categorys;
        }
    }

    //post insertar categorias

    public function store(CreateCategoryRequest $request)
    {
        $input = $request->all(); 
        Categoria::create($input);
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
    public function show(Categoria $categoria)
    {
        return $categoria;
    }   

// put actualizar categorias
public function update(UpdateCategoryRequest $request, Categoria $categoria)
{
    $input = $request->all();
    $categoria->update($input);
    return response()->json([
        'res' => 'true',
        'message' => 'Registro actualizado correctamente'
    ], status:200);
}

//delete borrar productos
public function destroy($id)
{
    Categoria::destroy($id);
    return response()->json([
        'res' => 'true',
        'message' => 'Registro eliminado correctamente'
    ],status:200);
}
}

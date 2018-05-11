<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['atendente']);

        $categorias = Categoria::paginate(10);
	   	return view('categoria.index', compact('categorias'));
    }

    public function create()
    {
    	return view('categoria.add');
    }

    public function store(Request $request)
    {

    	$result = Categoria::create([
    		'nome' => $request->input('nome')
		]);

    	return redirect()->route('categoria.index');	
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $categoria = Categoria::find($id);

        if(!$categoria){
            return redirect()->route('categoria.index');
        }

        return view('categoria.edit', compact('categoria'));
    }

    public function update(Request $request, $id)
    {
        $update =[
            'nome' =>  $request->input('nome')
        ];
        
        $result = Categoria::find($id)->update($update);
        
        return redirect()->route('categoria.index');
    }

    public function destroy($id)
    {
        $categoria =  Categoria::find($id);

        if($categoria){
            //$category->products()->detach();
            $result = $categoria->delete();
        }

        return redirect()->route('categoria.index');
    }


    public function search(Request $request)
    {
        $nome = $request->input('nome');
        $search = TRUE;
        if($nome){
            $categorias = Categoria::where('nome', 'like', '%' . $nome . '%')->get();
        } else {
            $categorias = [];
        }
        return view('categoria.index', compact('categorias', 'search'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ServicoController extends Controller
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
    public function index()
    {
        $servicos = Servico::get();
        $categorias = Categoria::get();
        $selected_cat = [];

        return view('servico.index', compact('servicos', 'categorias', 'selected_cat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::get();
    	return view('servico.add', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $servico = Servico::create([
            'nome' => $request->input('nome'),
            'categoria_id' => $request->input('categoria')
        ]);

        //$servico->categoria()->sync($request->input('categoria'));
        
        return redirect()->route('servico.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Servico  $servico
     * @return \Illuminate\Http\Response
     */
    public function show(Servico $servico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Servico  $servico
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $servico = Servico::find($id);

        if(!empty($servico)){
            $categorias = Categoria::pluck('nome', 'id');
            return view('servico.edit', compact('servico', 'categorias'));
        }

        return redirect()->route('servico.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Servico  $servico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categoria = $request->input('categoria');

        $servico = Servico::find($id);

        if(!empty($servico)){

            $servico->update([
                'nome' =>  $request->input('nome'),
                'categoria_id' => $request->input('categoria')
            ]);
            
        }
        return redirect()->route('servico.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Servico  $servico
     * @return \Illuminate\Http\Response
     */
    public function destroy(Servico $servico)
    {
        $servico = Servico::find($servico->id);

        $result = $servico->delete();

        return redirect()->route('servico.index');
    }

    public function search(Request $request)
    {
        $nome = $request->input('nome');
        $selected_cat = $request->input('categoria');

        $search = TRUE;

        $servicos = Servico::where('categoria_id', $selected_cat)->get();
        $categorias = Categoria::get();

        if(empty($selected_cat)){
            $selected_cat = [];
        }

        return view('servico.index', compact('servicos', 'categorias', 'selected_cat', 'search'));
    }
}

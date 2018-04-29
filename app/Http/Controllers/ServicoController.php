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

        $categoria = Categoria::create([
            'nome' => $request->input('nome')
        ]);

        $categoria->categoria()->sync($request->input('categoria'));
        
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
    public function edit(Servico $servico)
    {
        $servico = Servico::find($servico->id);

        if(!empty($servico)){
            $categorias = Categoria::get();
            $selected_cat = array();

            foreach ($servico->categorias as $categoria) {
                $selected_cat[] = $categoria->pivot->categoria_id;
            }
            return view('servico.edit', compact('servico', 'categorias', 'selected_cat'));
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
    public function update(Request $request, Servico $servico)
    {
        $categoria = $request->input('categoria');

        $servico = Servico::find($servico->id);

        if(!empty($servico)){

            if(!empty($categoria)){
                $servico->categories()->sync($categoria);
            }
            $servico->update([
                'nome' =>  $servico->nome,
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

        if($servico){
            $servico->categories()->detach();
            $result = $servico->delete();
        }

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

<?php

namespace App\Http\Controllers;

use App\Models\Setor;
use Illuminate\Http\Request;

class SetorController extends Controller
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
        $setores = Setor::paginate(10);
	   	return view('setor.index', compact('setores'));
    }

    public function create()
    {
    	return view('setor.add');
    }

    public function store(Request $request)
    {

    	$result = Setor::create([
    		'nome' => $request->input('nome')
		]);

    	return redirect()->route('setor.index');	
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $setor = Setor::find($id);

        if(!$setor){
            return redirect()->route('setor.index');
        }

        return view('setor.edit', compact('setor'));
    }

    public function update(Request $request, $id)
    {
        $update =[
            'nome' =>  $request->input('nome')
        ];
        
        $result = Setor::find($id)->update($update);
        
        return redirect()->route('setor.index');
    }

    public function destroy($id)
    {
        $setor =  Setor::find($id);

        if($setor){
            //$category->products()->detach();
            $result = $setor->delete();
        }

        return redirect()->route('setor.index');
    }


    public function search(Request $request)
    {
        $nome = $request->input('nome');
        $search = TRUE;
        if($nome){
            $setores = Setor::where('nome', 'like', '%' . $nome . '%')->get();
        } else {
            $setores = [];
        }
        return view('setor.index', compact('setores', 'search'));
    }
}

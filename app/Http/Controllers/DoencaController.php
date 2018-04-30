<?php

namespace App\Http\Controllers;

use App\Models\Doenca;
use Illuminate\Http\Request;

class DoencaController extends Controller
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
        $doencas = Doenca::paginate(10);
	   	return view('doenca.index', compact('doencas'));
    }

    public function create()
    {
    	return view('doenca.add');
    }

    public function store(Request $request)
    {

    	$result = Doenca::create([
            'nome' => $request->input('nome'),
            'sintomas' => $request->input('sintomas'),
            'tratamento' => $request->input('tratamento')
		]);

    	return redirect()->route('doenca.index');	
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $doenca = Doenca::find($id);

        if(!$doenca){
            return redirect()->route('doenca.index');
        }

        return view('doenca.edit', compact('doenca'));
    }

    public function update(Request $request, $id)
    {
        $update =[
            'nome' => $request->input('nome'),
            'sintomas' => $request->input('sintomas'),
            'tratamento' => $request->input('tratamento')
        ];
        
        $result = Doenca::find($id)->update($update);
        
        return redirect()->route('doenca.index');
    }

    public function destroy($id)
    {
        $doenca =  Doenca::find($id);

        if($doenca){
            //$category->products()->detach();
            $result = $doenca->delete();
        }

        return redirect()->route('doenca.index');
    }


    public function search(Request $request)
    {
        $nome = $request->input('nome');
        $search = TRUE;
        if($nome){
            $doencas = Doenca::where('nome', 'like', '%' . $nome . '%')->get();
        } else {
            $doencas = [];
        }
        return view('doenca.index', compact('doencas', 'search'));
    }
}

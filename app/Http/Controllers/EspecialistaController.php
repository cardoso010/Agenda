<?php

namespace App\Http\Controllers;

use App\Models\Especialista;
use App\Models\Atendimento;
use App\User;
use App\Role;
use Illuminate\Http\Request;

class EspecialistaController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        //
        $especialistas = Especialista::paginate(10);
	   	return view('especialista.index', compact('especialistas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('especialista.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        if (!empty($request->file('image')) && $request->file('image')->isValid()) {
            $fileName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move($this->path, $fileName);
        } else {
            $fileName = '';
        }

        $role_especialista  = Role::where('name', 'especialista')->first();

        $nome_especialista = $request->input('nome');

        $usuario = User::create([
            'name' => $nome_especialista,
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'foto' => $fileName
        ]);
        $usuario->roles()->attach($role_especialista);
        
        $especialista = Especialista::create([
            'perfil' => $request->input('perfil'),
            'cargo_espec' => $request->input('cargo_espec'),
            'crm_mat' => $request->input('crm_mat'),
            'user_id' => $usuario->id
        ]);

    	return redirect()->route('especialista.index');	
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $especialista = Especialista::find($id);

        if(!$especialista){
            return redirect()->route('especialista.index');
        }

        return view('especialista.edit', compact('especialista'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $update =[
            'perfil' => $request->input('perfil'),
            'cargo_espec' => $request->input('cargo_espec'),
            'crm_mat' => $request->input('crm_mat')
        ];
        
        $result = Especialista::find($id)->update($update);
        
        return redirect()->route('especialista.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $especialista =  Especialista::find($id);

        if($especialista){
            //$category->products()->detach();
            $result = $especialista->delete();
        }

        return redirect()->route('especialista.index');
    }

}

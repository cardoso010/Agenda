<?php

namespace App\Http\Controllers;

use App\Models\Atendente;
use App\Models\Atendimento;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AtendenteController extends Controller
{

    //
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $atendentes = Atendente::paginate(10);
	   	return view('atendente.index', compact('atendentes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('atendente.add');
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
        
        $role_atendente = Role::where('name', 'atendente')->first();

        $usuario = User::create([
            'name' => $request->input('nome'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'foto' => $fileName,
            'role' => $role_atendente->id
        ]);
        $usuario->roles()->attach($role_atendente);
        
        $atendente = Atendente::create([
            'perfil' => $request->input('perfil'),
            'cargo' => $request->input('cargo'),
            'matricula' => $request->input('matricula'),
            'setor' => $request->input('setor'),
            'local' => $request->input('local'),
            'user_id' => $usuario->id,
            'hospital' => $request->input('hospital')
        ]);

    	return redirect()->route('atendente.index');	
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

        $atendente = DB::table('atendente')
        ->join('users', 'atendente.user_id', '=', 'users.id')
        ->select('atendente.*', 'users.email','users.password','users.name')
        ->where('atendente.id', '=', $id)
        ->first();

        if(!$atendente){
            return redirect()->route('atendente.index');
        }

        return view('atendente.edit', compact('atendente'));
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
            'cargo' => $request->input('cargo'),
            'matricula' => $request->input('matricula'),
            'hospital' => $request->input('hospital'),
            'setor' => $request->input('setor'),
            'local' => $request->input('local')
        ];
        
        $result = Atendente::find($id)->update($update);
        
        return redirect()->route('atendente.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $atendente =  Atendente::find($id);

        if($atendente){
            User::find($atendente->user->id)->delete();
            //$category->products()->detach();
            $result = $atendente->delete();
        }

        return redirect()->route('atendente.index');
    }

}

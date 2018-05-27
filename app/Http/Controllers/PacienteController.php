<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\Atendimento;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PacienteController extends Controller
{

    //
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $pacientes = Paciente::paginate(10);
	   	return view('paciente.index', compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('paciente.add');
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
        
        $role_paciente  = Role::where('name', 'paciente')->first();

        $nome_paciente = $request->input('nome');

        $usuario = User::create([
            'name' => $nome_paciente,
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'foto' => $fileName,
            'role' => $role_paciente->id
        ]);
        $usuario->roles()->attach($role_paciente);
        
        $paciente = Paciente::create([
            'nome' => $nome_paciente,
            'prontuario' => $request->input('prontuario'),
            'data_nascimento' => $request->input('data_nascimento'),
            'endereco' => $request->input('endereco'),
            'bairro' => $request->input('bairro'),
            'cidade' => $request->input('cidade'),
            'cep' => $request->input('cep'),
            'uf' => $request->input('uf'),
            'identidade' => $request->input('identidade'),
            'cpf' => $request->input('cpf'),
            'telefone' => $request->input('telefone'),
            'complemento' => $request->input('complemento'),
            'user_id' => $usuario->id
        ]);

    	return redirect()->route('paciente.index');	
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

        $paciente = DB::table('paciente')
        ->join('users', 'paciente.user_id', '=', 'users.id')
        ->select('paciente.*', 'users.email','users.password')
        ->where('paciente.id', '=', $id)
        ->first();

        if(!$paciente){
            return redirect()->route('paciente.index');
        }

        return view('paciente.edit', compact('paciente'));
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
            'nome' => $request->input('nome'),
            'prontuario' => $request->input('prontuario'),
            'data_nascimento' => $request->input('data_nascimento'),
            'endereco' => $request->input('endereco'),
            'bairro' => $request->input('bairro'),
            'cidade' => $request->input('cidade'),
            'cep' => $request->input('cep'),
            'uf' => $request->input('uf'),
            'identidade' => $request->input('identidade'),
            'cpf' => $request->input('cpf'),
            'telefone' => $request->input('telefone'),
            'complemento' => $request->input('complemento')
        ];
        
        $result = Paciente::find($id)->update($update);
        
        return redirect()->route('paciente.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $paciente =  Paciente::find($id);

        if($paciente){
            User::find($paciente->user->id)->delete();
            //$category->products()->detach();
            $result = $paciente->delete();
        }

        return redirect()->route('paciente.index');
    }

    public function atendimentos($id)
    {
        $paciente =  Paciente::find($id);

        $atendimentos = Atendimento::where('paciente_id', $id)->get();

        return view('paciente.atendimentos', compact('paciente', 'atendimentos'));

    }

}

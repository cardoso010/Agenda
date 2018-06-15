<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\Especialista;
use App\Models\Atendimento;
use App\Models\Servico;
use App\Models\Setor;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AtendimentoController extends Controller
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


        $atendimentos = DB::table('atendimento')
        ->join('especialista', 'atendimento.especialista_id', '=', 'especialista.id')
        ->join('users', 'users.id', '=', 'especialista.user_id')
        ->select('atendimento.*', 'users.name')
        ->get();

        if(Auth::user()->hasRole('paciente')){
            $paciente = DB::table('paciente')->where('user_id', '=', Auth::user()->id)->first();
            if($paciente){
                $atendimentos = DB::table('atendimento')
                ->join('especialista', 'atendimento.especialista_id', '=', 'especialista.id')
                ->join('users', 'users.id', '=', 'especialista.user_id')
                ->select('atendimento.*', 'users.name')
                ->where('paciente_id', '=', $paciente->id)->get();
            }
        }

        if(Auth::user()->hasRole('especialista')){
            $especialista = DB::table('especialista')->where('user_id', '=', Auth::user()->id)->first();
            if($especialista){
                $atendimentos = DB::table('atendimento')
                ->join('especialista', 'atendimento.especialista_id', '=', 'especialista.id')
                ->join('users', 'users.id', '=', 'especialista.user_id')
                ->select('atendimento.*', 'users.name')
                ->where('especialista_id', '=', $especialista->id)->get();
            }
        }

        
        //Prioridade
        $normal = $atendimentos->filter(function($atendimento){return $atendimento->prioridade == 'Normal';});
        $prioritario = $atendimentos->filter(function($atendimento){return $atendimento->prioridade == 'Prioritário';});
        $moderado = $atendimentos->filter(function($atendimento){return $atendimento->prioridade == 'Moderado';});

        $atendimentos = $prioritario->merge($moderado)->merge($normal);
        $pacientes = Paciente::paginate(999);

        $atendimentos = $atendimentos->map(function($atendimento) use ($pacientes){

            $atendimento->paciente = DB::table('paciente')
            ->join('users', 'paciente.user_id', '=', 'users.id')
            ->select('paciente.*', 'users.email','users.password')
            ->where('paciente.id', '=', $atendimento->paciente_id)
            ->first();

            return $atendimento;
        });

	   	return view('atendimento.index', compact('atendimentos','pacientes'));
    }

    public function create()
    {
        $servicos = Servico::get();
        $pacientes = Paciente::get();
        $setores = Setor::get();
        $especialistas = Especialista::with('user')->get();

    	return view('atendimento.add', compact('servicos', 'pacientes', 'setores', 'especialistas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {

        $atendimento = Atendimento::create([
            'resumo' => $request->input('resumo'),
            'descricao' => $request->input('descricao'),
            'status' => $request->input('status'),
            'data_solucao' => date('Y-m-d H:i:s'),
            'data_fechamento' => '1999-01-01 00:00:00',
            'acao' => $request->input('acao'),
            'paciente_id' => $request->input('paciente_id'),
            'setor_id' => $request->input('setor_id'),
            'especialista_id' => $request->input('especialista_id'),
            'tipo_chamado' => $request->input('tipo_chamado'),
            'servico_id' => $request->input('servico_id'),
            'prioridade' => $request->input('prioridade'),
            'hospital' => $request->input('hospital')
        ]);
        
    	return redirect()->route('atendimento.index');	
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Servico  $servico
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $atendimento = Atendimento::find($id);        
        if(!empty($atendimento)){
            $servicos = Servico::pluck('nome', 'id');
            $pacientes = Paciente::pluck('nome', 'id');
            $setores = Setor::pluck('nome', 'id');
            $especialistas = Especialista::with('user')->get()->pluck('user.name', 'id');


            return view('atendimento.edit', compact('atendimento', 'servicos', 'pacientes', 'setores', 'especialistas'));
        }

        return redirect()->route('atendimento.index');
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
        $atendimento = Atendimento::find($id);
        if(!empty($atendimento)){
            $atendimento->update($request->all());
        }
        return redirect()->route('atendimento.index');
    }

    public function atendimentos_paciente($id){
        $paciente =  Paciente::find($id);

        $atendimentos = Atendimento::where('paciente_id', $id)->get();

        return view('atendimento.atendimentos_paciente', compact('paciente', 'atendimentos'));

    }

    public function atendimentos_especialista($id){
        $especialista =  Especialista::find($id);

        $atendimentos = Atendimento::where('especialista_id', $id)->get();

        return view('atendimento.atendimentos_especialista', compact('especialista', 'atendimentos'));

    }

}
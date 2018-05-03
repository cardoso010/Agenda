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
    public function index()
    {
        $atendimentos = Atendimento::paginate(10);
	   	return view('atendimento.index', compact('atendimentos'));
    }

    public function create()
    {
        $servicos = Servico::get();
        $pacientes = Paciente::get();
        $setores = Setor::get();
        $especialistas = Especialista::get();

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
            'data_solucao' => $request->input('data_solucao'),
            'data_fechamento' => $request->input('data_fechamento'),
            'acao' => $request->input('acao'),
            'paciente_id' => $request->input('paciente_id'),
            'setor_id' => $request->input('setor_id'),
            'especialista_id' => $request->input('especialista_id'),
            'tipo_chamado' => $request->input('tipo_chamado'),
            'servico_id' => $request->input('servico_id')
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

        if(!empty($servico)){
            $servicos = Servico::pluck('nome', 'id');
            $pacientes = Paciente::pluck('nome', 'id');
            $setores = Setor::pluck('nome', 'id');
            $especialistas = Especialista::pluck('user.name', 'id');
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

            $atendimento->update([
                'resumo' => $request->input('resumo'),
                'descricao' => $request->input('descricao'),
                'status' => $request->input('status'),
                'data_solucao' => $request->input('data_solucao'),
                'data_fechamento' => $request->input('data_fechamento'),
                'acao' => $request->input('acao'),
                'paciente_id' => $request->input('paciente_id'),
                'setor_id' => $request->input('setor_id'),
                'especialista_id' => $request->input('especialista_id'),
                'tipo_chamado' => $request->input('tipo_chamado'),
                'servico_id' => $request->input('servico_id')
            ]);
            
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

        $atendimentos = Atendimento::where('paciente_id', $id)->get();

        return view('atendimento.atendimentos_especialista', compact('especialista', 'atendimentos'));

    }

}
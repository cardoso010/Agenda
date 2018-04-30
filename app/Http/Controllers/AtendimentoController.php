<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\Especialista;
use App\Models\Atendimento;
use App\User;
use App\Role;
use Illuminate\Http\Request;

class AtendimentoController extends Controller
{

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
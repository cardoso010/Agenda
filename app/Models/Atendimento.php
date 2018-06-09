<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Atendimento extends Model
{
    protected $table = 'atendimento';

    protected $fillable = ['resumo', 'descricao', 'status', 'data_solucao', 
                        'data_fechamento', 'acao', 'paciente_id', 'setor_id', 
                        'especialista_id', 'tipo_chamado', 'servico_id','prioridade','hospital'];

    public function paciente() {
        return $this->belongsTo('App\Models\Paciente');
    }

    public function especialista() {
        return $this->belongsTo('App\Models\Especialista');
    }

    public function setor() {
        return $this->belongsTo('App\Models\Setor');
    }

    public function servico() {
        return $this->belongsTo('App\Models\Servico');
    }


}

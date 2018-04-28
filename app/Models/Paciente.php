<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table = 'paciente';

    protected $fillable = ['prontuario', 'data_nascimento', 'endereco', 
                        'bairro', 'cidade', 'uf', 'identidade', 'cpf', 
                        'telefone', 'user_id'];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function atendimentos()
    {
        return $this->hasMany('App\Models\Atendimento');
    }

}
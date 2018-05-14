<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Paciente extends Model
{
    protected $table = 'paciente';

    protected $fillable = ['nome', 'prontuario', 'data_nascimento', 'endereco', 
                        'bairro', 'cidade', 'uf', 'cep', 'identidade', 'cpf', 
                        'telefone', 'user_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function atendimentos()
    {
        return $this->hasMany('App\Models\Atendimento');
    }

}
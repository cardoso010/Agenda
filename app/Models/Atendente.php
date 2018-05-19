<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Atendente extends Model
{
    protected $table = 'atendente';

    protected $fillable = ['perfil', 'cargo', 'matricula', 'setor', 'local', 'user_id'];

    public function user() {
        return $this->belongsTo('App\User');
    }

}
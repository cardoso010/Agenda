<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Especialista extends Model
{
    protected $table = 'especialista';

    protected $fillable = ['perfil', 'cargo_espec', 'crm_mat', 'user_id','hospital'];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function atendimentos()
    {
        return $this->hasMany('App\Models\Atendimento');
    }

}
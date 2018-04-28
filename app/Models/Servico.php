<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    protected $table = 'servico';

    protected $fillable = ['nome', 'categoria_id'];

    public function categoria() {
        return $this->belongsTo('App\Models\Categoria');
    }

}
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doenca extends Model
{
    protected $table = 'doenca';

    protected $fillable = ['nome', 'sintomas', 'tratamento'];

}
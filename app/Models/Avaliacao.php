<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model {
    protected $table    = 'avaliacao';
    protected $fillable = ['nota', 'id_motoboy'];
}

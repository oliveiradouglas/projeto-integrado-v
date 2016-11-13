<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Motoboy extends Model {
    protected $table = 'motoboy';

    protected $fillable = ['id_usuario', 'status'];
    
    public function getStatus() {
    	return new \App\Source\Motoboy\Status($this->status);
    }
}

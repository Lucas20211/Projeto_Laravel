<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;
 
    protected $fillable = ['nome'];
    public $timeStamps = false;
    /**
     * Pegar todos os produtos vinculados
     */
    public function produtos(){
        return $this->hasMany(Produto::class);
    }
    
}
